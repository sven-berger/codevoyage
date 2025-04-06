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
    <link rel="stylesheet" href="../web-archive/assets/fontawesome/css/all.min.css">

    <!-- Bootstrap einbinden
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    -->

    <!-- HightLight.js einbinden -->
    <link rel="stylesheet" href="../web-archive/assets/highlightjs/styles/default.min.css">
    <script src="../web-archive/assets/highlightjs/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <!-- Angelegte Stylesheets einbinden -->
    <link rel="stylesheet "href="../web-archive/styles/editor.css">
    <link rel="stylesheet" href="../web-archive/styles/styles.css">
    <link rel="stylesheet" href="../web-archive/styles/mobile.css">
</head>

<!-- TinyMCE-Editor einbinden -->
<script src="../web-archive/assets/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: 'textarea',
    license_key: 'gpl',
    content_css:
    [
        '../web-archive/assets/highlightjs/styles/default.min.css',
        '../web-archive/styles/editor.css'
    ],
    menubar: false,
    language: 'de',
    language_url: '../web-archive/assets/tinymce/langs/de.js',
    plugins: 'code table lists fullscreen wordcount link image autosave advlist codesample preview',
    toolbar: 'code undo redo | bold italic | blocks | link image codesample table blockquote | bullist numlist | alignleft aligncenter alignright removeformat preview',
    fontsize_formats: "10pt 12pt 14pt 16pt 18pt 24pt 36pt"
});
</script>

<?php 
    $section_beginn = "<div class='section'>";
    $section_ende = "</div>";
?>

<body>
<div class="container">
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/web-archive/includes/acp-seitenleiste.php"); ?>


<div class="main-content">
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/web-archive/includes/navigation.php"); ?>