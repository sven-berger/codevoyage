<?php
session_start();

$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

// Funktion: Kartendeck generieren
function generiereDeck() {
    $farben = ["Rot", "Gelb", "Grün", "Blau"];
    $deck = [];
    foreach ($farben as $farbe) {
        $deck[] = ["farbe" => $farbe, "wert" => "0"];
        for ($i = 1; $i <= 9; $i++) {
            $deck[] = ["farbe" => $farbe, "wert" => (string)$i];
            $deck[] = ["farbe" => $farbe, "wert" => (string)$i];
        }
    }
    // Hinzufügen von Sonderkarten (z.B. "Aussetzen", "+2", "Richtungswechsel")
    $sonderkarten = ["+2", "Richtungswechsel", "Aussetzen"];
    foreach ($farben as $farbe) {
        foreach ($sonderkarten as $sonderkarte) {
            $deck[] = ["farbe" => $farbe, "wert" => $sonderkarte];
            $deck[] = ["farbe" => $farbe, "wert" => $sonderkarte];
        }
    }
    // Hinzufügen der schwarzen Karten (Farbwahl und +4)
    for ($i = 0; $i < 4; $i++) {
        $deck[] = ["farbe" => "Schwarz", "wert" => "Farbwahl"];
        $deck[] = ["farbe" => "Schwarz", "wert" => "+4"];
    }
    shuffle($deck);
    return $deck;
}

// Initialisierung des Spiels
if (!isset($_SESSION['ziehstapel']) || empty($_SESSION['ziehstapel'])) {
    $ziehstapel = generiereDeck();

    $meine_hand = [];
    $gegnerische_hand = [];
    $ablagestapel = [];

    // 7 Karten an die Hand des Spielers und des Gegners verteilen
    for ($i = 0; $i < 7; $i++) {
        $meine_hand[] = array_shift($ziehstapel);
        $gegnerische_hand[] = array_shift($ziehstapel);
    }

    // 1 Karte an den Ablagestapel, keine Sonderkarten
    do {
        $erste_karte = array_shift($ziehstapel);
    } while (in_array($erste_karte['wert'], ["Farbwahl", "+4", "Aussetzen", "Richtungswechsel", "+2"]));
    $ablagestapel[] = $erste_karte;

    // Speichere die aktuellen Kartenzustände in der Session
    $_SESSION['ziehstapel'] = $ziehstapel;
    $_SESSION['meine_hand'] = $meine_hand;
    $_SESSION['gegnerische_hand'] = $gegnerische_hand;
    $_SESSION['ablagestapel'] = $ablagestapel;
} else {
    // Wenn die Session bereits initialisiert wurde, laden wir die Werte aus der Session
    $ziehstapel = $_SESSION['ziehstapel'];
    $meine_hand = $_SESSION['meine_hand'];
    $gegnerische_hand = $_SESSION['gegnerische_hand'];
    $ablagestapel = $_SESSION['ablagestapel'];
}

// Die oberste Karte des Ablagestapels
$oberste_karte = end($ablagestapel);

// Spielerzug
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $spielzug_index = intval($_POST['spielzug']);
    $karte_ablegen = $meine_hand[$spielzug_index];

    // Überprüfen, ob Karte abgelegt werden kann
    if ($karte_ablegen['farbe'] === $oberste_karte['farbe'] || $karte_ablegen['wert'] === $oberste_karte['wert'] || $karte_ablegen['farbe'] === "Schwarz") {
        array_push($ablagestapel, $karte_ablegen);
        unset($meine_hand[$spielzug_index]);
        $meine_hand = array_values($meine_hand);

        // Gegnerzug
        gegnerZug($gegnerische_hand, $ablagestapel);

        // Session-Daten aktualisieren
        $_SESSION['meine_hand'] = $meine_hand;
        $_SESSION['gegnerische_hand'] = $gegnerische_hand;
        $_SESSION['ablagestapel'] = $ablagestapel;
    } else {
        echo "<div class='error'>Ungültiger Zug. Die Karte passt nicht.</div>";
    }
}

// Funktion: Gegnerischer Zug
function gegnerZug(&$gegnerische_hand, &$ablagestapel) {
    foreach ($gegnerische_hand as $index => $karte) {
        $oberste_karte = end($ablagestapel);
        if ($karte['farbe'] === $oberste_karte['farbe'] || $karte['wert'] === $oberste_karte['wert'] || $karte['farbe'] === "Schwarz") {
            array_push($ablagestapel, $karte);
            unset($gegnerische_hand[$index]);
            $gegnerische_hand = array_values($gegnerische_hand);
            echo "<div class='info'>Der Gegner hat eine Karte abgelegt.</div>";
            return;
        }
    }
    echo "<div class='info'>Der Gegner konnte keine passende Karte ablegen.</div>";
}
?>

<div class="section-title">Gegnerische Hand</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <li>Anzahl: <?php echo count($gegnerische_hand); ?></li>
</ul>
<?php echo $section_ende; ?>

<div class="section-title">Ablagestapel (<?php echo count($ablagestapel); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <li><?php echo htmlspecialchars($oberste_karte['wert'] . " (" . $oberste_karte['farbe'] . ")"); ?></li>
</ul>
<?php echo $section_ende; ?>

<div class="section-title">Meine Karten auf der Hand (Anzahl: <?php echo count($meine_hand); ?>)</div>
<?php echo $section_beginn; ?>
<ul class="auflistung-uno">
    <?php foreach ($meine_hand as $i => $meine_karten): ?>
        <li><?php echo htmlspecialchars($meine_karten['wert'] . " (" . $meine_karten['farbe'] . ")"); ?></li>
    <?php endforeach; ?>
</ul>
<?php echo $section_ende; ?>

<?php echo $section_beginn; ?>
<form method="POST" action="">
    <label for="spielzug">Welche Karte möchtest du ablegen?</label>
    <select name="spielzug" id="spielzug">
        <?php foreach ($meine_hand as $i => $meine_karten): ?>
            <option value="<?php echo $i; ?>">
                <?php echo htmlspecialchars($meine_karten['wert'] . " (" . $meine_karten['farbe'] . ")"); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Karte ablegen</button>
</form>
<?php echo $section_ende; ?>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>