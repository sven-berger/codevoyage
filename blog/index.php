<?php
    $bereich = 'Blog';
    $pageTitle = 'Blog von CodeVoyage.de';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/index.header.inc.php");
?>

<?php
try {
    $sql = "SELECT * FROM `blog`";
    $result = $connection->query($sql);
    $ausgabe = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<p style="text-align: center;">Es liegt ein Problem vor: ' . $e->getMessage() . '</p>';
}
?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/index.footer.inc.php");
?>