<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Eintrittspreise";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.header.inc.php");
?>

<?php
try {
    $sql = "SELECT * FROM `eintrittspreise`";
    $result = $connection->query($sql);
    $ausgabe = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . $e->getMessage() . '</p>';
}
?>

<?php if (count($ausgabe) > 0): ?>
    <table class="table-eintrittspreise">
            <tr>
                <th>Alter</th>
                <th>Eintrittspreis</th>
            </tr>
            <?php foreach ($ausgabe as $preise): ?>
            <tr>
                <td><?php echo htmlspecialchars($preise["alter_von"]); ?> Jahre - <?php echo htmlspecialchars($preise["alter_bis"]); ?> Jahre</td>
                <td>Der Eintritt kostet <strong><?php echo htmlspecialchars($preise["preis"]); ?>€</strong>.</td>
            </tr>
            <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Keine Eintrittspreise gefunden.</p>
<?php endif; ?>

<?php if (!isset($_GET['alter'])): ?>
    <?php echo $section_beginn; ?>
    <form action="eintrittspreise.php" method="get">
        <label for="alter">Bitte gib dein Alter ein:</label>
            <input type="number" id="alter" name="alter" required>
        <button type="submit">Eingabe abschicken</button>
    </form>
    <?php echo $section_ende; ?>
<?php endif; ?>

<?php if (isset($_GET['alter'])): ?>
    <?php $alter = intval($_GET['alter']); $zu_alt = false; ?>
    <?php foreach ($ausgabe as $preise): ?>
        <?php echo $section_beginn;?>
        <?php if ($alter >= $preise["alter_von"] && $alter <= $preise["alter_bis"]): ?>
            <p>Der Eintritt kostet für dich: <strong>" . <?php echo htmlspecialchars($preise["preis"]); ?>€</strong>.</p>
            <?php $zu_alt = true; break; ?>
        <?php endif; ?>
        <?php echo $section_ende; ?>
        <?php endforeach; ?>
        <?php if (!$zu_alt): ?>
            <p>Für dein Alter konnte kein Preis gefunden werden.</p>
        <?php endif; ?>
    <p><br/></p>
    <a href="https://php.codevoyage.de/eintrittspreise.php">Neu berechnen</a>
<?php endif; ?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>