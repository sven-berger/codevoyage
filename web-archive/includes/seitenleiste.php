<div class="sidebar">
    <h3>Eigene Werke</h3>
    <ul>
        <li><a href="../web-archive/index.php?page=zahlen-raten">Zahlen raten</a></li>
        <li><a href="../web-archive/index.php?page=mini-taschenrechner">Mini-Taschenrechner</a></li>
        <li><a href="../web-archive/index.php?page=raffle">Mini-Gewinnspiel</a></li>
        <li><a href="../web-archive/index.php?page=bankaccounts">Bankkonten</a></li>
        <li><a href="../web-archive/index.php?page=ortsliste">Ortsliste</a></li>
    </ul>
    <h3>Spielerein</h3>
    <ul>
        <li><a href="../web-archive/index.php?page=text-ausgeben">Text ausgeben (In einer Schleife)</a></li>
        <li><a href="../web-archive/index.php?page=zahlen-ausgeben">Zahlen ausgeben (In einer Schleife)</a></li>
    </ul>
    <h3>Sonstiges</h3>
    <ul>
        <li><a href="../web-archive/index.php?page=einbindung-tinymce">Einbindung: TinyMCE Editor</a></li>
    </ul>

    <div class="sidebar-end">  
    <?php if (!isset($_SESSION['benutzername'])): ?>
        <?php
            include("../web-archive/lib/forms/login.form.php");
            if (isset($_POST['benutzername']) && isset($_POST['passwort'])) {
                require("../web-archive/lib/login.lib.php");
            }
        ?>
    <?php else: ?>
        <ul>
            <li><a href="../web-archive/index.php?page=logout">Ausloggen</a></li>
            <li><a href="../web-archive/acp/index.php">Administrationsbereich</a></li>
        </ul>
    <?php endif; ?>
    </div>
</div>