<?php

$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet abschicken';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.inc.php");

$title = $_POST['title'];
$description = $_POST['description'];
$php_snippet = $_POST['php_snippet'];
$python_snippet = $_POST['python_snippet'];
$javascript_snippet = $_POST['javascript_snippet'];
$url = $_POST['url'];

$sql = "INSERT INTO snippets (title, description, php_snippet, python_snippet, javascript_snippet, url) 
        VALUES (:title, :description, :php_snippet, :python_snippet, :javascript_snippet, :url)";
$stmt = $connection->prepare($sql);
$stmt->execute([
    ':title' => $title,
    ':description' => $description,
    ':php_snippet' => $php_snippet,
    ':python_snippet' => $python_snippet,
    ':javascript_snippet' => $javascript_snippet,
    ':url' => $url
]);

header("Location: https://codevoyage.de/acp/wissensportal/add.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
?>