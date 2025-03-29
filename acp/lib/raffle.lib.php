<?php
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/class/raffle/raffle.class.php"; 
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/forms/raffle.form.php";

    if (isset($_POST['gewinnerzahl']) && isset($_POST['zeitraumVon']) && isset($_POST['zeitraumBis'])) {
        $gewinnerzahl = (int)$_POST['gewinnerzahl'];
        $zeitraumVon = $_POST['zeitraumVon']; // Kein htmlspecialchars nötig für Datum
        $zeitraumBis = $_POST['zeitraumBis'];

        $gewinnspiel = new Gewinnspiel($gewinnerzahl, $zeitraumVon, $zeitraumBis);
        $gewinnspiel->setDataSql($connection);
    }

    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/class/raffle/raffleTable.class.php"; 
    $auswertung = new GewinnspielTabelle();
    $auswertung->getDataSql($connection);
    $daten = $auswertung->getDaten();
?>

<table>
    <tr>
        <th>ID</th>
        <th>Gewinnerzahl</th>
        <th>Zeitraum (Von)</th>
        <th>Zeitraum (Bis)</th>
    </tr>
    <?php if (!empty($daten)): ?>
        <?php foreach ($daten as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['gewinnerzahl']) ?></td>
                <td><?= htmlspecialchars($auswertung->datumFormatieren($row['zeitraumVon'])) ?></td>
                <td><?= htmlspecialchars($auswertung->datumFormatieren($row['zeitraumBis'])) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Keine Einträge vorhanden</td>
        </tr>
    <?php endif; ?>
</table>