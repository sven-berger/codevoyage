<?php ob_start(); session_start(); require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database-connect.php");

// Falls der Benutzer bereits eingeloggt ist, nichts tun
if (isset($_SESSION['benutzername'])) {
    return;
}

// Prüfen, ob das Cookie 'login_token' existiert und ein gültiges Token enthält
if (isset($_COOKIE['login_token'])) {
    $token = $_COOKIE['login_token'];

    $stmt = $connection->prepare("SELECT * FROM benutzer WHERE token = :token");
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Automatischer Login
        $_SESSION['benutzername'] = $user['benutzername'];
    }
}