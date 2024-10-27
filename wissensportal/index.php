<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://codevoyage.de/python/static/css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title><?php echo $pageTitle; ?></title>
</head>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../includes/database.inc.php");
    // require_once ($_SERVER['DOCUMENT_ROOT'] . "/../includes/functions.inc.php");
    $mariadbVersion = getMariaDBVersion($connection);
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../includes/var.inc.php");
?>

<body>

    <div class="header">
    <a href="https://codevoyage.de/">
        <h2 align="center">Willkommen auf meinem Apache-Webserver!</h2>
    </a>
    <h3 align="center">Dieser Server verwendet <a href="https://mariadb.org/" style="color: darkred;" target="_blank">MariaDB <?php echo htmlspecialchars($mariadbVersion); ?></a></h3>
    <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/../includes/navigation.inc.php"); ?>
    </div>
    <div class="main">
        <div class="content">
            <h2><?php echo $pageTitle; ?></h2>
    
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
            require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
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

</div>

<?php
    echo $wissensportal_sidebarLeft;
    echo $wissensportal_sidebarRight;
?>

</div>

<?php
    echo $footer;
?>

</body>
</html>