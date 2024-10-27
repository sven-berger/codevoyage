<?php
    $bereich = 'Wissensportal';
    $pageTitle = 'Wissensportal';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.core.header.inc.php");
?>
    
<?php if (isset($_GET['snippet'])): ?>
    <?php 
        $tableName = 'wissensportal';  // Beispiel: gewünschte Tabelle
        $snippetName = $_GET['snippet'];
        $snippetData = getSnippetData($connection, $tableName, $snippetName);

        if ($snippetData) {
            $url = $snippetData['url'];
            $title = $snippetData['title'];
            $description = $snippetData['description'];
            $phpSnippet = $snippetData['php_snippet'];
            $php_snippet_alternativ = $snippetData['php_snippet_alternativ'];
            $pythonSnippet = $snippetData['python_snippet'];
            $javascriptSnippet = $snippetData['javascript_snippet'];
            $mitteilungSnippet = $snippetData['mitteilung_snippet'];
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
    <pre><code class="language-php"><?php echo $phpSnippet; ?></code></pre>
<?php endif; ?>

<?php if (!empty($php_snippet_alternativ)): ?>
    <h3 class="section-title">PHP (Alternative Syntax)</h3>
    <pre><code class="language-php"><?php echo $php_snippet_alternativ; ?></code></pre>
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
        <a href="https://wissensportal.codevoyage.de/acp/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> | <a href="https://wissensportal.codevoyage.de/acp/delete.php?id=<?php echo $snippet['id']; ?>">Löschen</a>
    </div>
</section>

<?php else: ?>
    <? require_once ($_SERVER['DOCUMENT_ROOT'] . "/../lib/wissensportal.index.lib.php"); ?>
<?php endif; ?>

<?php    
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/wissensportal.footer.inc.php");
?>