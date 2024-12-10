<?php
    $bereich = 'Startseite';
    $pageTitle = 'Startseite von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<section class="section">
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
</section>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paket = $_POST['pluginname'];
    $beinhaltet = $_POST['url'];
    $preis = $_POST['preis'];

    try {
        $sql = "INSERT INTO `softcreatr-rechnung` (pluginname, url, preis) VALUES (:pluginname`, :url, :preis)";
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
$alles_ausgeben = "SELECT * FROM `softcreatr-rechnung` WHERE pluginname NOT LIKE 'Branding Free:%' AND pluginname NOT LIKE 'VieCode Shop:%' AND pluginname NOT IN ('Season-Pass 6.0', 'Season-Pass 6.1', 'Persönlicher Service');";
$statement = $connection->query($alles_ausgeben);
$ausgabe = $statement->fetchAll(PDO::FETCH_ASSOC);

// Extras abrufen
$extras_ausgeben = "SELECT * FROM `softcreatr-rechnung` WHERE (`pluginname` LIKE 'Branding Free:%') OR (`pluginname` LIKE 'VieCode Shop:%') OR (`pluginname` IN ('Season-Pass 6.0', 'Season-Pass 6.1', 'Persönlicher Service'))";
$statement = $connection->query($extras_ausgeben);
$extra_ausgabe = $statement->fetchAll(PDO::FETCH_ASSOC);

// Statistik abrufen
$gezielt_ausgeben = "SELECT COUNT(*) AS produkt, SUM(preis) AS gesamtwert FROM `softcreatr-rechnung` WHERE pluginname NOT LIKE 'Branding Free:%' AND pluginname NOT LIKE 'VieCode Shop:%' AND pluginname NOT IN ('Season-Pass 6.0', 'Season-Pass 6.1', 'Persönlicher Service');";
$statement = $connection->query($gezielt_ausgeben);
$gezielte_ausgaben = $statement->fetch(PDO::FETCH_ASSOC);

// Extra Leistungen abrufen
$serviceleistungen_ausgeben = "SELECT COUNT(*) AS produkt, SUM(preis) AS gesamtwert FROM `softcreatr-rechnung` WHERE (`pluginname` LIKE 'Branding Free:%') OR (`pluginname` LIKE 'VieCode Shop:%') OR (`pluginname` IN ('Season-Pass 6.0', 'Season-Pass 6.1', 'Persönlicher Service'))";
$statement = $connection->query($serviceleistungen_ausgeben);
$serviceleistungen_ausgabe = $statement->fetch(PDO::FETCH_ASSOC);

// Wertvollste Produkte abrufen
$wertvollste_produkte = "SELECT * FROM `softcreatr-rechnung` WHERE pluginname NOT LIKE 'Branding Free:%' AND pluginname NOT LIKE 'VieCode Shop:%' AND pluginname NOT IN ('Season-Pass 6.0', 'Season-Pass 6.1', 'Persönlicher Service') ORDER BY preis DESC LIMIT 5;";
$statement = $connection->query($wertvollste_produkte);
$wertvollste_ausgaben = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="row">
    <div class="col-md-6">
        <div class="section-title">Übersicht</div>
        <table>
            <thead>
                <tr>
                    <th>Erweiterung</th>
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
        <div class="section-title">Extras</div>
        <table>
            <thead>
                <tr>
                    <th>Serviceleistung</th>
                    <th>Preis</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extra_ausgabe as $inhalt): ?>
                <tr>
                    <td><a href="<?php echo htmlspecialchars($inhalt['url']); ?>"><?php echo htmlspecialchars($inhalt['pluginname']); ?></a></td>
                    <td><?php echo number_format((float)$inhalt['preis'], 2, ',', '.') . "€"; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div class="section-title">Statistik <sup>*</sup></div>
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
        <div class="section-title">Extras</div>
        <table>
            <thead>
                <tr>
                    <th>Anzahl der Leistungen</th>
                    <th>Gesamtwert</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo (int)$serviceleistungen_ausgabe['produkt']; ?></td>
                    <td><?php echo number_format((float)$serviceleistungen_ausgabe['gesamtwert'], 2, ',', '.') . "€"; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="section-title">Wertvollste Produkte <sup>*</sup></div>
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
        <div class="kleingedrucktes">
            <sup>*</sup> <span>Sämtliche Branding Free-Pakete, Erweiterungen für VieCode Shop, der Persönliche Service, sowie Season-Pass 6.0 / Season-Pass 6.1 ausgeschlossen.</span>
        </div>
</div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>