<?php 
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/class/Admission/AdmissionAdd.class.php";
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/forms/Admission/AdmisionAdd.form.php";

    if (!empty($_POST['alter_von']) && !empty($_POST['alter_bis']) && !empty($_POST['eintrittspreis'])) {
        $alter_von = (int)$_POST['alter_von'];
        $alter_bis = (int)$_POST['alter_bis'];
        $eintrittspreis = (float)$_POST['eintrittspreis'];

        $eintragen = new EintrittspreiseEintragen($alter_von, $alter_bis, $eintrittspreis);
        $eintragen->addToSql($connection);
    }

    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/class/Admission/AdmissionList.class.php";
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/forms/Admission/AdmisionListEdit.form.php";
    $ausgabe = new AdmissionList ($alter_von, $alter_bis, $connection);
    $ausgabe->getAddmissions($connection);
?>