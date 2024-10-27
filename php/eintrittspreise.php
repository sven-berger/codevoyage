<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Eintrittspreise";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/php.header.inc.php");
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

</div>
</section>

<?php if (!isset($_GET['alter'])): ?>
    <section class="section">
        <div class="sectionContent">
        <form action="eintrittspreise.php" method="get">
                <label for="alter">Bitte gib dein Alter ein:</label>
                <input type="number" id="alter" name="alter" required>
                <button type="submit">Eingabe abschicken</button>
        </form>
<?php endif; ?>

<?php if (isset($_GET['alter'])): ?>
    <section class="section">
        <div class="sectionContent">
        <?php 
            $alter = intval($_GET['alter']);
            $zu_alt = false;
            foreach ($ausgabe as $preise) {
                if ($alter >= $preise["alter_von"] && $alter <= $preise["alter_bis"]) {
                    echo "Der Eintritt kostet für dich: <strong>" . htmlspecialchars($preise["preis"]) . "€</strong>.";
                    $zu_alt = true;
                    break;
                }
            }
            if (!$zu_alt) {
                echo "Für dein Alter konnte kein Preis gefunden werden.";
            }
            ?>
    <p><br/></p>
    <a href="https://php.codevoyage.de/eintrittspreise.php">Neu berechnen</a>
<?php endif; ?>



<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
    ?>