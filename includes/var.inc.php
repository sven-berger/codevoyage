<?php

$footer = file_get_contents("https://codevoyage.de/python/templates/footer.html");

$sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/index.sidebarLeft.php");



$acp_sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/acp.sidebarLeft.php");
$acp_sidebarRight = file_get_contents("https://codevoyage.de/layout/sidebar/acp.sidebarRight.php");



$js_sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/js.sidebarLeft.php");

$test = "Hello World aus var.inc.php";