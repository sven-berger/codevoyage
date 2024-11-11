<?php
    $bereich = 'Startseite';
    $pageTitle = 'Startseite von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<?php echo $section_beginn; ?>
<?php
    echo "Hallo und herzlich willkommen auf CodeVoyage.de"
?>
<?php echo $section_ende; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>