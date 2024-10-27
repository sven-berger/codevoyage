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

<?php renderSnippetSections($snippetData); ?>

<?php    
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/wissensportal.footer.inc.php");
?>