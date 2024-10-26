<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Blog-Artikel veröffentlichen";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/acp.header.inc.php");
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!empty($_POST['ueberschrift']) && !empty($_POST['kurzbeschreibung']) && !empty($_POST['inhalt'])) {
            $ueberschrift = filter_input(INPUT_POST, 'ueberschrift', FILTER_SANITIZE_SPECIAL_CHARS);
            $kurzbeschreibung = filter_input(INPUT_POST, 'kurzbeschreibung', FILTER_SANITIZE_SPECIAL_CHARS);
            $inhalt = filter_input(INPUT_POST, 'inhalt', FILTER_SANITIZE_SPECIAL_CHARS);

            $prepare = $connection->prepare('INSERT INTO `blog` (`ueberschrift`, `kurzbeschreibung`, `inhalt`) VALUES (:ueberschrift, :kurzbeschreibung, :inhalt)');
            $prepare->bindParam(':ueberschrift', $ueberschrift, PDO::PARAM_STR);
            $prepare->bindParam(':kurzbeschreibung', $kurzbeschreibung, PDO::PARAM_STR);
            $prepare->bindParam(':inhalt', $inhalt, PDO::PARAM_STR);
            $prepare->execute();

            echo 'Blog-Artikel erfolgreich veröffentlicht.';
            header("Location: https://codevoyage.de/acp/blog/index.php");
            exit();
        } else {
            echo 'Bitte füllen Sie alle Felder aus.';
        }
    } catch (PDOException $e) {
        echo 'Es liegt ein Problem vor: ' . htmlspecialchars($e->getMessage());
    }
}

?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>