<?php
    $page = "Administrationsbereich";
    $pageTitle = "Umsätze bearbeiten";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/acp.header.inc.php");

    if (isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // Daten abrufen, die bearbeitet werden sollen
        try {
            $prepare = $connection->prepare('SELECT * FROM `umsatz_2023` WHERE `ID` = :id');
            $prepare->bindParam(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            $umsatz = $prepare->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Fehler beim Abrufen der Daten: ' . $e->getMessage();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Daten aktualisieren
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $monat = filter_input(INPUT_POST, 'monat', FILTER_SANITIZE_NUMBER_INT);
        $umsatz = filter_input(INPUT_POST, 'umsatz', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        if ($id && $monat !== false && $umsatz !== false) {
            try {
                $prepare = $connection->prepare('UPDATE `umsatz_2023` SET `monat` = :monat, `umsatz` = :umsatz WHERE `ID` = :id');
                $prepare->bindParam(':id', $id, PDO::PARAM_INT);
                $prepare->bindParam(':monat', $monat, PDO::PARAM_INT);
                $prepare->bindParam(':umsatz', $umsatz, PDO::PARAM_STR);
                $prepare->execute();

                echo 'Umsatz erfolgreich aktualisiert.';
                header("Location: https://codevoyage.de/acp/umsatzrechner/2023/index.php");
                exit();
            } catch (PDOException $e) {
                echo 'Fehler beim Aktualisieren: ' . $e->getMessage();
            }
        } else {
            echo 'Bitte geben Sie gültige Werte ein.';
        }
    }
?>

<?php if (isset($umsatz)): ?>
    <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($umsatz['ID']); ?>">
                <div>
                    <label for="monat">Monat:</label>
                    <input type="number" id="monat" name="monat" value="<?php echo htmlspecialchars($umsatz['monat']); ?>" required>
                </div>
                <div>
                    <label for="umsatz">Umsatz:</label>
                    <input type="number" step="0.01" id="umsatz" name="umsatz" value="<?php echo htmlspecialchars($umsatz['umsatz']); ?>" required>
                </div>
                <div>
                    <button type="submit">Speichern</button>
                    <button type="reset">Zurücksetzen</button>
                </div>
            </form>
        <?php else: ?>
            <p>Umsätze nicht gefunden.</p>
        <?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>
