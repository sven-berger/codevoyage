<?php
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/lib/class/stadtliste.class.php";
    $stadtliste = new StadtListe();
    $stadtliste->stadtnamenZaehlen($connection);  // Anzahl der Städte zählen   
    $stadtliste->buchstaben();  // Liste der Buchstaben anzeigen
    $stadtliste->stadtnamen($connection);  // Städte basierend auf dem gewählten Buchstaben anzeigen
?>