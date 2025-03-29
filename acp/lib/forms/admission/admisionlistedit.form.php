<?php
$statement = $connection->query("SELECT * FROM eintrittspreise");
$statement->execute();
$eintrittspreise = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="POST" action="">
    <table>
        <thead>
            <tr>
                <th>Alter von</th>
                <th>Alter bis</th>
                <th>Eintrittspreis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eintrittspreise as $details): ?>
                <tr>
                    <td><input type="number" id="alter_von" name="alter_von" value="<?= $details['alter_von']; ?>" required></td>
                    <td><input type="number" id="alter_bis" name="alter_bis" value="<?= $details['alter_bis']; ?>" required></td>
                    <td><input type="number" id="eintrittspreis" name="eintrittspreis" step="0.1" value="<?= $details['alter_bis']; ?>" required></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <button type="submit">Eintragen</button>
    <button type="reset">Zurücksetzen</button>
</form>

<?php if(!empty($_POST['alter_von']) && !empty($_POST['alter_bis']) && !empty($_POST['eintrittspreise'])): ?>
    <?php
        $sql = "UPDATE eintrittspreise SET alter_von = :alter_von, alter_bis = :alter_bis, eintrittspreis = :eintrittspreis WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':alter_von', $_POST['alter_von']);
        $statement->bindParam(':alter_bis', $_POST['alter_bis']);
        $statement->bindParam(':eintrittspreis', $_POST['eintrittspreis']);
        $statement->bindParam(':id', $_POST['id']); // ID für die WHERE-Bedingung
    $statement->execute();
    ?>
<?php endif; ?>