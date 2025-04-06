<?php
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/class/raffle/raffle.class.php"; 
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/forms/raffle.form.php";

    if (isset($_POST['gewinnerzahl']) && isset($_POST['zeitraumVon']) && isset($_POST['zeitraumBis'])) {
        $gewinnerzahl = (int)$_POST['gewinnerzahl'];
        $zeitraumVon = $_POST['zeitraumVon'];
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
        <th>Von</th>
        <th>Bis</th>
        <th>Status</th>
    </tr>
    <?php if (!empty($daten)): ?>
        <?php foreach ($daten as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['gewinnerzahl']) ?></td>
                <td><?= htmlspecialchars($auswertung->datumFormatieren($row['zeitraumVon'])) ?></td>
                <td><?= htmlspecialchars($auswertung->datumFormatieren($row['zeitraumBis'])) ?></td>
                <td>
                    <?php
                        if ($row['aktiv'] == 0) {
                            echo "Deaktiviert";
                        } else {
                            echo "Aktiv";
                        }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Keine Einträge vorhanden</td>
        </tr>
    <?php endif; ?>
</table>