<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");

try {
    $eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
    $spielereien = "SELECT * FROM `php_sidebar_left_spielereien`";
    $sonstiges = "SELECT * FROM `php_sidebar_left_sonstiges`";
    $community_spiele = "SELECT * FROM `sidebar_left_community_spiele`";
    $navigation_header = "SELECT * FROM `navigation_header`";

    $acp_sidebar_left_navigation_header = "SELECT * FROM `acp_sidebar_left_navigation_header`";
    $acp_sidebar_left_seitenleiste = "SELECT * FROM `acp_sidebar_left_seitenleiste`";
    $acp_sidebar_left_eigene_werke = "SELECT * FROM `acp_sidebar_left_eigene_werke`";
    $acp_sidebar_left_wissensportal = "SELECT * FROM `acp_sidebar_left_wissensportal`";
    $acp_sidebar_left_einkaufsprozess = "SELECT * FROM `acp_sidebar_left_einkaufsprozess`";
    $acp_sidebar_left_blog = "SELECT * FROM `acp_sidebar_left_blog`";

    
    $ausgabe_navigation_header = $connection->query($navigation_header);
    $ausgabe_eigene_werke = $connection->query($eigene_werke);
    $ausgabe_spielereien = $connection->query($spielereien);
    $ausgabe_sonstiges = $connection->query($sonstiges);
    $ausgabe_community_spiele = $connection->query($community_spiele);
    $ausgabe_acp_sidebar_left_navigation_header = $connection->query($acp_sidebar_left_navigation_header);

    $ausgabe_acp_sidebar_left_seitenleiste = $connection->query($acp_sidebar_left_seitenleiste);
    $ausgabe_acp_sidebar_left_eigene_werke = $connection->query($acp_sidebar_left_eigene_werke);
    $ausgabe_acp_sidebar_left_wissensportal = $connection->query($acp_sidebar_left_wissensportal);
    $ausgabe_acp_sidebar_left_blog = $connection->query($acp_sidebar_left_blog);
    $ausgabe_acp_sidebar_left_einkaufsprozess = $connection->query($acp_sidebar_left_einkaufsprozess);


    
    $navigation_header_liste = $ausgabe_navigation_header->fetchAll(PDO::FETCH_ASSOC);
    $eigene_werke_liste = $ausgabe_eigene_werke->fetchAll(PDO::FETCH_ASSOC);
    $spielereien_liste = $ausgabe_spielereien->fetchAll(PDO::FETCH_ASSOC);
    $sonstiges_liste = $ausgabe_sonstiges->fetchAll(PDO::FETCH_ASSOC);
    $community_spiele_liste = $ausgabe_community_spiele->fetchAll(PDO::FETCH_ASSOC);
    
    $acp_sidebar_left_seitenleiste_liste = $ausgabe_acp_sidebar_left_seitenleiste->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_eigene_werke_liste = $ausgabe_acp_sidebar_left_eigene_werke->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_wissensportal_liste = $ausgabe_acp_sidebar_left_wissensportal->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_blog_liste = $ausgabe_acp_sidebar_left_blog->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_einkaufsprozess_liste = $ausgabe_acp_sidebar_left_einkaufsprozess->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_navigation_header_liste = $ausgabe_acp_sidebar_left_navigation_header->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo "<p style='color:red;'>Fehler bei der Abfrage: " . htmlspecialchars($e->getMessage()) . "</p>";
}

function getCategories($connection) {
    $sql = "SELECT id, name FROM wissensportal_kategorien";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$categories = getCategories($connection);

try {
    $kategorien = [
        1 => 'variablen_snippets',
        2 => 'arrays_snippets',
        3 => 'assoziatives_array_snippets',
        4 => 'mehrdimensionales_array_snippets',
        5 => 'for_snippets',
        6 => 'if_snippets',
        7 => 'funktionen_snippets',
        8 => 'oop_snippets',
        9 => 'datenbanken_snippets',
        10 => 'vorlagen_snippets',
        11 => 'sonstiges_snippets',
    ];

    foreach ($kategorien as $kategorie_id => $variable_name) {
        $sql = "SELECT * FROM wissensportal WHERE kategorie_id = :kategorie_id";
        $stmt = $connection->prepare($sql);
        $stmt->execute([':kategorie_id' => $kategorie_id]);
        $$variable_name = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $sql = "SELECT * FROM wissensportal";
    $stmt = $connection->query($sql);
    $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Fehler beim Laden der Snippets: " . htmlspecialchars($e->getMessage());
    exit;
}

try {
    $sql = "SELECT * FROM wissensportal_kategorien";
    $stmt = $connection->query($sql);
    $wissensportal_kategorien = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Fehler beim Laden der Kategorien: " . htmlspecialchars($e->getMessage());
    exit;
}