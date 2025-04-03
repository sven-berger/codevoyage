<?php 
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/class/admission/admissionadd.class.php";
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/forms/admission/admisionadd.form.php";

    if (!empty($_POST['alter_von']) && !empty($_POST['alter_bis']) && !empty($_POST['eintrittspreis'])) {
        $alter_von = (int)$_POST['alter_von'];
        $alter_bis = (int)$_POST['alter_bis'];
        $eintrittspreis = (float)$_POST['eintrittspreis'];

        $eintragen = new EintrittspreiseEintragen($alter_von, $alter_bis, $eintrittspreis);
        $eintragen->addToSql($connection);
    }

    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/class/admission/admissionlist.class.php";
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/forms/admission/admisionlistedit.form.php";
    $ausgabe = new AdmissionList ($alter_von, $alter_bis, $connection);
    $ausgabe->getAddmissions($connection);
?>