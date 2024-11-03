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
    // Hinzufügen der schwarzen Karten (Farbwahl und Farbwahl +4)
    for ($i = 0; $i < 4; $i++) {
        $deck[] = ["farbe" => "Schwarz", "wert" => "Farbwahl"];
        $deck[] = ["farbe" => "Schwarz", "wert" => "Farbwahl +4"];
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
    } while (in_array($erste_karte['wert'], ["Farbwahl", "Farbwahl +4", "Aussetzen", "Richtungswechsel", "+2"]));
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
    if (isset($_POST['spielzug'])) {
        $spielzug_index = intval($_POST['spielzug']);
        $karte_ablegen = $meine_hand[$spielzug_index];

        // Überprüfen, ob Karte abgelegt werden kann
        if ($karte_ablegen['farbe'] === $oberste_karte['farbe'] || $karte_ablegen['wert'] === $oberste_karte['wert'] || $karte_ablegen['farbe'] === "Schwarz") {
            array_push($ablagestapel, $karte_ablegen);
            unset($meine_hand[$spielzug_index]);
            $meine_hand = array_values($meine_hand);

            // Farbwahlbehandlung für Spieler
            if ($karte_ablegen['wert'] === "Farbwahl" || $karte_ablegen['wert'] === "Farbwahl +4") {
                if (!empty($_POST['neue_farbe'])) {
                    // Neue Farbe aus dem Formular setzen
                    $neue_farbe = $_POST['neue_farbe'];
                    $ablagestapel[count($ablagestapel) - 1]['farbe'] = $neue_farbe;
                    echo "<div class='info'>Du hast die Farbe auf " . htmlspecialchars($neue_farbe) . " gesetzt.</div>";
                } else {
                    // Farbauswahl-Formular anzeigen
                    echo "<form method='POST' action=''>";
                    echo "<label for='neue_farbe'>Wähle eine Farbe:</label>";
                    echo "<select name='neue_farbe' id='neue_farbe'>";
                    echo "<option value='Rot'>Rot</option>";
                    echo "<option value='Gelb'>Gelb</option>";
                    echo "<option value='Grün'>Grün</option>";
                    echo "<option value='Blau'>Blau</option>";
                    echo "</select>";
                    echo "<button type='submit'>Bestätigen</button>";
                    echo "</form>";
                    return; // Verhindert, dass der Gegnerzug direkt ausgeführt wird
                }
            }
        } else {
            // Wenn die Karte nicht abgelegt werden kann, eine Karte ziehen
            $gezogene_karte = array_shift($ziehstapel);
            if ($gezogene_karte['farbe'] === $oberste_karte['farbe'] || $gezogene_karte['wert'] === $oberste_karte['wert'] || $gezogene_karte['farbe'] === "Schwarz") {
                array_push($ablagestapel, $gezogene_karte);
                echo "<div class='info'>Du hast eine Karte gezogen und sie abgelegt.</div>";
            } else {
                $meine_hand[] = $gezogene_karte;
                echo "<div class='info'>Du hast eine Karte gezogen, aber sie konnte nicht abgelegt werden.</div>";
            }
        }
    }

    // Gegnerzug
    gegnerZug($gegnerische_hand, $ablagestapel, $ziehstapel);

    // Session-Daten aktualisieren
    $_SESSION['meine_hand'] = $meine_hand;
    $_SESSION['gegnerische_hand'] = $gegnerische_hand;
    $_SESSION['ablagestapel'] = $ablagestapel;
    $_SESSION['ziehstapel'] = $ziehstapel;
}

// Funktion: Gegnerischer Zug
function gegnerZug(&$gegnerische_hand, &$ablagestapel, &$ziehstapel) {
    $oberste_karte = end($ablagestapel); // Aktuelle oberste Karte
    foreach ($gegnerische_hand as $index => $karte) {
        if ($karte['farbe'] === $oberste_karte['farbe'] || $karte['wert'] === $oberste_karte['wert'] || $karte['farbe'] === "Schwarz") {
            // Gegner legt eine Karte ab
            array_push($ablagestapel, $karte);
            unset($gegnerische_hand[$index]);
            $gegnerische_hand = array_values($gegnerische_hand);
            echo "<div class='info'>Der Gegner hat eine Karte abgelegt.</div>";

            // Falls es eine Farbwahlkarte ist, wählt der Gegner eine zufällige Farbe
            if ($karte['wert'] === "Farbwahl" || $karte['wert'] === "Farbwahl +4") {
                $farben = ["Rot", "Gelb", "Grün", "Blau"];
                $zufaellige_farbe = $farben[array_rand($farben)];
                
                // Ändere die Farbe der Karte auf dem Ablagestapel
                $ablagestapel[count($ablagestapel) - 1]['farbe'] = $zufaellige_farbe;
                echo "<div class='info'>Der Gegner hat die Farbe auf " . htmlspecialchars($zufaellige_farbe) . " gesetzt.</div>";
            }
            return;
        }
    }

    // Keine passende Karte, Gegner zieht eine Karte
    $gezogene_karte = array_shift($ziehstapel);
    if ($gezogene_karte['farbe'] === $oberste_karte['farbe'] || $gezogene_karte['wert'] === $oberste_karte['wert'] || $gezogene_karte['farbe'] === "Schwarz") {
        array_push($ablagestapel, $gezogene_karte);
        echo "<div class='info'>Der Gegner hat eine Karte gezogen und sie abgelegt.</div>";
    } else {
        $gegnerische_hand[] = $gezogene_karte;
        echo "<div class='info'>Der Gegner hat eine Karte gezogen, aber sie konnte nicht abgelegt werden.</div>";
    }
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
