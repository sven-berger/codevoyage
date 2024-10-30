<?php
session_start(); // Startet die Session

$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

// Prüft, ob die Karten bereits in der Session gespeichert sind
if (!isset($_SESSION['meine_karten']) || !isset($_SESSION['gegnerische_karten']) || !isset($_SESSION['spielkarten'])) {
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

    // Karten verteilen und in der Session speichern
    $_SESSION['meine_karten'] = array_splice($spielkarten, 0, 7);  // Die ersten 7 Karten für den Spieler
    $_SESSION['gegnerische_karten'] = array_splice($spielkarten, 0, 7);  // Die nächsten 7 Karten für den Gegner
    $_SESSION['spielkarten'] = $spielkarten;  // Das restliche Deck
}

// Spielkarten aus der Session laden
$meine_karten = $_SESSION['meine_karten'];
$gegnerische_karten = $_SESSION['gegnerische_karten'];
$spielkarten = $_SESSION['spielkarten'];
?>

<!-- Anzeige der Karten und anderen Spielinformationen -->
<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Der Gegner hat aktuell <span class="fail"><?php echo count($gegnerische_karten); ?></span> Karten auf der Hand.</div>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Oberste Karte des Stapels: <?php echo $spielkarten[0]['name'] . " (" . $spielkarten[0]['farbe'] . ")"; ?></div>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Meine Karten (Anzahl der Karten: <?php echo count($meine_karten); ?>)</div>
        <ul>
            <?php foreach ($meine_karten as $meine_hand): ?>
            <li style="color:<?php echo strtolower($meine_hand['farbe']); ?>;"><?php echo $meine_hand['name'] . " (" . $meine_hand['farbe'] . ")"; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>