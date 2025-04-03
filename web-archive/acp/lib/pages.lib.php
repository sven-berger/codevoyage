<?php
$sql = "SELECT * FROM pages";
$result = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Seitenname</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><a href="../index.php?page=<?php echo $row['url']; ?>" target="_blank"><?php echo $row['pagename']; ?></a></td>
            <td><a href="index.php?page=page-edit&url=<?php echo $row['url']; ?>">Bearbeiten</a> | <a href="index.php?page=page-delete&url=<?php echo $row['url']; ?>">Löschen</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>