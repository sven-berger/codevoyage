<?php
$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet bearbeiten';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/header.inc.php");

try {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM snippets WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id]);
    $snippet = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$snippet) {
        echo "Snippet nicht gefunden!";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $description = $_POST['description'];
        $php_snippet = $_POST['php_snippet'];
        $php_snippet_alternativ = $_POST['php_snippet_alternativ'];
        $python_snippet = $_POST['python_snippet'];
        $javascript_snippet = $_POST['javascript_snippet'];
        $mitteilung_snippet = $_POST['mitteilung_snippet'];

        $sql = "UPDATE wissensportal SET title = :title, url = :url, description = :description, php_snippet = :php_snippet, php_snippet_alternativ = :php_snippet_alternativ, python_snippet = :python_snippet, javascript_snippet = :javascript_snippet, mitteilung_snippet = :mitteilung_snippet WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':url' => $url,
            ':description' => $description,
            ':php_snippet' => $php_snippet,
            ':php_snippet_alternativ' => $php_snippet_alternativ,
            ':python_snippet' => $python_snippet,
            ':javascript_snippet' => $javascript_snippet,
            ':mitteilung_snippet' => $mitteilung_snippet,
            ':id' => $id
        ]);

        header("Location: https://wissensportal.codevoyage.de/index.php?snippet=" . $snippet['url']);
        exit;
    }
    
} catch (PDOException $e) {
    echo "Fehler: " . htmlspecialchars($e->getMessage());
    exit;
}

?>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <label for="title">Titel:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($snippet['title']); ?>" required><br>

    <label for="url">URL:</label>
    <input type="text" name="url" value="<?php echo htmlspecialchars($snippet['url']); ?>" required><br>

    <label for="description">Beschreibung:</label>
    <textarea name="description"><?php echo htmlspecialchars($snippet['description']); ?></textarea><br>

    <label for="php_snippet">PHP Snippet:</label>
    <textarea name="php_snippet"><?php echo htmlspecialchars($snippet['php_snippet']); ?></textarea><br>
    
    <label for="php_snippet_alternativ">PHP Snippet (Alternative Syntax):</label>
    <textarea name="php_snippet_alternativ"><?php echo htmlspecialchars($snippet['php_snippet_alternativ']); ?></textarea><br>


    <label for="python_snippet">Python Snippet:</label>
    <textarea name="python_snippet"><?php echo htmlspecialchars($snippet['python_snippet']); ?></textarea><br>

    <label for="javascript_snippet">JavaScript Snippet:</label>
    <textarea name="javascript_snippet"><?php echo htmlspecialchars($snippet['javascript_snippet']); ?></textarea>

    <label for="mitteilung_snippet">Mitteilung:</label>
    <textarea name="mitteilung_snippet"><?php echo htmlspecialchars($snippet['mitteilung_snippet']); ?></textarea>
    

    <input type="submit" value="Speichern">
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/footer.inc.php");
?>