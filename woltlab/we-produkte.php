<?php
    $bereich = 'Startseite';
    $pageTitle = 'Startseite von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<?php echo $section_beginn; ?>
    <form>
        <label for="pluginname">Pluginname</label>
            <input type="text" id="pluginname" name="pluginname">
        <label for="url">URL</label>
            <input type="text" id="url" name="url">
        <label for="preis">Preis</label>
            <input type="text" id="preis" name="preis">
        <div class="form-buttons">
                <button type="submit">Absenden</button>
                <button type="reset">Zurücksetzen</button>
        </div>
    </form>
<?php echo $section_ende; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paket = $_POST['pluginname'];
    $beinhaltet = $_POST['url'];
    $preis = $_POST['preis'];

    try {
        $sql = "INSERT INTO `drittanbieter_wbb-elite-rechnung` (pluginname, url, preis) VALUES (:pluginname`, :url, :preis)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':pluginname', $erweiterung, PDO::PARAM_STR);
        $statement->bindParam(':url', $beinhaltet, PDO::PARAM_STR);
        $statement->bindParam(':preis', $preis, PDO::PARAM_STR);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
}
?>

<?php
// Alle Produkte abrufen
$alles_ausgeben = "SELECT * FROM `drittanbieter_wbb-elite-rechnung`";
$statement = $connection->query($alles_ausgeben);
$ausgabe = $statement->fetchAll(PDO::FETCH_ASSOC);

// Statistik ausgeben
$gezielt_ausgeben = "SELECT COUNT(*) AS produkt, SUM(preis) AS gesamtwert FROM `drittanbieter_wbb-elite-rechnung`";
$statement = $connection->query($gezielt_ausgeben);
$gezielte_ausgaben = $statement->fetch(PDO::FETCH_ASSOC);

// Wertvollste Produkte ausgeben
$wertvollste_produkte = "SELECT pluginname, preis FROM `drittanbieter_wbb-elite-rechnung` ORDER BY preis DESC LIMIT 5";
$statement = $connection->query($wertvollste_produkte);
$wertvollste_ausgaben = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
    <div class="col-md-6">
        <div class="section-title">Übersicht</div>
        <table>
            <thead>
                <tr>
                    <th>Plugin / Endanwendung</th>
                    <th>Preis</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ausgabe as $inhalt): ?>
                <tr>
                    <td><a href="<?php echo htmlspecialchars($inhalt['url']); ?>"><?php echo htmlspecialchars($inhalt['pluginname']); ?></a></td>
                    <td><?php echo number_format((float)$inhalt['preis'], 2, ',', '.') . "€"; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div class="section-title">Statistik</div>
        <table>
            <thead>
                <tr>
                    <th>Anzahl der Produkte</th>
                    <th>Gesamtwert</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo (int)$gezielte_ausgaben['produkt']; ?></td>
                    <td><?php echo number_format((float)$gezielte_ausgaben['gesamtwert'], 2, ',', '.') . "€"; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="section-title">Wertvollste Produkte</div>
        <table>
            <thead>
                <tr>
                    <th>Produkt</th>
                    <th>Wert</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wertvollste_ausgaben as $produkt): ?>
                <tr>
                    <td><?php echo htmlspecialchars($produkt['pluginname']); ?></td>
                    <td><?php echo number_format((float)$produkt['preis'], 2, ',', '.') . "€"; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>