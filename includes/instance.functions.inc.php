<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../includes/database.inc.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Überprüfe, ob die Datenbankverbindung vorhanden ist
if (!isset($connection)) {
    echo "<p style='color:red;'>Datenbankverbindung ist nicht definiert.</p>";
    exit;
}
?>

<?php
try {
     // Weitere Abfragen bleiben unverändert
    $eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
    $spielereien = "SELECT * FROM `php_sidebar_left_spielereien`";
    $sonstiges = "SELECT * FROM `php_sidebar_left_sonstiges`";
    $community_spiele = "SELECT * FROM `sidebar_left_community_spiele`";

    // Ergebnisse abrufen
    $eigene_werke_liste = $connection->query($eigene_werke)->fetchAll(PDO::FETCH_ASSOC);
    $spielereien_liste = $connection->query($spielereien)->fetchAll(PDO::FETCH_ASSOC);
    $sonstiges_liste = $connection->query($sonstiges)->fetchAll(PDO::FETCH_ASSOC);
    $community_spiele_liste = $connection->query($community_spiele)->fetchAll(PDO::FETCH_ASSOC);
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