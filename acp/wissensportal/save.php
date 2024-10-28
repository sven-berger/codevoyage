<?php

$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet abschicken';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");


try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}

$kategorie = $_POST['title'];
$url = $_POST['url'];
$title = $_POST['title'];
$description = $_POST['description'];
$php_snippet = $_POST['php_snippet'];
$php_snippet_alternativ = $_POST['php_snippet_alternativ'];
$python_snippet = $_POST['python_snippet'];
$javascript_snippet = $_POST['javascript_snippet'];
$mitteilung_snippet = $_POST['mitteilung_snippet'];

$sql = "INSERT INTO wissensportal (kategorie, url, title, description, php_snippet, php_snippet_alternativ, python_snippet, javascript_snippet, mitteilung_snippet) 
        VALUES (:kategorie, :url, :title, :description, :php_snippet, :php_snippet_alternativ, :python_snippet, :javascript_snippet, :mitteilung_snippet)";
$stmt = $connection->prepare($sql);
$stmt->execute([
    ':kategorie' => $kategorie,
    ':url' => $url,
    ':title' => $title,
    ':description' => $description,
    ':php_snippet' => $php_snippet,
    ':php_snippet_alternativ' => $php_snippet_alternativ,
    ':python_snippet' => $python_snippet,
    ':javascript_snippet' => $javascript_snippet,
    ':mitteilung_snippet' => $mitteilung_snippet
]);


header("Location: https://codevoyage.de/acp/wissensportal/index.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>