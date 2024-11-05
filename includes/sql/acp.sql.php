<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");

$acp_sidebar_left_navigation_header = "SELECT * FROM `acp_sidebar_left_navigation_header`";
$acp_sidebar_left_seitenleiste = "SELECT * FROM `acp_sidebar_left_seitenleiste`";
$acp_sidebar_left_eigene_werke = "SELECT * FROM `acp_sidebar_left_eigene_werke`";
$acp_sidebar_left_einkaufsprozess = "SELECT * FROM `acp_sidebar_left_einkaufsprozess`";
$acp_sidebar_left_wissensportal = "SELECT * FROM `acp_sidebar_left_wissensportal`";
$acp_sidebar_left_blog = "SELECT * FROM `acp_sidebar_left_blog`";

$acp_sidebar_left_navigation_header_liste = $connection->query($acp_sidebar_left_navigation_header)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_seitenleiste_liste = $connection->query($acp_sidebar_left_seitenleiste)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_eigene_werke_liste = $connection->query($acp_sidebar_left_eigene_werke)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_einkaufsprozess_liste = $connection->query($acp_sidebar_left_einkaufsprozess)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_wissensportal_liste = $connection->query($acp_sidebar_left_wissensportal)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_blog_liste = $connection->query($acp_sidebar_left_blog)->fetchAll(PDO::FETCH_ASSOC);