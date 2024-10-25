<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");

    try {
        $eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
        $spielereien_und_snippets = "SELECT * FROM `php_sidebar_left_spielereien_und_snippets`";

        $ausgabe_eigene_werke = $connection->query($eigene_werke);
        $ausgabe_spielereien_und_snippets = $connection->query($spielereien_und_snippets);

        $eigene_werke_liste = $ausgabe_eigene_werke -> fetchAll(PDO::FETCH_ASSOC);
        $spielereien_und_snippets = $ausgabe_spielereien_und_snippets -> fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "<p style='color:red;'>Fehler bei der Abfrage: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
?>

<nav>
    <!-- Eigene Werke -->
    <div class="boxCapital" style="margin-top: 20px;">
        <p>Eigene Werke</p>
    </div>
    <section class="sidebarBox">
        <div class="boxContent">
            <ul>
                <?php if (!empty($eigene_werke_liste)): ?>
                    <?php foreach ($eigene_werke_liste as $row): ?>
                    <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Keine eigenen Werke gefunden.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <!--Spielereien & Snippets -->
    <div class="boxCapital" style="margin-top: 20px;">
        <p>Eigene Werke</p>
    </div>
    <section class="sidebarBox">
        <div class="boxContent">
            <ul>
                <?php if (!empty($spielereien_und_snippets)): ?>
                    <?php foreach ($spielereien_und_snippets as $row): ?>
                    <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Keine eigenen Werke gefunden.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <!-- Statische Eigene Werke-Liste -->
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

    <!-- Statische Spielereien & Snippets -->
    <div class="boxCapital">
        <p>Spielereien & Snippets</p>
    </div>
    <section class="sidebarBox">
        <div class="boxContent">
            <ul>
                <li><a href="https://php.codevoyage.de/screensaver.php">Screensaver</a></li>
                <li><a href="https://php.codevoyage.de/schwarzes_loch.php">Ein schwarzes Loch</a></li>
            </ul>
        </div>
    </section>

    <!-- Sonstiges -->
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