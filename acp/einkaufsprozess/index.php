<?php
$bereich = 'Startseite';
$pageTitle = 'Einkaufsprozess';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

?>

<div class="ActionArea">
    <ul>
        <li><button class="button-action"><a href="https://codevoyage.de/acp/einkaufsprozess/add.php">Produkt hinzufügen</a></button></li>
    </ul>
</div>
<?php echo $section_beginn; ?>
<?php
try {
    $sql = "SELECT * FROM `einkaufsprozess`";
    $result = $connection->query($sql);

    if ($result->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Produktname</th><th>Menge</th><th>Einheit</th><th>Preis</th><th>Aktion</th></tr>";

        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['produktname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['menge']) . "</td>";
            echo "<td>" . htmlspecialchars($row['einheit']) . "</td>";
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