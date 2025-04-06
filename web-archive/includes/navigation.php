<div class="navbar">
    <div class="now-box">
        <?php require_once("$_SERVER[DOCUMENT_ROOT]" . "/lib/class/now.class.php"); ?>
        <ul>
            <li class="now-tag"><?= Now::tag(); ?></li>
            <li class="now-datum"><?= Now::datum(); ?></li>
            <li class="now-uhrzeit"><?= Now::uhrzeit(); ?> Uhr</li>
            <li class="now-benutzer"><?= $now->benutzer(); ?></li>
        </ul>
    </div>
    <div class="menu">
        <ul class="navbar">
            <li><a href="../index.php?page=index">Startseite</a></li></li>
            <li><a href="../index.php?page=about">Über mich</a></li>
            <li><a href="../index.php?page=kontakt">Kontakt</a></li>
            <li><a href="../index.php?page=impressum">Impressum</a></li> 
            <li><a href="../index.php?page=datenschutzerklaerung">Datenschutzerklärung</a></li>
        </ul>
    </div>
</div>