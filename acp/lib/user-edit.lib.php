<?php if (isset($_GET['id'])): ?>
    <?php 
        // OP für Header-Injection
        ob_start();
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
    
    
        require_once 'lib/class/User/UserEdit.class.php';
        require_once 'lib/forms/User/UserEdit.form.php';

        ob_end_flush(); 
    ?>
<?php endif; ?>