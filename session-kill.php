<?php
session_start(); // Startet die Session

// Alle Session-Variablen leeren
$_SESSION = [];

// Session-Cookie ungültig machen
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Session zerstören
session_destroy();

// Weiterleitung zur UNO-Spiel-Seite
header("Location: uno-spiel.php");
exit;
?>