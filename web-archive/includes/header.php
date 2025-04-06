<?php 
    if (ob_get_level() == 0) ob_start();
    require_once("../web-archive/includes/session.php");
?>

<!DOCTYPE html>  
<html lang="de">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>CodeVoyage.de</title>  

    <!-- Font Awesome 6 Free einbinden -->
    <link rel="stylesheet" href="../web-archive//assets/fontawesome/css/all.min.css">

    <!-- Bootstrap einbinden
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    -->

    <!-- HightLight.js einbinden -->
    <link rel="stylesheet" href="../web-archive/assets/highlightjs/styles/default.min.css">
    <script src="../assets/highlightjs/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <!-- Angelegte Stylesheets einbinden -->
    <link rel="stylesheet "href="../web-archive/styles/editor.css">
    <link rel="stylesheet" href="../web-archive/styles/styles.css">
    <link rel="stylesheet" href="../web-archive/styles/mobile.css">
</head>

<body>
    <div class="container">
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/web-archive/includes/seitenleiste.php"); ?>
        <div class="main-content">
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/web-archive/includes/navigation.php"); ?>