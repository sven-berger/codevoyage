<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.php");

if (headers_sent($file, $line)) {
    echo "Headers already sent in $file on line $line";
    exit;
}
?>

<?php

    // Standardseite setzen
    $page = $_GET['page'] ?? '';

    // Falls keine Seite gesetzt ist, auf index.php?page=index umleiten
    if ($page === '') {
        header("Location: index.php?page=index");
        exit();
    }

    // Pfad zur Datei
    $filePath = "lib/pages/" . $page . ".page.php";

    // Datei einbinden, wenn sie existiert
    if (file_exists($filePath)) {
        include $filePath;
    } else {
        require_once ($_SERVER['DOCUMENT_ROOT'] . "/lib/errors/404.php");
    }
?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"); ?>