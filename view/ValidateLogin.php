<?php
session_start();
//require 'C:\xampp\htdocs\userrrrr\web-Education\config.php';
require 'C:\xampp\htdocs\userrrrr\web-Education\controller\adminC.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminC = new adminC();

    // Connexion traditionnelle
    if (isset($_POST['Email'], $_POST['pass'])) {
        $email = $_POST['Email'];
        $password = $_POST['pass']; // Assurez-vous que ce mot de passe est correctement hashé dans votre base de données

        $isValid = $adminC->validateAdminLogin($email, $password);

        if ($isValid) {
            $_SESSION['user_email'] = $email; // Stocker l'email dans la session
            header('Location: dashboard.html'); // Redirection vers dashboard.html
            exit();
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
            exit();
        }
    }
    // Connexion via Facebook
    else if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $adminExists = $adminC->checkAdminByEmail($email);

        if ($adminExists) {
            $_SESSION['user_email'] = $email;
            header('Location: dashboard.html'); // Redirection vers dashboard.html
            exit();
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'User does not exist']);
            exit();
        }
    }
} else {
    http_response_code(405);
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}
?>
