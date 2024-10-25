<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Startseite - Administrationsbereich";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/header.inc.php");
?>

<?php 

try {
    $sql = "SELECT * FROM `blog`";
    $result = $connection->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>
   <?php if ($result->rowCount() > 0): ?>
        <?php foreach ($rows as $row): ?>
            <h2><?php echo htmlspecialchars($ueberschrift); ?></h2>
            <h4><?php echo htmlspecialchars($kurzbeschreibung); ?></h4>
            <p><?php echo htmlspecialchars($inhalt); ?>
        <?php endforeach; ?>
    <?php else: ?>
        echo "<p style='text-align: center;'>Keine Blog-Artikel gefunden.</p>";
    <?php endif; ?>
<?php } catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . $e->getMessage() . '</p>';
}

?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/footer.inc.php");
?>