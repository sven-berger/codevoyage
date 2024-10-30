<?php
$bereich = 'Startseite';
$pageTitle = 'UNO-Spiel';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");

$section_beginn = "<section class='section'><div class='sectionContent'>";
$section_ende = "</div></section>";

session_start(); // Startet die Session

// Wenn die Session noch nicht existiert oder das Spiel neu gestartet werden soll
if (!isset($_SESSION['spielkarten'])) {
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
    // Initialisierung des Kartendecks
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

    // Die erste Karte aufdecken
    $_SESSION['ablage_stapel'] = [array_shift($spielkarten)];
}

// Spielkarten aus der Session laden
$meine_karten = $_SESSION['meine_karten'];
$gegnerische_karten = $_SESSION['gegnerische_karten'];
$spielkarten = $_SESSION['spielkarten'];
$ablage_stapel = $_SESSION['ablage_stapel'];

// Farbzuordnung für CSS
$farben_mapping = [
    'Rot' => 'red',
    'Gelb' => '#ffc048',
    'Grün' => 'green',
    'Blau' => 'blue',
    'Spezial' => 'black'
];
?>

<!-- Willkommensformular -->
<?php if (!isset($_SESSION['spiel_start'])): ?>
    <form action="" method="POST">
        <label for="bereit">Bist du bereit für eine Runde UNO?</label>
        <select id="bereit" name="bereit" required>
            <option value="Ja">Ja</option>
            <option value="Nein">Nein</option>
        </select>
        <input type="submit" value="Spiel starten">
    </form>

    <?php
    if (isset($_POST['bereit'])) {
        if ($_POST['bereit'] == "Ja") {
            $_SESSION['spiel_start'] = true; // Markiere, dass das Spiel gestartet wurde
            echo "<p>Die erste Karte ist: " . htmlspecialchars($ablage_stapel[0]['name']) . " (" . htmlspecialchars($ablage_stapel[0]['farbe']) . ")</p>";
        } else {
            echo "Schade, besuche uns doch bald wieder.";
        }
    }
    ?>
<?php else: ?>

<!-- Spielzug prüfen -->
<?php if (isset($_GET['spielzug'])): ?>
    <!-- Die gewählte Karte und Farbe aufteilen -->
    <?php list($gewaehlte_karte, $gewaehlte_farbe) = explode(',', $_GET['spielzug']); ?>

    <!-- Überprüfen, ob die Karte gelegt werden kann -->
    <?php 
    $oberste_karte = $ablage_stapel[0]; // Die oberste Karte des Ablagestapels
    if ($oberste_karte['farbe'] === $gewaehlte_farbe || $oberste_karte['name'] === $gewaehlte_karte || $gewaehlte_karte === 'Farbwahl'): ?>
        <!-- Karte aus der Hand entfernen -->
        <?php foreach ($meine_karten as $key => $karte): ?>
            <?php 
            if ($karte['name'] === $gewaehlte_karte && $karte['farbe'] === $gewaehlte_farbe) {
                unset($meine_karten[$key]);
                $meine_karten = array_values($meine_karten); // Den Index neu ordnen

                // Die gelegte Karte auf den Ablagestapel legen
                array_unshift($ablage_stapel, ['name' => $gewaehlte_karte, 'farbe' => $gewaehlte_farbe]);
                break;
            }
            ?>
        <?php endforeach; ?>

        <!-- Aktualisiere die Handkarten in der Session -->
        <?php 
        $_SESSION['meine_karten'] = $meine_karten;
        $_SESSION['ablage_stapel'] = $ablage_stapel;
        ?>

        <!-- Erfolgreiche Nachricht anzeigen -->
        <?php echo $section_beginn; ?> 
            <p class="success" style="font-weight: bold; text-align: center">
                Du hast folgende Karte gelegt: <?php echo htmlspecialchars($gewaehlte_karte); ?> (<?php echo htmlspecialchars($gewaehlte_farbe); ?>)
            </p>
        <?php echo $section_ende; ?>
   <?php else: ?>
        <!-- Fehlermeldung anzeigen -->
        <?php echo $section_beginn; ?> 
            <p class="fail" style="font-weight: bold; text-align: center">Du kannst diese Karte nicht spielen, bitte wähle eine andere.</p>
        <?php echo $section_ende; ?>
    <?php endif; ?>
<?php endif; ?>

<!-- Anzeige der Karten und anderen Spielinformationen -->
<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Der Gegner hat aktuell <?php echo count($gegnerische_karten); ?> Karten auf der Hand.</div>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Oberste Karte auf dem Ablagestapel: <?php echo htmlspecialchars($ablage_stapel[0]['name']) . " (" . htmlspecialchars($ablage_stapel[0]['farbe']) . ")"; ?></div>
    </div>
</section>

<!-- Anzeige meiner Karten -->
<section class="section">
    <div class="sectionContent">
        <h3>Meine Karten (Anzahl der Karten: <?php echo count($meine_karten); ?>)</h3>
        <ul>
            <?php foreach ($meine_karten as $karte): ?>
                <li style="color:<?php echo $farben_mapping[$karte['farbe']]; ?>;">
                    <?php echo htmlspecialchars($karte['name']) . " (" . htmlspecialchars($karte['farbe']) . ")"; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- Spielzug-Formular -->
<section class="section">
    <div class="sectionContent">
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
    </div>
</section>

<a href="session-kill.php">Session killen</a>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>
<?php endif; ?>
