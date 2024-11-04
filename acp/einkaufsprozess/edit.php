<?php
$bereich = 'Administrationsbereich';
$pageTitle = "Menüpunkt ändern (Sonstiges)";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

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

    <label for="beschreibung">Beschreibung:</label>
    <input type="text" name="beschreibung" required><br>

    <label for="preis">Preis:</label>
    <input type="number" step="0.01" id="umsatz" name="preis" required>

    <input type="submit" value="Einfügen">
    <button type="reset">Zurücksetzen</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['produktname']) && !empty($_POST['beschreibung']) && !empty($_POST['preis'])) {
            $produktname = filter_input(INPUT_POST, 'produktname', FILTER_SANITIZE_SPECIAL_CHARS);
            $beschreibung = filter_input(INPUT_POST, 'beschreibung', FILTER_SANITIZE_SPECIAL_CHARS);
            $preis = filter_input(INPUT_POST, 'umsatz', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $prepare = $connection->prepare('INSERT INTO `einkaufsprozess` (`produktname`, `beschreibung`, `preis`) VALUES (:produktname, :beschreibung, :preis)');
            $prepare->bindParam(':produktname', $produktname, PDO::PARAM_STR);
            $prepare->bindParam(':beschreibung', $beschreibung, PDO::PARAM_STR);
            $prepare->bindParam(':preis', $preis, PDO::PARAM_INT);
            $prepare->execute();

            echo 'Menüpunkt erfolgreich eingetragen.';
            header("Location: https://codevoyage.de/acp/sidebar/left/php/index.php");
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
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.full.footer.inc.php");
?>