<?php
    $sql = "SELECT * FROM pages WHERE url = 'about'";
    $result = $connection->query($sql);
?>

<?php foreach ($result as $row): ?>
    <p><?php echo $row['content']; ?></p>
<?php endforeach; ?>