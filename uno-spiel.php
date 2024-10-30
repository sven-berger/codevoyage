<?php
    $bereich = 'Startseite';
    $pageTitle = 'UNO-Spiel';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>

<?php

$kartendeck = [
    'Rot' => [
        'Zahlen' => array_merge([0], array_fill(0, 2, range(1, 9))),
        'Aktionen' => ['Zieh 2', 'Zieh 2', 'Richtungswechsel', 'Richtungswechsel', 'Aussetzen', 'Aussetzen']
    ],
    'Gelb' => [
        'Zahlen' => array_merge([0], array_fill(0, 2, range(1, 9))),
        'Aktionen' => ['Zieh 2', 'Zieh 2', 'Richtungswechsel', 'Richtungswechsel', 'Aussetzen', 'Aussetzen']
    ],
    'Grün' => [
        'Zahlen' => array_merge([0], array_fill(0, 2, range(1, 9))),
        'Aktionen' => ['Zieh 2', 'Zieh 2', 'Richtungswechsel', 'Richtungswechsel', 'Aussetzen', 'Aussetzen']
    ],
    'Blau' => [
        'Zahlen' => array_merge([0], array_fill(0, 2, range(1, 9))),
        'Aktionen' => ['Zieh 2', 'Zieh 2', 'Richtungswechsel', 'Richtungswechsel', 'Aussetzen', 'Aussetzen']
    ],
    'Spezial' => ['Farbwahl', 'Farbwahl', 'Farbwahl', 'Farbwahl', 'Farbwahl +4', 'Farbwahl +4', 'Farbwahl +4', 'Farbwahl +4']
];

?>

<?php

$meine_karten = [];
$gegnerische_karten = [];
?>


<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Anzahl der Karten beim Gegner</div>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Stapel in der Mitte</div>
    </div>
</section>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Meine Karten (Anzahl der Karten: )</div>
    </div>
</section>


<form method="" method="POST">
    <label for="spielzug" id="spielzug">Spielzug</label>
    <option>Welche Karte möchtest du spielen?</option>
    <select></select>
</form>

<section class="section">
    <div class="sectionContent">
        <div class="sectionHeader">Spielverlauf</div>
    </div>
</section>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>