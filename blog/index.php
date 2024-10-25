<?php
    $bereich = 'Blog';
    $pageTitle = 'Blog von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/index.header.inc.php");
?>

<?php 

try {
    $sql = "SELECT * FROM `blog`";
    $result = $connection->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>
    <?php if ($result->rowCount() > 0): ?>
        <p>dsafs</p>
        </div>
        </section>
        <?php foreach ($rows as $row): ?>
            <section class="section">
            <div class="sectionContent">
            <h2><?php echo htmlspecialchars($row['ueberschrift']); ?></h2>
            <h4><?php echo htmlspecialchars($row['kurzbeschreibung']); ?></h4>
            <p><?php echo $row['inhalt']; ?></p>
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
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>