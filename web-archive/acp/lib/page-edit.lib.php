<?php if (isset($_GET['url'])): ?>
    <?php
        $url = $_GET['url'];
        
        // SQL-Abfrage
        $sql = "SELECT * FROM pages WHERE url = :url";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "Seite nicht gefunden.";
            exit;
        }
    ?>

    <form method="POST" action="">
        <label for="Seitenname">Seitenname</label>
        <input type="text" name="pagename" id="pagename" value="<?php echo htmlspecialchars($row['pagename']); ?>" required>

        <label for="url">URL</label>
        <input type="text" name="url" id="url" value="<?php echo htmlspecialchars($row['url']); ?>" required>

        <label for="Seiteninhalt">Seiteninhalt</label>
        <textarea name="content" id="content" required><?php echo htmlspecialchars($row['content']); ?></textarea>
    
        <button type="submit" name="submit">Seite bearbeiten</button>
        <button type="reset" name="reset">Zurücksetzen</button>
    </form>

    <?php if (isset($_POST['submit'])): ?>
        <?php
            $pagename = $_POST['pagename'];
            $new_url = $_POST['url'];
            $content = $_POST['content'];
    
            $sql = "UPDATE pages SET pagename = :pagename, url = :new_url, content = :content WHERE url = :url";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':pagename', $pagename, PDO::PARAM_STR);
            $stmt->bindParam(':new_url', $new_url, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':url', $url, PDO::PARAM_STR);

            if ($stmt->execute()) {
                header("Location: ../index.php?page=" . urlencode($row['url']));
                exit();
            } else {
                echo "Fehler beim Speichern.";
            }
        ?>
    <?php endif; ?>
<?php endif; ?>