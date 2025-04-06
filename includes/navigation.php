<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lib/class/now.class.php"); ?>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="nav menu text-white">
            <ul class="list-unstyled d-flex">
              <li class="nav-item"><a href="../index.php?page=index" class="nav-link">Startseite</a></li>
              <li class="nav-item"><a href="../index.php?page=about" class="nav-link">Über mich</a></li>
              <li class="nav-item"><a href="../index.php?page=kontakt" class="nav-link">Kontakt</a></li>
              <li class="nav-item"><a href="../index.php?page=impressum" class="nav-link">Impressum</a></li>
              <li class="nav-item"><a href="../index.php?page=datenschutzerklaerung" class="nav-link">Datenschutzerklärung</a></li>
          </ul>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="nav now-box text-white">
            <ul class="list-unstyled d-flex">
            <li class="nav-item now-tag"><span class="nav-link"><?php echo $now->tag(); ?></span></li>
                <li class="nav-item now-datum"><span class="nav-link"><?php echo $now->datum(); ?></span></li>
                <li class="nav-item now-uhrzeit"><span class="nav-link"><?php echo $now->uhrzeit(); ?> Uhr</span></li>
                <li class="nav-item now-benutzer"><span class="nav-link"><?php echo $now->benutzer(); ?></span></li>
            </ul>
        </div>
    </div>
</div>