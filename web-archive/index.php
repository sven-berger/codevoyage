<?php require_once("includes/header.php"); ?>
<?php
    // Standardseite setzen
    $page = $_GET['page'] ?? '';

    // Falls keine Seite gesetzt ist, auf index.php?page=index umleiten
    if ($page === '') {
        header("Location: index.php?page=index");
        exit();
    }

    // Pfad zur Datei
    $filePath = "lib/" . $page . ".lib.php";

    // Datei einbinden, wenn sie existiert
    if (file_exists($filePath)) {
        include $filePath;
    } else {
        include "lib/errors/404.php";
    }
?>
<?php require_once("includes/footer.php"); ?>