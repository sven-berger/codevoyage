<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.top.inc.php");
?>

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