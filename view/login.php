<?php
session_start();
include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$db = config::getConnexion();
$query = $db->prepare("SELECT * FROM administrateur WHERE Email = :email");
$query->execute(['email' => $email]);
$user = $query->fetch();

if ($user && password_verify($password, $user['pass'])) {
    $_SESSION['user'] = $user['Email']; // Stocker l'email en session pour une utilisation ultérieure
    header('Location: dashboard.html');
} else {
    echo "<script>alert('Identifiants incorrects'); window.location.href='adminlogin.html';</script>";
}
?>
