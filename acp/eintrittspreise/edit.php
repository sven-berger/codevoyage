<?php
$page = "Administrationsbereich";
$pageTitle = "Eintrittspreis bearbeiten";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    try {
        $prepare = $connection->prepare('SELECT * FROM `eintrittspreise` WHERE `ID` = :id');
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        $eintrittspreis = $prepare->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Fehler beim Abrufen der Daten: ' . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $alter_von = filter_input(INPUT_POST, 'alter_von', FILTER_SANITIZE_NUMBER_INT);
    $alter_bis = filter_input(INPUT_POST, 'alter_bis', FILTER_SANITIZE_NUMBER_INT);
    $preis = filter_input(INPUT_POST, 'preis', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if ($id !== false && $alter_von !== false && $alter_bis !== false && $preis !== false) {
        try {
            $prepare = $connection->prepare('UPDATE `eintrittspreise` SET `alter_von` = :alter_von, `alter_bis` = :alter_bis, `preis` = :preis WHERE `ID` = :id');
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->bindParam(':alter_von', $alter_von, PDO::PARAM_INT);
            $prepare->bindParam(':alter_bis', $alter_bis, PDO::PARAM_INT);
            $prepare->bindParam(':preis', $preis, PDO::PARAM_STR);
            $prepare->execute();
            echo 'Eintrittspreis erfolgreich aktualisiert.';
            header("Location: https://codevoyage.de/acp/eintrittspreise/index.php");
            exit();
        } catch (PDOException $e) {
            echo 'Fehler beim Aktualisieren: ' . $e->getMessage();
        }
    }
}

?>

<section class="section">
    <div class="sectionContent">
<?php if (isset($id) && $eintrittspreis): ?>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <div>
            <label for="alter_von">Von Alter:</label>
            <input type="number" id="alter_von" name="alter_von" value="<?php echo htmlspecialchars($eintrittspreis['alter_von']); ?>" required>
        </div>
        <div>
            <label for="alter_bis">Bis Alter:</label>
            <input type="number" id="alter_bis" name="alter_bis" value="<?php echo htmlspecialchars($eintrittspreis['alter_bis']); ?>" required>
        </div>
        <div>
            <label for="preis">Preis:</label>
            <input type="number" step="0.01" id="preis" name="preis" value="<?php echo htmlspecialchars($eintrittspreis['preis']); ?>" required>
        </div>
        <div>
            <button type="submit">Aktualisieren</button>
            <button type="reset">Zurücksetzen</button>
        </div>
    </form>
<?php else: ?>
    <p>Eintrittspreis nicht gefunden.</p>
<?php endif; ?>
</div>
</section>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>
