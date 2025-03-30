<div class="sidebar">
    <h3>Eigene Werke</h3>
    <ul>
        <li><a href="index.php?page=zahlen-raten">Zahlen raten</a></li>
        <li><a href="index.php?page=mini-taschenrechner">Mini-Taschenrechner</a></li>
        <li><a href="index.php?page=raffle">Mini-Gewinnspiel</a></li>
        <li><a href="index.php?page=bankaccounts">Bankkonten</a></li>
        <li><a href="index.php?page=stadtliste">Stadtliste</a></li>
    </ul>
    <h3>Sonstiges</h3>
    <ul>
        <li><a href="index.php?page=einbindung-tinymce">Einbindung: TinyMCE Editor</a></li>
    </ul>

    <div class="sidebar-end">  
    <?php if (!isset($_SESSION['benutzername'])): ?>
        <?php
            include("lib/forms/login.form.php");
            if (isset($_POST['benutzername']) && isset($_POST['passwort'])) {
                require("lib/login.lib.php");
            }
        ?>
    <?php else: ?>
        <ul>
            <li><a href="index.php?page=logout">Ausloggen</a></li>
            <li><a href="../acp/index.php">Administrationsbereich</a></li>
        </ul>
    <?php endif; ?>
    </div>
</div>