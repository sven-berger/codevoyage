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

?>

<?php foreach ($kartendeck as $farbe => $wert): ?>
    <?php echo $section_beginn; ?>
    <div class="sectionHeader"><?php echo $farbe; ?></div>
    <?php if (is_array($wert)): ?>
        <?php foreach ($wert AS $typ => $werte): ?>
        <p><?php echo $typ; ?></p>
        <ul class="auflistung">
            <?php foreach ($werte as $wert): ?>
                <li><?php echo $wert; ?>
            <?php endforeach; ?>
        </ul>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php echo $section_ende; ?>
<?php endforeach; ?>

<?php foreach ($kartendeck as $farbe => $karten): ?>
    <ul class="auflistung-uno">
    <?php 
        // Unterscheiden zwischen normalen Kartenfarben und Spezialkarten
        if (is_array($karten)) {
            foreach ($karten as $typ => $werte) {
                echo "<li><strong>$typ:</strong></li>";
                foreach ($werte as $wert) {
                    echo "<li>$wert</li>";
                }
            }
        } else {
            // Spezialkarten
            foreach ($karten as $wert) {
                echo "<li>$wert</li>";
            }
        }
    ?>
    </ul>
    <?php echo $section_ende; ?>
<?php endforeach; ?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>