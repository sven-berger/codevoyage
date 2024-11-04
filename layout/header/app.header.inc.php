<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://codevoyage.de/python/static/css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title><?php echo $pageTitle; ?></title>
</head>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");
    $mariadbVersion = getMariaDBVersion($connection);
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/var.inc.php");
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/functions.inc.php");
?>

<body>

    <div class="header">
    <a href="https://codevoyage.de/">
        <h2 align="center">Willkommen auf meinem Apache-Webserver!</h2>
    </a>
    <h3 align="center">Dieser Server verwendet <a href="https://mariadb.org/" style="color: darkred;" target="_blank">MariaDB <?php echo htmlspecialchars($mariadbVersion); ?></a></h3>
    <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.inc.php"); ?>
    </div>
    <div class="main">
        <div class="content">
            <h2><?php echo $pageTitle; ?></h2>