<?php
$bereich = 'Administrationsbereich';
$pageTitle = "Produkt ändern";
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

<?php echo $section_beginn; ?>
<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <label for="produktname">Produktname:</label>
    <input type="text" name="produktname" value="<?php echo htmlspecialchars($row['produktname']); ?>" required><br>

    <label for="menge">Menge:</label>
    <input type="number" step="1" id="menge" name="menge" value="<?php echo htmlspecialchars($row['menge']); ?>" required><br>

    <label for="einheit">Einheit:</label>
    <select name="einheit" id="einheit" class="global-kategorien" required>
    <?php
    $einheit = $connection->query("SELECT * FROM einkaufsprozess_einheiten ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($einheit as $einheiten) {
        echo "<option value='{$einheiten['id']}'>" . htmlspecialchars($einheiten['einheit']) . " (" . htmlspecialchars($einheiten['abkuerzung']). ")"; "</option>";
    }    
    ?>
    </select><br>

    <label for="preis">Preis:</label>
    <input type="number" step="0.01" id="preis" name="preis" value="<?php echo htmlspecialchars($row['preis']); ?>" required><br>

    <button type="submit">Speichern</button>
    <button type="reset">Zurücksetzen</button>
</form>
<?php echo $section_ende; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['produktname']) && !empty($_POST['menge']) && !empty($_POST['einheit']) && !empty($_POST['preis'])) {
            $produktname = filter_input(INPUT_POST, 'produktname', FILTER_SANITIZE_SPECIAL_CHARS);
            $menge = filter_input(INPUT_POST, 'menge', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $einheit = filter_input(INPUT_POST, 'einheit', FILTER_SANITIZE_NUMBER_INT);
            $preis = filter_input(INPUT_POST, 'preis', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $prepare = $connection->prepare('UPDATE einkaufsprozess SET produktname = :produktname, menge = :menge, einheit = :einheit, preis = :preis WHERE ID = :id');
            $prepare->bindParam(':produktname', $produktname, PDO::PARAM_STR);
            $prepare->bindParam(':menge', $menge, PDO::PARAM_STR);
            $prepare->bindParam(':einheit', $einheit, PDO::PARAM_INT);
            $prepare->bindParam(':preis', $preis, PDO::PARAM_STR);
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            
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
