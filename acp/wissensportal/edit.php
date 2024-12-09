<?php
$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet bearbeiten';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");

try {
    $id = $_GET['id'];
    $sql = "SELECT * FROM wissensportal WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id]);
    $snippet = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$snippet) {
        echo "Snippet nicht gefunden!";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kategorie_id = $_POST['kategorie_id'];
        $url = $_POST['url'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $php_snippet = $_POST['php_snippet'];
        $php_snippet_alternativ = $_POST['php_snippet_alternativ'];
        $python_snippet = $_POST['python_snippet'];
        $javascript_snippet = $_POST['javascript_snippet'];
        $mitteilung_snippet = $_POST['mitteilung_snippet'];

        $sql = "UPDATE wissensportal SET kategorie_id = :kategorie_id, url = :url, title = :title, description = :description, php_snippet = :php_snippet, php_snippet_alternativ = :php_snippet_alternativ, python_snippet = :python_snippet, javascript_snippet = :javascript_snippet, mitteilung_snippet = :mitteilung_snippet WHERE id = :id";
        
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            ':kategorie_id' => $kategorie_id,
            ':url' => $url,
            ':title' => $title,
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
    <label for="kategorie"><h3 class="section-title">Kategorie</h3></label>
    <?php echo $section_beginn; ?>
    <select name="kategorie_id" id="kategorie" class="wissensportal-kategorien">
    <?php
    $kategorien = $connection->query("SELECT id, name FROM wissensportal_kategorien ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($kategorien as $kategorie) {
        echo "<option value='{$kategorie['id']}'>" . htmlspecialchars($kategorie['name']) . "</option>";
    }
    ?>
    </select>
    <?php echo $section_ende; ?>
    <label for="title"><h3 class="section-title">Titel</h3></label>
    <?php echo $section_beginn; ?>
    <input type="text" name="title" value="<?php echo htmlspecialchars($snippet['title']); ?>" required>
    <?php echo $section_ende; ?>

    <label for="url"><h3 class="section-title">URL</h3></label>
    <?php echo $section_beginn; ?>
    <input type="text" name="url" value="<?php echo htmlspecialchars($snippet['url']); ?>" required>
    <?php echo $section_ende; ?>

    <label for="description"><h3 class="section-title">Beschreibung</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="description"><?php echo htmlspecialchars($snippet['description']); ?></textarea>
    <?php echo $section_ende; ?>

    <label for="php_snippet"><h3 class="section-title">PHP-Snippet</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="php_snippet"><?php echo htmlspecialchars($snippet['php_snippet']); ?></textarea>
    <?php echo $section_ende; ?>

    <label for="php_snippet"><h3 class="section-title">PHP-Snippet (Alternative Syntax)</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="php_snippet_alternativ"><?php echo htmlspecialchars($snippet['php_snippet_alternativ']); ?></textarea>
    <?php echo $section_ende; ?>

    <label for="python_snippet"><h3 class="section-title">Python Snippet</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="python_snippet"><?php echo htmlspecialchars($snippet['python_snippet']); ?></textarea>
    <?php echo $section_ende; ?>

    <label for="javascript_snippet"><h3 class="section-title">JavaScript Snippet Snippet</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="javascript_snippet"><?php echo htmlspecialchars($snippet['javascript_snippet']); ?></textarea>
    <?php echo $section_ende; ?>

    <label for="mitteilung_snippet"><h3 class="section-title">Mitteilung</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="mitteilung_snippet"><?php echo htmlspecialchars($snippet['mitteilung_snippet']); ?></textarea>
    <?php echo $section_ende; ?>

    <input type="submit" value="Speichern">
    <input type="reset" value="Zurücksetzen">
</form>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>