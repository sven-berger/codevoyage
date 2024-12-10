<?php
    $bereich = 'Startseite';
    $pageTitle = 'Startseite von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<section class="section">
    <form>
        <label for="erweiterung">Paket</label>
            <input type="text" id="paket" name="paket">
        <label for="beinhaltet">Beinhaltet</label>
            <input type="text" id="beinhaltet" name="beinhaltet">
        <label for="preis">Preis</label>
            <input type="text" id="preis" name="preis">
        <div class="form-buttons">
            <button type="submit">Absenden</button>
            <button type="reset">Zurücksetzen</button>
        </div>
    </form>
</section>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paket = $_POST['paket'];
    $beinhaltet = $_POST['beinhaltet'];
    $preis = $_POST['preis'];

    try {
        $sql = "INSERT INTO paketbundles (paket, beinhaltet, preis) VALUES (:paket, :beinhaltet, :preis)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':paket', $erweiterung, PDO::PARAM_STR);
        $statement->bindParam(':beinhaltet', $beinhaltet, PDO::PARAM_STR);
        $statement->bindParam(':preis', $preis, PDO::PARAM_STR);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
}
?>

<?php
// Alle Produkte abrufen
$alles_ausgeben = "SELECT * FROM `paketbundles`";
$statement = $connection->query($alles_ausgeben);
$ausgabe = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>Paket</th>
            <th>Beinhaltet</th>
            <th>Preis</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo htmlspecialchars($inhalt['paket']); ?></td>
                <td><?php echo $inhalt['beinhaltet']; ?></td>
                <td><?php echo number_format((float)$inhalt['preis'], 2, ',', '.') . "€"; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>