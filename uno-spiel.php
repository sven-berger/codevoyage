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
    'Spezialkarten' => ['Farbwahl', 'Farbwahl', 'Farbwahl', 'Farbwahl', 'Farbwahl +4', 'Farbwahl +4', 'Farbwahl +4', 'Farbwahl +4']
];

?>

<?php foreach ($kartendeck as $farbe => $wert): ?>
    <h3 class="section-title"><?php echo $farbe; ?></h3>
    <?php if (is_array($wert) && $farbe != 'Spezial'): ?>
        <?php foreach ($wert as $typ => $werte): ?>
            <?php echo $section_beginn; ?>
            <div class="uno-typ"><?php echo $typ; ?></div>
            <ul class="auflistung-uno">
                <?php foreach ($werte as $einzelwert): ?>
                    <li><?php echo $einzelwert; ?></li>
                <?php endforeach; ?>
            </ul>
            <?php echo $section_ende; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <ul class="auflistung-uno">
            <?php foreach ($wert as $spezialkarte): ?>
                <li><?php echo $spezialkarte; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endforeach; ?>

<style>
    .auflistung-uno {
        list-style: none;
        padding-left: 20px;
        display: flex !important;
        flex-direction: column; /* Verhindert horizontale Anordnung der Elemente */
    }
    .auflistung-uno li::before {
        content: '\f0da '; /* Setzt das Icon als Aufzählungszeichen */
        font-family: "Font Awesome 5 Free"; /* Font Awesome Familie angeben */
        font-weight: 900; /* Für die richtige Gewichtung von Icons */
        color: #3579BD;
        margin-right: 5px;
    }
    .uno-typ {
        font-weight: bold;
        margin: 10px 0;
    }
</style>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>