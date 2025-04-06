<?php
error_reporting(E_ALL);

// Fehlerausgabe aktivieren
ini_set('display_errors', 1);
?>

<?php require_once("../web-archive/includes/header.php"); ?>
<?php
    // Standardseite setzen
    $page = $_GET['page'] ?? '';

    // Falls keine Seite gesetzt ist, auf index.php?page=index umleiten
    if ($page === '') {
        header("Location: ../web-archive/index.php?page=index");
        exit();
    }

    // Pfad zur Datei
    $filePath = "../web-archive/lib/" . $page . ".lib.php";

    // Datei einbinden, wenn sie existiert
    if (file_exists($filePath)) {
        include $filePath;
    } else {
        include "../web-archive/lib/errors/404.php";
    }
?>
<?php require_once("../web-archive/includes/footer.php"); ?>