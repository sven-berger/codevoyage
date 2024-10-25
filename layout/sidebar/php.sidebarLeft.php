<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");
    $result = $connection->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<nav>
<div class="boxCapital" style="margin-top: 20px;">
    <p>Eigene Werke</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php $sql = "SELECT * FROM `php_sidebar_left_eigene_werke`"; ?>
            <?php foreach ($rows as $row): ?>
            <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<div class="boxCapital" style="margin-top: 20px;">
    <p>Eigene Werke</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <li><a href="https://php.codevoyage.de/umsatzrechner_2023.php">Umsatzrechner</a></li>
            <li><a href="https://php.codevoyage.de/eintrittspreise.php">Eintrittspreis-Rechner</a></li>
            <li><a href="https://php.codevoyage.de/passwortgenerator.php">Passwortgenerator</a></li>
            <li><a href="https://php.codevoyage.de/einfaches-gewinnspiel.php">Einfaches Gewinnspiel</a></li>
            <li><a href="https://php.codevoyage.de/mini-taschenrechner.php">Mini-Taschenrechner</a></li>
            <li><a href="https://php.codevoyage.de/zahlen-raten.php">Zahlen raten</a></li>
            <li><a href="https://php.codevoyage.de/speicherdaten-umrechner.php">Speicherdaten-Umrechner</a></li>
         </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Spielerein & Snippets</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <li><a href="https://php.codevoyage.de/screensaver.php">Screensaver</a></li>
            <li><a href="https://php.codevoyage.de/schwarzes_loch.php">Ein schwarzes Loch</a></li>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Sonstiges</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <li><a href="https://php.codevoyage.de/mathematische-operatoren-teil1.php">Mathematische Operatoren: Teil 1</a></li>
            <li><a href="https://php.codevoyage.de/mathematische-operatoren-teil2.php">Mathematische Operatoren: Teil 2</a></li>
            <li><a href="https://php.codevoyage.de/mathematische-operatoren-teil3.php">Mathematische Operatoren: Teil 3</a></li>
        </ul>
        <ul>
            <li><a href="https://php.codevoyage.de/anleitung-github.php">Eine Kurzanleitung für GitHub</a></li>
            <li><a href="https://php.codevoyage.de/anleitung-flask.php">Eine Kurzanleitung für Flask</a></li>
        </ul>
        <ul>
            <li><a href="https://php.codevoyage.de/database-test.php">Datenbanktest</a></li>
        </ul>
    </div>
</section>    
</nav>