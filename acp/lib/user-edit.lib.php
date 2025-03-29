<?php if (isset($_GET['id'])): ?>
    <?php 
        $id = $_GET['id'];

        $sql = "SELECT * FROM benutzer WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
    
        $sql = "SELECT * FROM benutzergruppen";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $benutzergruppen = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    
        require_once 'lib/class/user/useredit.class.php';
        require_once 'lib/forms/user/useredit.form.php';
    ?>
<?php endif; ?>