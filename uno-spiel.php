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
                $spielkarten[] = ['name' => $karte . " (" . $farbe . ")", 'farbe' => $farbe];
            }
        }
    }

    // Schritt 2: Kartendeck mischen
    shuffle($spielkarten);

    // Schritt 3: Karten verteilen
    $meine_karten = array_splice($spielkarten, 0, 7);
    $gegnerische_karten = array_splice($spielkarten, 0, 7);
?>

<style>
    .Rot { color: red; }
    .Gelb { color: gold; }
    .Grün { color: green; }
    .Blau { color: blue; }
    .Spezial { color: black; }
</style>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Meine Karten (Anzahl der Karten: <?php echo count($meine_karten); ?>)</div>
        <ul>
            <?php foreach ($meine_karten as $karte): ?>
            <li class="<?php echo $karte['farbe']; ?>"><?php echo $karte['name']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>