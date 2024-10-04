<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Startseite der PHP-Instanz';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
?>

<?php
echo 'echo "Hello World!;';
?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>