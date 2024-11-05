<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");
$community_spiele = "SELECT * FROM `sidebar_left_community_spiele`";
$community_spiele_liste = $connection->query($community_spiele)->fetchAll(PDO::FETCH_ASSOC);