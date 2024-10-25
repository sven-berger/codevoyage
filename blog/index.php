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
               
        <?php foreach ($rows as $row): ?>
            <div class="selfContent">
                <h2><?php echo htmlspecialchars($row['ueberschrift']); ?></h2>
                <h4><?php echo htmlspecialchars($row['kurzbeschreibung']); ?></h4>
                <p><?php echo $row['inhalt']; ?></p>
            </div>
            
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


<style>
    .selfContent {
        border: 1px solid #D8DAE1;
        background: #fff;
        border-radius: 12px;
        padding: 1em;
        margin: 20px 0 !important;
    }
</style>