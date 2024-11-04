<?php
    $page = "Administrationsbereich";
    $pageTitle = "Navigationspunkt löschen";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/core.header.inc.php");

    if (isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // Datensatz löschen
        try {
            $prepare = $connection->prepare('DELETE FROM `acp_sidebar_left_navigation_header` WHERE `ID` = :id');
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            header("Location: https://codevoyage.de/acp/sidebar/left/acp/index.php");
            exit();
        } catch (PDOException $e) {
            echo 'Fehler beim Löschen: ' . $e->getMessage();
        }
    } else {
        echo 'Ungültige ID.';
    }

    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");