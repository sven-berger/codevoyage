<?php
    $page = "Administrationsbereich";
    $pageTitle = "Navigationspunkt löschen";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");

    if (isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // Datensatz löschen
        try {
            $prepare = $connection->prepare('DELETE FROM `navigation_header` WHERE `ID` = :id');
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            echo 'Eintrittspreis erfolgreich gelöscht.';
            header("Location: https://codevoyage.de/acp/navigation/header/index.php");
            exit();
        } catch (PDOException $e) {
            echo 'Fehler beim Löschen: ' . $e->getMessage();
        }
    } else {
        echo 'Ungültige ID.';
    }

    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");