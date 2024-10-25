<?php

$header = file_get_contents("https://codevoyage.de/layout/header.inc.php");

$sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/sidebarLeft.php");
$php_sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/php.sidebarLeft.php");
$js_sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/js.sidebarLeft.php");

$footer = file_get_contents("https://codevoyage.de/python/templates/footer.html");


$test = "Hello World aus var.inc.php";