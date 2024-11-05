<?php
    $bereich = 'Blog';
    $pageTitle = 'Blog von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<?php 
try {
    $sql = "SELECT * FROM `blog` ORDER BY `ID` DESC";
    $result = $connection->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>
    <?php if ($result->rowCount() > 0): ?>
        <?php foreach ($rows as $row): ?>
            <h3 class="section-title"><?php echo htmlspecialchars($row['ueberschrift']); ?></h3>
            <div class="short-header">
                <h4><?php echo htmlspecialchars($row['kurzbeschreibung']); ?></h4>
            </div>
            </section>
            <section class="section">
                <div class="sectionContent">
                    <p><?php echo $row['inhalt']; ?></p>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align: center;">Keine Blog-Artikel gefunden.</p>  
    <?php endif; ?>
<?php 
} catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage()) . '</p>';
}

?>
           
<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/php.footer.inc.php");
?>