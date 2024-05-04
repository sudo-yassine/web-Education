<?php
session_start();
//require 'C:\xampp\htdocs\userrrrr\web-Education\config.php'; // Assurez-vous que ce fichier contient les informations de connexion à la base de données
require 'C:\xampp\htdocs\userrrrr\web-Education\controller\adminC.php'; // Fichier contenant les opérations relatives aux administrateurs

// Vérifier le type de connexion, soit traditionnelle soit via Facebook
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connexion traditionnelle
    if (isset($_POST['Email']) && isset($_POST['pass'])) {
        $email = $_POST['Email']; // Correct

        $password = $_POST['pass']; // le mot de passe doit être hashé dans votre base de données
        
        $adminC = new adminC();
        $isValid = $adminC->validateAdminLogin($email, $password);

        if ($isValid) {
            $_SESSION['user_email'] = $email;  // Stocker l'email dans la session
            echo json_encode(['success' => true, 'message' => 'Login successful']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    }
    // Connexion via Facebook
    else if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        $adminC = new adminC();
        $adminExists = $adminC->checkAdminByEmail($email);

        if ($adminExists) {
            $_SESSION['user_email'] = $email; // ou toute autre information pertinente
            echo json_encode(['success' => true, 'message' => 'Login successful']);
        } else {
            echo json_encode(['success' => false, 'message' => 'User does not exist']);
        }
    }
} else {
    // Méthode HTTP non prise en charge
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
if ($isValid) {
    $_SESSION['user_email'] = $email; // Stocker l'email dans la session
    header('Location: dashboard.html'); // Redirection vers dashboard.html
    exit(); // Assurez-vous d'appeler exit après header pour arrêter l'exécution du script
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
}
?>
