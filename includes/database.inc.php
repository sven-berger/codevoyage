<?php

$dsn = "mysql:host=localhost;dbname=codevoyage_system;";
$username = "codevoyage_system";
$password = "jD=0m7!I";

try {
    $connection = new PDO($dsn, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Es liegt ein Problem bei der Datenbankverbindung vor: ' . "<br/><br/>";
    echo "<pre>" . var_dump($e) . "</pre>";
}


// ACP //
$acp_sidebar_left_navigation_header = "SELECT * FROM `acp_sidebar_left_navigation_header`";
$acp_sidebar_left_seitenleiste = "SELECT * FROM `acp_sidebar_left_seitenleiste`";
$acp_sidebar_left_eigene_werke = "SELECT * FROM `acp_sidebar_left_eigene_werke`";
$acp_sidebar_left_einkaufsliste = "SELECT * FROM `acp_sidebar_left_einkaufsliste`";
$acp_sidebar_left_wissensportal = "SELECT * FROM `acp_sidebar_left_wissensportal`";
$acp_sidebar_left_blog = "SELECT * FROM `acp_sidebar_left_blog`";

$acp_sidebar_left_navigation_header_liste = $connection->query($acp_sidebar_left_navigation_header)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_seitenleiste_liste = $connection->query($acp_sidebar_left_seitenleiste)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_eigene_werke_liste = $connection->query($acp_sidebar_left_eigene_werke)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_einkaufsliste_liste = $connection->query($acp_sidebar_left_einkaufsliste)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_wissensportal_liste = $connection->query($acp_sidebar_left_wissensportal)->fetchAll(PDO::FETCH_ASSOC);
$acp_sidebar_left_blog_liste = $connection->query($acp_sidebar_left_blog)->fetchAll(PDO::FETCH_ASSOC);

// CODEVOYAGE //
$community_spiele = "SELECT * FROM `sidebar_left_community_spiele`";
$community_spiele_liste = $connection->query($community_spiele)->fetchAll(PDO::FETCH_ASSOC);

$drittanbieter_woltab = "SELECT * FROM `sidebar_left_drittanbieter_woltab`";
$drittanbieter_woltab_liste = $connection->query($drittanbieter_woltab)->fetchAll(PDO::FETCH_ASSOC);

// PHP //
$eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
$spielereien = "SELECT * FROM `php_sidebar_left_spielereien`";
$sonstiges = "SELECT * FROM `php_sidebar_left_sonstiges`";
 
$eigene_werke_liste = $connection->query($eigene_werke)->fetchAll(PDO::FETCH_ASSOC);
$spielereien_liste = $connection->query($spielereien)->fetchAll(PDO::FETCH_ASSOC);
$sonstiges_liste = $connection->query($sonstiges)->fetchAll(PDO::FETCH_ASSOC);

// WISSENSPORTAL

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
        $variable_name = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

// MARIADB-VERSION //
function getMariaDBVersion($connection) {
        $stmt = $connection->query('SELECT VERSION()');
        $version = $stmt->fetchColumn();

        if (preg_match('/(MariaDB\s+\d+\.\d+\.\d+)/', $version, $matches)) {
            return $matches[1];
        } else {
            return $version;
        }
}

// NAVIGATION //
$navigation_header = "SELECT * FROM `navigation_header` ORDER BY `reihenfolge` ASC";
$ausgabe_navigation_header = $connection->query($navigation_header);
$navigation_header_liste = $ausgabe_navigation_header->fetchAll(PDO::FETCH_ASSOC);
if (!isset($page)) $page = '';

?>