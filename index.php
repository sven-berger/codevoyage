<?php
    $bereich = 'Startseite';
    $pageTitle = 'Startseite von CodeVoyage.de';
?>

<?php echo $section_beginn; ?>
<?php
    echo "Hallo und herzlich willkommen auf CodeVoyage.de"
?>
<?php echo $section_ende; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>