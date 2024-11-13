<?php
$bereich = 'Administrationsbereich';
$pageTitle = 'Snippet hinzufügen';
require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>


<form action="" method="post">
    <label for="kategorie"><h3 class="section-title">Kategorie</h3></label>
    <?php echo $section_beginn; ?>
    <select name="kategorie_id" id="kategorie" class="wissensportal-kategorien" required>
    <?php
    $kategorien = $connection->query("SELECT id, name FROM wissensportal_kategorien ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($kategorien as $kategorie) {
        echo "<option value='{$kategorie['id']}'>" . htmlspecialchars($kategorie['name']) . "</option>";
    }
    ?>
    </select>
    <?php echo $section_ende; ?>
    <label for="title"><h3 class="section-title">Titel</h3></label>
    <input type="text" name="title" required><br>

    <label for="url"><h3 class="section-title">URL</h3></label>
    <?php echo $section_beginn; ?>
    <input type="text" name="url" required>
    <?php echo $section_ende; ?>

    <label for="description"><h3 class="section-title">Beschreibung</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="description"></textarea>
    <?php echo $section_ende; ?>

    <label for="php_snippet"><h3 class="section-title">PHP-Snippet</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="php_snippet"></textarea>
    <?php echo $section_ende; ?>

    <label for="php_snippet"><h3 class="section-title">PHP-Snippet (Alternative Syntax)</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="php_snippet_alternativ"></textarea>
    <?php echo $section_ende; ?>

    <label for="python_snippet"><h3 class="section-title">Python Snippet</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="python_snippet"></textarea>
    <?php echo $section_ende; ?>

    <label for="javascript_snippet"><h3 class="section-title">JavaScript Snippet Snippet</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="javascript_snippet"></textarea>
    <?php echo $section_ende; ?>

    <label for="mitteilung_snippet"><h3 class="section-title">Mitteilung</h3></label>
    <?php echo $section_beginn; ?>
    <textarea name="mitteilung_snippet"></textarea>
    <?php echo $section_ende; ?>

    <input type="submit" value="Speichern">
    <input type="reset" value="Zurücksetzen">
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $php_snippet = $_POST['php_snippet'];
    $php_snippet_alternativ = $_POST['php_snippet_alternativ'];
    $python_snippet = $_POST['python_snippet'];
    $javascript_snippet = $_POST['javascript_snippet'];
    $mitteilung_snippet = $_POST['mitteilung_snippet'];
    $kategorie_id = $_POST['kategorie_id'];

    $sql = "INSERT INTO wissensportal (url, title, description, php_snippet, php_snippet_alternativ, python_snippet, javascript_snippet, mitteilung_snippet, kategorie_id) 
            VALUES (:url, :title, :description, :php_snippet, :php_snippet_alternativ, :python_snippet, :javascript_snippet, :mitteilung_snippet, :kategorie_id)";
    $stmt = $connection->prepare($sql);

    try {
        $stmt->execute([
            ':url' => $url,
            ':title' => $title,
            ':description' => $description,
            ':php_snippet' => $php_snippet,
            ':php_snippet_alternativ' => $php_snippet_alternativ,
            ':python_snippet' => $python_snippet,
            ':javascript_snippet' => $javascript_snippet,
            ':mitteilung_snippet' => $mitteilung_snippet,
            ':kategorie_id' => $kategorie_id
        ]);

        header("Location: https://codevoyage.de/acp/wissensportal/index.php");
        exit();
    } catch (PDOException $e) {
        echo "Fehler beim Einfügen der Daten: " . htmlspecialchars($e->getMessage());
    }
}

    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>