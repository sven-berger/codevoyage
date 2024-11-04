<?php

$header = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/header.inc.php");
$footer = file_get_contents("https://codevoyage.de/python/templates/footer.html");

$sidebarLeft = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/index.sidebarLeft.php");

$wissensportal_sidebarLeft = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/wissensportal.sidebarLeft.php");
$wissensportal_sidebarRight = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/wissensportal.sidebarLeft.php");

$acp_sidebarLeft = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/acp.sidebarLeft.php");
$acp_sidebarRight = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/acp.sidebarLeft.php");

$php_sidebarLeft = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/php.sidebarLeft.php");
$js_sidebarLeft = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/js.sidebarLeft.php");

$sidebarLeft = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/index.sidebarLeft.php");


$section_beginn = "<section class='section'><div class='sectionContent'>";
$section_ende = "</div></section>";

$test = "Hello World aus var.inc.php";