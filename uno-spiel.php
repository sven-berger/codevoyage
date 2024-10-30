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
        <div class="sectionHeader">Der Gegner hat aktuell <?php echo count($gegnerische_karten); ?> Karten auf der Hand.</div>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader"><?php echo $spielkarten[0]['name'] . " (" . $spielkarten[0]['farbe'] . ")"; ?></div>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Meine Karten (Anzahl der Karten: <?php echo count($meine_karten); ?>)</div>
        <ul>
            <?php foreach ($meine_karten as $meine_hand): ?>
            <li class="<?php echo $meine_hand['farbe']; ?>"><?php echo $meine_hand['name'] . " (" . $meine_hand['farbe'] . ")"; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <form action="" method="GET">
            <label for="spielzug">Welche Karte möchtest du legen?</label>
            <select id="spielzug" name="spielzug" required>
                <?php foreach ($meine_karten as $meine_hand): ?>
                    <option value="<?php echo $meine_hand['name'] . ',' . $meine_hand['farbe']; ?>">
                        <?php echo $meine_hand['name'] . " (" . $meine_hand['farbe'] . ")"; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Spielzug durchführen">
        </form>
    </div>
</section>

<?php if (isset($_GET['spielzug'])): ?>
    <?php 
    // Die gewählte Karte und Farbe aufteilen
    list($gewaehlte_karte, $gewaehlte_farbe) = explode(',', $_GET['spielzug']);

    // Überprüfen, ob die Karte gelegt werden kann
    if ($spielkarten[0]['farbe'] === $gewaehlte_farbe || $gewaehlte_karte === 'Farbwahl'): // Falls die Karte die gleiche Farbe hat oder es eine Farbwahl-Karte ist
        // Karte aus der Hand entfernen
        foreach ($meine_karten as $key => $karte) {
            if ($karte['name'] === $gewaehlte_karte && $karte['farbe'] === $gewaehlte_farbe) {
                unset($meine_karten[$key]);
                break;
            }
        }
        // Die gelegte Karte wird auf den Ablagestapel gelegt (hier nur ein Beispiel)
        echo "<p>Du hast folgende Karte gelegt: $gewaehlte_karte ($gewaehlte_farbe)</p>";
    else: 
        echo "<p>Du kannst diese Karte nicht spielen, bitte wähle eine andere.</p>";
    endif; 
endif; 
?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>