<?php
$bereich = 'Startseite';
$pageTitle = 'Einkaufsliste';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<div class="ActionArea">
    <ul>
        <li><button class="button-action"><a href="https://codevoyage.de/acp/einkaufsliste/add.php">Einkauf hinzufügen</a></button></li>
    </ul>
</div>
<?php echo $section_beginn; ?>
<?php
try {
    // Hauptabfrage für Produkte
    $sql = "SELECT * FROM `einkaufsliste`";
    $result = $connection->query($sql);

    // Abfrage für Einheiten und Array für ID-Abkuerzung-Zuordnung erstellen
    $einkaufsliste_einheiten = "SELECT * FROM `einkaufsliste_einheiten`";
    $ee_result = $connection->query($einkaufsliste_einheiten);
    $einheiten_liste = [];
    foreach ($ee_result->fetchAll(PDO::FETCH_ASSOC) as $einheit) {
        $einheiten_liste[$einheit['id']] = $einheit['einheit'];
    }

    if ($result->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Produktname</th><th>Menge</th><th>Einheit</th><th>Preis</th><th>Aktion</th></tr>";

        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['produktname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['menge']) . "</td>";
            echo "<td>" . htmlspecialchars($einheiten_liste[$row['einheit']] ?? 'Unbekannt') . "</td>";
            echo "<td>" . htmlspecialchars($row['preis']) . "€</td>";
            echo "<td>
                    <a href='edit.php?id=" . htmlspecialchars($row['ID']) . "'>Bearbeiten</a> |
                    <a href='delete.php?id=" . htmlspecialchars($row['ID']) . "' onclick='return confirm(\"Bist du dir sicher, dass du diesen Eintrag löschen möchtest?\");'>Löschen</a>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>Keine Produkte gefunden.</p>";
    }
} catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . $e->getMessage() . '</p>';
}

?>
<?php echo $section_ende; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>