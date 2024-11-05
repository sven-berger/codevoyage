<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Umsatzrechner für das Jahr 2024";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");

$monate_zuweisung = [
    1 => 'Januar', 
    2 => 'Februar', 
    3 => 'März', 
    4 => 'April', 
    5 => 'Mai', 
    6 => 'Juni', 
    7 => 'Juli', 
    8 => 'August', 
    9 => 'September', 
    10 => 'Oktober', 
    11 => 'November', 
    12 => 'Dezember'
];

// Array für die bereits vorhandenen Monate in der Datenbank
$monat_vorhanden = [];

try {
    // SQL-Abfrage, um bereits vorhandene Monate zu ermitteln
    $sql = "SELECT DISTINCT `monat` FROM `umsatz_2024`";
    $result = $connection->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $monat_vorhanden[] = $row['monat'];
        }
    }
} catch (PDOException $e) {
    echo 'Es liegt ein Problem vor: ' . $e->getMessage();
}

?>

<?php echo $section_beginn; ?>
<p><a href="https://codevoyage.de/acp/umsatzrechner/2023/">2023</a> | <a href="https://codevoyage.de/acp/umsatzrechner/2024/">2024</a></p>
<?php echo $section_ende; ?>

<?php echo $section_beginn; ?>
<?php 
$alle_monate_zugewiesen = true;
if ($alle_monate_zugewiesen == false):
?>
    <form action="index.php" method="post">
        <label for="Monat">Monat:</label>
        <select id="monat" name="monat" required>
            <option value="">Bitte wählen...</option>
            <?php 
            foreach ($monate_zuweisung as $monats_zahl => $monats_name): 
                if (!in_array($monats_zahl, $monat_vorhanden)): 
                    $alle_monate_zugewiesen = false; // Es gibt noch einen Monat ohne Umsatz
            ?>
                    <option value="<?php echo $monats_zahl; ?>"><?php echo htmlspecialchars($monats_name); ?></option>
            <?php 
                endif;
            endforeach;
            ?>
        </select>
        <div>
        <button type="submit">Hinzufügen</button>
        <button type="reset">Zurücksetzen</button>
    </div>
    </form>

    <div style="margin-top: 20px;">
        <label for="umsatz">Umsatz:</label>
        <input type="number" step="0.01" id="umsatz" name="umsatz" required>
    </div>

    <?php endif; ?>

    <?php if ($alle_monate_zugewiesen): ?>
        <p class="center strong success">Vielen Dank, es wurden sämtliche Umsätze des Jahres eingetragen.</p>
    <?php endif; ?>
<?php echo $section_ende; ?>

<?php
// Tabelle erstellen, wenn sie nicht existiert
$sql = "
CREATE TABLE IF NOT EXISTS `umsatz_2024` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `monat` INT NOT NULL,
    `umsatz` DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (`ID`)
)";

try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['monat']) && !empty($_POST['umsatz'])) {
            $monat = filter_input(INPUT_POST, 'monat', FILTER_SANITIZE_NUMBER_INT);
            $umsatz = filter_input(INPUT_POST, 'umsatz', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $prepare = $connection->prepare('INSERT INTO `umsatz_2024` (`monat`, `umsatz`) VALUES (:monat, :umsatz)');
            $prepare->bindParam(':monat', $monat, PDO::PARAM_INT);
            $prepare->bindParam(':umsatz', $umsatz, PDO::PARAM_STR);
            $prepare->execute();

            header("Location: https://php.codevoyage.de/acp/umsatzrechner/2024/index.php");
            exit();
        } else {
            echo 'Bitte füllen Sie alle Felder aus.';
        }
    } catch (PDOException $e) {
        echo 'Es liegt ein Problem vor: ' . $e->getMessage();
        echo "<pre>";
        var_dump($e->getMessage());
        echo "</pre>";
    }
}

?>

<?php
try {
    $sql = "SELECT * FROM `umsatz_2024`";
    $result = $connection->query($sql);

    if ($result->rowCount() > 0) {
        echo $section_beginn;
        echo "<table>";
        echo "<tr><th>Monat</th><th>Umsatz</th><th>Aktion</th></tr>";

        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo "<tr>";
            $monats_name = $monate_zuweisung[$row['monat']];
            echo "<td>" . htmlspecialchars($monats_name) . "</td>";
            echo "<td>" . htmlspecialchars($row['umsatz']) . "€</td>";
            echo "<td>
                    <a href='edit.php?id=" . htmlspecialchars($row['ID']) . "'>Bearbeiten</a> |
                    <a href='delete.php?id=" . htmlspecialchars($row['ID']) . "' onclick='return confirm(\"Bist du dir sicher, dass du diesen Eintrag löschen möchtest?\");'>Löschen</a>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
        echo $section_ende;
    } else {
        echo "<p style='text-align: center;'>Keine Umsatzzahlen gefunden.</p>";
    }
} catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . $e->getMessage() . '</p>';
}
?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>