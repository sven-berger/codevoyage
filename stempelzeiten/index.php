<?php
$bereich = 'Startseite';
$pageTitle = 'Stempelzeiten';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");

$sql = "
CREATE TABLE IF NOT EXISTS `stempelzeiten` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `Eingeloggt` DATETIME NOT NULL,
    `Ausgeloggt` DATETIME NOT NULL,
    `Homeoffice` VARCHAR(255) NOT NULL,
    `Standort` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`ID`)
)";

try {
    $connection->exec($sql);
} catch (PDOException $e) {
    echo 'Fehler beim Erstellen der Tabelle: ' . $e->getMessage();
    exit();
}
?>

<?php echo $section_beginn; ?>
<?php
try {
    $sql = "SELECT * FROM `stempelzeiten`";
    $result = $connection->query($sql);

    if ($result->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Eingeloggt</th><th>Ausgeloggt</th><th>Homeoffice</th><th>Standort</th><th>Aktion</th></tr>";

        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Eingeloggt']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Ausgeloggt']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Homeoffice']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Standort']) . "</td>";
            echo "<td>
                    <a href='edit.php?id=" . htmlspecialchars($row['ID']) . "'>Bearbeiten</a> |
                    <a href='delete.php?id=" . htmlspecialchars($row['ID']) . "' onclick='return confirm(\"Bist du dir sicher, dass du diesen Eintrag löschen möchtest?\");'>Löschen</a>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>Keine Stempelzeiten gefunden.</p>";
    }
} catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . $e->getMessage() . '</p>';
}
?>
<?php echo $section_ende; ?>

<?php echo $section_beginn; ?>
<form action="" method="post">
    <label for="eingeloggt">Eingeloggt:</label>
    <input type="datetime-local" name="eingeloggt" required><br>

    <label for="ausgeloggt">Ausgeloggt:</label>
    <input type="datetime-local" name="ausgeloggt" required><br>

    <label for="homeoffice">Homeoffice:</label>
    <input type="radio" name="homeoffice" value="Ja" required> Ja
    <input type="radio" name="homeoffice" value="Nein" required> Nein<br>

    <label for="standort">Standort:</label>
    <input type="radio" name="standort" value="Büro" required> Büro
    <input type="radio" name="standort" value="Externer Standort" required> Externer Standort<br>

    <button type="submit">Hinzufügen</button>
    <button type="reset">Zurücksetzen</button>
</form>
<?php echo $section_ende; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['eingeloggt']) && !empty($_POST['ausgeloggt']) && !empty($_POST['homeoffice']) && !empty($_POST['standort'])) {
            $eingeloggt = filter_input(INPUT_POST, 'eingeloggt', FILTER_SANITIZE_SPECIAL_CHARS);
            $ausgeloggt = filter_input(INPUT_POST, 'ausgeloggt', FILTER_SANITIZE_SPECIAL_CHARS);
            $homeoffice = filter_input(INPUT_POST, 'homeoffice', FILTER_SANITIZE_SPECIAL_CHARS);
            $standort = filter_input(INPUT_POST, 'standort', FILTER_SANITIZE_SPECIAL_CHARS);

            $prepare = $connection->prepare('INSERT INTO `stempelzeiten` (`Eingeloggt`, `Ausgeloggt`, `Homeoffice`, `Standort`) VALUES (:eingeloggt, :ausgeloggt, :homeoffice, :standort)');
            $prepare->bindParam(':eingeloggt', $eingeloggt, PDO::PARAM_STR);
            $prepare->bindParam(':ausgeloggt', $ausgeloggt, PDO::PARAM_STR);
            $prepare->bindParam(':homeoffice', $homeoffice, PDO::PARAM_STR);
            $prepare->bindParam(':standort', $standort, PDO::PARAM_STR);
            $prepare->execute();

            header("Location: https://codevoyage.de/stempelzeiten/index.php");
            exit();
        } else {
            echo 'Bitte füllen Sie alle Felder aus.';
        }
    } catch (PDOException $e) {
        echo 'Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage());
    }
}
?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>