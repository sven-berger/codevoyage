<?php
$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

$section_beginn = "<section class='section'><div class='sectionContent'>";
$section_ende = "</div><?php echo $section_ende; ?>";

session_start(); // Startet die Session

$kartendeck = [
    'Rot' => [
        'Zahlen' => [0, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9],
        'Aktionen' => ['Zieh 2', 'Zieh 2', 'Richtungswechsel', 'Richtungswechsel', 'Aussetzen', 'Aussetzen']
    ],
    'Gelb' => [
        'Zahlen' => [0, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9],
        'Aktionen' => ['Zieh 2', 'Zieh 2', 'Richtungswechsel', 'Richtungswechsel', 'Aussetzen', 'Aussetzen']
    ],
    'Grün' => [
        'Zahlen' => [0, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9],
        'Aktionen' => ['Zieh 2', 'Zieh 2', 'Richtungswechsel', 'Richtungswechsel', 'Aussetzen', 'Aussetzen']
    ],
    'Blau' => [
        'Zahlen' => [0, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9],
    'Aktionen' => ['Zieh 2', 'Zieh 2', 'Richtungswechsel', 'Richtungswechsel', 'Aussetzen', 'Aussetzen']
    ],
    'Spezial' => ['Farbwahl', 'Farbwahl', 'Farbwahl', 'Farbwahl', 'Farbwahl +4', 'Farbwahl +4', 'Farbwahl +4', 'Farbwahl +4']
];

// Kartendeck in ein flaches Array umwandeln
$spielkarten = [];
foreach ($kartendeck as $farbe => $kartenarten) {
    foreach ($kartenarten as $typ => $karten) {
        foreach ($karten as $karte) {
            $spielkarten[] = ['name' => $karte, 'farbe' => $farbe];
        }
    }
}

// Kartendeck mischen
shuffle($spielkarten);


// Spielkarten aus der Session laden
$meine_karten = $_SESSION['meine_karten'];
$gegnerische_karten = $_SESSION['gegnerische_karten'];
$spielkarten = $_SESSION['spielkarten'];
$ablage_stapel = $_SESSION['ablage_stapel'];
$aktueller_spieler = $_SESSION['aktueller_spieler'];

?>

<!-- Anzeige der Karten und anderen Spielinformationen -->
<?php echo $section_beginn; ?>
    <div class="sectionHeader">Der Gegner hat aktuell <!-- Anzahl seiner Karten --> Karten auf der Hand.</div>
<?php echo $section_ende; ?>

<?php echo $section_beginn; ?>
    <div class="sectionHeader">Oberste Karte auf dem Ablagestapel:</div>
<?php echo $section_ende; ?>

<!-- Anzeige meiner Karten -->
<?php echo $section_beginn; ?>
    <h3>Meine Karten (Anzahl der Karten: <?php echo count($meine_karten); ?>)</h3>
        <ul>
            <?php foreach ($meine_karten as $karte): ?>
                <li><?php echo $karte; ?></li>
            <?php endforeach; ?>
        </ul>
<?php echo $section_ende; ?>

<!-- Spielzug-Formular -->
<?php echo $section_beginn; ?>
    <form action="" method="GET">
        <label for="spielzug">Welche Karte möchtest du legen?</label>
        <select id="spielzug" name="spielzug" required>
            <?php foreach ($meine_karten as $meine_hand): ?>
                <option value="<?php echo htmlspecialchars($meine_hand['name']) . ',' . htmlspecialchars($meine_hand['farbe']); ?>">
                    <?php echo htmlspecialchars($meine_hand['name']) . " (" . htmlspecialchars($meine_hand['farbe']) . ")"; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Spielzug durchführen">
    </form>
<?php echo $section_ende; ?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>