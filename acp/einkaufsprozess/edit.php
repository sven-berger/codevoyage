<?php
$bereich = 'Administrationsbereich';
$pageTitle = "Menüpunkt ändern (Sonstiges)";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");

try {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $sql = "SELECT * FROM einkaufsprozess WHERE ID = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "Eintrag nicht gefunden!";
            exit;
        }
    } else {
        echo "ID fehlt!";
        exit;
    }
} catch (PDOException $e) {
    echo 'Fehler beim Laden des Eintrags: ' . htmlspecialchars($e->getMessage());
    exit;
}
?>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <label for="produktname">Produktname:</label>
    <input type="text" name="produktname" required><br>

    <label for="menge">Menge:</label>
    <input type="number" step="1" id="menge" name="menge" required>

    <label for="Einheit">Kategorie:</label>
    <select name="einheit" id="einheit" class="global-kategorien" required>
    <?php
    $einheiten = $connection->query("SELECT id, name FROM einkaufsprozess_einheiten ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($einheiten as $einheit) {
        echo "<option value='{$einheit['id']}'>" . htmlspecialchars($einheit['name']) . "</option>";
    }
    ?>
    </select>

    <label for="preis">Preis:</label>
    <input type="number" step="0.01" id="preis" name="preis" required>

    <button type="submit">Hinzufügen</button>
    <button type="reset">Zurücksetzen</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['produktname']) && !empty($_POST['menge']) && !empty($_POST['einheit'])  && !empty($_POST['preis'])) {
            $produktname = filter_input(INPUT_POST, 'produktname', FILTER_SANITIZE_SPECIAL_CHARS);
            $menge = filter_input(INPUT_POST, 'menge', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $preis = filter_input(INPUT_POST, 'preis', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $prepare = $connection->prepare('INSERT INTO `einkaufsprozess` (`produktname`, `menge`, `einheit` `preis`) VALUES (:produktname, :menge, :einheit, :preis)');
            $prepare->bindParam(':produktname', $produktname, PDO::PARAM_STR);
            $prepare->bindParam(':menge', $menge, PDO::PARAM_INT);
            $prepare->bindParam(':einheit', $einheit, PDO::PARAM_STR);
            $prepare->bindParam(':preis', $preis, PDO::PARAM_INT);
            $prepare->execute();

            echo 'Menüpunkt erfolgreich eingetragen.';
            header("Location: https://codevoyage.de/acp/einkaufsprozess/index.php");
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