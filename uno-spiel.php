<?php
    $bereich = 'Startseite';
    $pageTitle = 'UNO-Spiel';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>

<?php
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

// Schritt 1: Kartendeck in ein flaches Array umwandeln
$spielkarten = [];
foreach ($kartendeck as $farbe => $kartenarten) {
    foreach ($kartenarten as $typ => $karten) {
        foreach ($karten as $karte) {
            $spielkarten[] = $farbe . ' ' . $karte;
        }
    }
}

// Schritt 2: Kartendeck mischen
shuffle($spielkarten);

// Schritt 3: Karten verteilen
$meine_karten = array_splice($spielkarten, 0, 7);  // Die ersten 7 Karten für den Spieler
$gegnerische_karten = array_splice($spielkarten, 0, 7);  // Die nächsten 7 Karten für den Gegner

// Ausgabe zum Testen
echo "\nGegnerische Karten:\n";
print_r($gegnerische_karten);
?>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader" style="margin-bottom: 20px;">Anzahl der Karten beim Gegner:</div>
        <p><?php echo count($gegnerische_karten); ?></p>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Stapel in der Mitte: <?php echo $spielkarten[0]; ?></div>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Meine Karten (Anzahl der Karten: <?php echo count($meine_karten); ?>)</div>
        <ul>
            <?php foreach ($meine_karten as $meine_hand): ?>
            <li><?php echo $meine_hand; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>