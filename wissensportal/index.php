<?php
    $bereich = 'Wissensportal';
    $pageTitle = 'Wissensportal';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/wissensportal.header.inc.php");
?>
    
<?php if (isset($_GET['snippet'])): ?>

    <?php
        $snippetName = $_GET['snippet'];
        $sql = "SELECT * FROM wissensportal WHERE url = :url";
        $stmt = $connection->prepare($sql);    
        $stmt->execute([':url' => $snippetName]);
        $snippet = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($snippet) {
            $url = htmlspecialchars($snippet['url']);
            $title = htmlspecialchars($snippet['title']);
            $description = htmlspecialchars($snippet['description']);
            $phpSnippet = htmlspecialchars($snippet['php_snippet']);
            $php_snippet_alternativ = htmlspecialchars($snippet['php_snippet_alternativ']);
            $pythonSnippet = htmlspecialchars($snippet['python_snippet']);
            $javascriptSnippet = htmlspecialchars($snippet['javascript_snippet']);
            $mitteilungSnippet = $snippet['mitteilung_snippet'];
        } else {
            echo "<section class='section'><div class='sectionContent'>Snippet nicht gefunden oder keine Übereinstimmung.</div></section>";
            require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/wissensportal.footer.inc.php");
            exit;
        }
    ?>

<?php if (!empty($mitteilungSnippet)): ?>
    <div class="mitteilungSnippet">
        <h2>Ein Hinweis in eigener Sache:</h2>
        <p><?php echo $mitteilungSnippet; ?></p>
    </div>
<?php endif; ?>

<?php if (!empty($phpSnippet)): ?>
    <h3 class="section-title">PHP</h3>
    <pre><code class="language-php">
    <?php echo htmlspecialchars("<?php\n"); ?>
        <?php echo $phpSnippet; ?>
        <?php echo htmlspecialchars("?>\n"); ?>
    </code></pre>
<?php endif; ?>

<?php if (!empty($php_snippet_alternativ)): ?>
    <h3 class="section-title">PHP (Alternative Syntax)</h3>
    <pre><code class="language-php"><?php echo htmlspecialchars_decode('<?php' . "\n" . $php_snippet_alternativ . "\n" . '?>'); ?></code></pre>
<?php endif; ?>

<?php if (!empty($pythonSnippet)): ?>
    <h3 class="section-title">Python</h3>
    <pre><code class="language-python"><?php echo $pythonSnippet; ?></code></pre>
<?php endif; ?>

<?php if (!empty($javascriptSnippet)): ?>
    <h3 class="section-title">JavaScript</h3>
    <pre><code class="language-javascript"><?php echo $javascriptSnippet; ?></code></pre>
<?php endif; ?>

<section class="section">
    <div class="sectionContent">
        <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> | <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>">Löschen</a>
    </div>
</section>

<?php else: ?>
    <? require_once ($_SERVER['DOCUMENT_ROOT'] . "/../lib/wissensportal.index.lib.php"); ?>
<?php endif; ?>

<?php    
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/wissensportal.footer.inc.php");
?>