<?php
    $bereich = 'Startseite';
    $pageTitle = 'Startseite von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<section class="section">
    <form>
        <label for="erweiterung">Erweiterung</label>
            <input type="text" id="erweiterung" name="erweiterung">
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
    $erweiterung = $_POST['erweiterung'];
    $preis = $_POST['preis'];

    try {
        $sql = "INSERT INTO viecode-shop (erweiterung, preis) VALUES (:erweiterung, :preis)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':erweiterung', $erweiterung, PDO::PARAM_STR);
        $statement->bindParam(':preis', $preis, PDO::PARAM_STR);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
}
?>

<?php
// Alle Produkte abrufen
$alles_ausgeben = "SELECT * FROM `viecode-shop`";
$statement = $connection->query($alles_ausgeben);
$ausgabe = $statement->fetchAll(PDO::FETCH_ASSOC);

// Extras abrufen
$extras_ausgeben = "SELECT * FROM `viecode-shop` WHERE (`erweiterung` IN ('BrandingFree Lizenz', 'Installations-/Upgradeservice'))";
$statement = $connection->query($extras_ausgeben);
$extra_ausgabe = $statement->fetchAll(PDO::FETCH_ASSOC);

// Extra Leistungen abrufen
$serviceleistungen_ausgeben = "SELECT COUNT(*) AS produkt, SUM(preis) AS gesamtwert FROM `viecode-shop` WHERE (`erweiterung` IN ('BrandingFree Lizenz', 'Installations-/Upgradeservice'))";
$statement = $connection->query($serviceleistungen_ausgeben);
$serviceleistungen_ausgabe = $statement->fetch(PDO::FETCH_ASSOC);

// Statistik ausgeben
$gezielt_ausgeben = "SELECT COUNT(*) AS produkt, SUM(preis) AS gesamtwert FROM `viecode-shop` WHERE erweiterung NOT IN ('BrandingFree Lizenz', 'Installations-/Upgradeservice');";
$statement = $connection->query($gezielt_ausgeben);
$gezielte_ausgaben = $statement->fetch(PDO::FETCH_ASSOC);

// Wertvollste Produkte ausgeben
$wertvollste_produkte = "SELECT * FROM `viecode-shop` WHERE erweiterung NOT IN ('BrandingFree Lizenz', 'Installations-/Upgradeservice') ORDER BY preis DESC LIMIT 5";
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
                    <td><?php echo htmlspecialchars($inhalt['erweiterung']); ?></td>
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
                    <td><?php echo htmlspecialchars($inhalt['erweiterung']); ?></td>
                    <td><?php echo number_format((float)$inhalt['preis'], 2, ',', '.') . "€"; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div class="section-title">Statistik <sup>*</sup></div>
        <table>
            <tr>
                <th>Anzahl der Produkte</th>
                <th>Gesamtwert</th>
            </tr>
            <tr>
                <td><?php echo (int)$gezielte_ausgaben['produkt']; ?></td>
                <td><?php echo number_format((float)$gezielte_ausgaben['gesamtwert'], 2, ',', '.') . "€"; ?></td>
            </tr>
        </table>
        <div class="section-title">Extras</div>
        <table>
            <tr>
                <th>Anzahl der Leistungen</th>
                <th>Gesamtwert</th>
            </tr>
            <tr>
                <td><?php echo (int)$serviceleistungen_ausgabe['produkt']; ?></td>
                <td><?php echo number_format((float)$serviceleistungen_ausgabe['gesamtwert'], 2, ',', '.') . "€"; ?></td>
            </tr>
        </table>
        <div class="section-title">Gesamtkosten</div>
        <div class="row">
            <div class="col-md-6">
                <table>
                    <thead>
                        <tr>
                            <th class="table_gesamtkosten">Mit allen Erweiterungen (ohne Serviceleistungen)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table_gesamtkosten">
                                <?php 
                                $gesamtwert = (float)($gezielte_ausgaben['gesamtwert'] ?? 0);
                                $zusatzwert = 69.37;
                                $ergebnis = $gesamtwert + $zusatzwert;
                                echo number_format($ergebnis, 2, ',', '.') . "€";
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table>
                    <thead>
                        <tr>
                            <th class="table_gesamtkosten">Mit allen Erweiterungen und mit Serviceleistungen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table_gesamtkosten">
                                <?php 
                                $gesamtwert2 = (float)($serviceleistungen_ausgabe['gesamtwert'] ?? 0);
                                $ergebnis2 = $gesamtwert + $gesamtwert2 + $zusatzwert;
                                echo number_format($ergebnis2, 2, ',', '.') . "€";
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="section-title">Wertvollste Produkte <sup>*</sup></div>
        <table>
            <thead>
                <tr>
                    <th>Produkt</th>
                    <th>Wert</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wertvollste_ausgaben as $inhalt): ?>
                <tr>
                    <td><?php echo htmlspecialchars($inhalt['erweiterung']); ?></td>
                    <td><?php echo number_format((float)$inhalt['preis'], 2, ',', '.') . "€"; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="kleingedrucktes">
            <sup>*</sup> <span>BrandingFree Lizenz und Installations-/Upgradeservice ausgeschlossen.</span>
        </div>
    </div>
</div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>