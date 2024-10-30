<?php
    $bereich = 'Startseite';
    $pageTitle = 'UNO-Spiel';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>

<?php
$deck = [
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

// Schritt 1: Deck in ein flaches Array umwandeln
$flaches_deck = [];
foreach ($deck as $farbe => $kartenarten) {
    foreach ($kartenarten as $typ => $karten) {
        foreach ($karten as $karte) {
            $flaches_deck[] = $farbe . ' ' . $karte;
        }
    }
}

// Schritt 2: Deck mischen
shuffle($flaches_deck);

// Schritt 3: Karten verteilen
$meine_karten = array_splice($flaches_deck, 0, 7);  // Die ersten 7 Karten für den Spieler
$gegnerische_karten = array_splice($flaches_deck, 0, 7);  // Die nächsten 7 Karten für den Gegner

// Ausgabe zum Testen
echo "Meine Karten:\n";
print_r($meine_karten);

echo "\nGegnerische Karten:\n";
print_r($gegnerische_karten);
?>



<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Anzahl der Karten beim Gegner: </div>
        <p></p>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Stapel in der Mitte</div>
        <p>Aktuell liegt folgende Karte oben: </p>
        <p>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Meine Karten (Anzahl der Karten: )</div>
        <ul>
            <li></li>
        </ul>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
<form method="" method="POST">
<form action="" method="get">
    <label for="spielzug">Welchen Spielzug möchtest du ausführen?</label>
    <option type="number" id="zahl1" name="zahl1" required>
        <select></select>
    </option>
    <input type="submit" value="Spielzug durchführen">
</form>
</div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Spielverlauf</div>
        <ul>
            <li></li>
        </ul>
    </div>
</section>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>