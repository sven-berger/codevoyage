<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/functions.inc.php");
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

    <!-- Spielereien -->
    <div class="boxCapital" style="margin-top: 20px;">
        <p>Spielereien</p>
    </div>
    <section class="sidebarBox">
        <div class="boxContent">
            <ul>
                <?php if (!empty($spielereien_liste)): ?>
                    <?php foreach ($spielereien_liste as $row): ?>
                    <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Keine Spielerei und Snippet gefunden.</li>
                <?php endif; ?>
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