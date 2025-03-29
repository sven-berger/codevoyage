<form method="POST" action="">
    <label for="Seitenname">Seitenname</label>
    <input type="text" name="pagename" id="pagename" required>

    <label for="URL">URL</label>
    <input type="text" name="url" id="url" required>

    <label for="Seiteninhalt">Seiteninhalt</label>
    <textarea name="content"></textarea>
    
    <button type="submit" name="submit">Seite hinzufügen</button>
    <button type="reset" name="reset">Zurücksetzen</button>
</form>

<?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pagename']) && isset($_POST['url']) && isset($_POST['content'])) {

    $pagename = htmlspecialchars($_POST['pagename']);
    $url = htmlspecialchars($_POST['url']);
    $content = $_POST['content'];

    $sql = "INSERT INTO pages (pagename, url, content) VALUES ('$pagename', '$url', '$content')";
    $result = $connection->query($sql);

    if($result) {
        // Erstellen einer .lib-Datei
        $file = fopen("../lib/" . $url . ".lib.php", "w");
        // Weiterleitung zur Übersichtsseite
        header("Location: index.php?page=pages");
        fclose($file);
    } else {
        echo "Fehler beim Hinzufügen der Seite";
    }
} ?>