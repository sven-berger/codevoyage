<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");

try {
    $eigene_werke = "SELECT * FROM `php_sidebar_left_eigene_werke`";
    $spielereien = "SELECT * FROM `php_sidebar_left_spielereien`";
    $sonstiges = "SELECT * FROM `php_sidebar_left_sonstiges`";

    $acp_sidebar_left_seitenleiste = "SELECT * FROM `acp_sidebar_left_seitenleiste`";
    $acp_sidebar_left_eigene_werke = "SELECT * FROM `acp_sidebar_left_eigene_werke`";
    $acp_sidebar_left_wissensportal = "SELECT * FROM `acp_sidebar_left_wissensportal`";
    $acp_sidebar_left_blog = "SELECT * FROM `acp_sidebar_left_blog`";

    $ausgabe_eigene_werke = $connection->query($eigene_werke);
    $ausgabe_spielereien = $connection->query($spielereien);
    $ausgabe_sonstiges = $connection->query($sonstiges);

    $ausgabe_acp_sidebar_left_seitenleiste = $connection->query($acp_sidebar_left_seitenleiste);
    $ausgabe_acp_sidebar_left_eigene_werke = $connection->query($acp_sidebar_left_eigene_werke);
    $ausgabe_acp_sidebar_left_wissensportal = $connection->query($acp_sidebar_left_wissensportal);
    $ausgabe_acp_sidebar_left_blog = $connection->query($acp_sidebar_left_blog);

    $eigene_werke_liste = $ausgabe_eigene_werke->fetchAll(PDO::FETCH_ASSOC);
    $spielereien_liste = $ausgabe_spielereien->fetchAll(PDO::FETCH_ASSOC);
    $sonstiges_liste = $ausgabe_sonstiges->fetchAll(PDO::FETCH_ASSOC);

    $acp_sidebar_left_seitenleiste_liste = $ausgabe_acp_sidebar_left_seitenleiste->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_eigene_werke_liste = $ausgabe_acp_sidebar_left_eigene_werke->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_wissensportal_liste = $ausgabe_acp_sidebar_left_wissensportal->fetchAll(PDO::FETCH_ASSOC);
    $acp_sidebar_left_blog_liste = $ausgabe_acp_sidebar_left_blog->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "<p style='color:red;'>Fehler bei der Abfrage: " . htmlspecialchars($e->getMessage()) . "</p>";
}


function getSnippetTitle(PDO $connection, $snippetName) {
    $sql = "SELECT * FROM wissensportal WHERE url = :url";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':url' => $snippetName]);
    $snippet = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($snippet) {
        return htmlspecialchars($snippet['title']);
    }
    return null;
}

function getSnippetData($connection, $tableName, $snippetName) {
    $sql = "SELECT * FROM $tableName WHERE url = :url";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':url' => $snippetName]);
    $snippet = $stmt->fetch(PDO::FETCH_ASSOC);
        
    if ($snippet) {
        return [
            'url' => htmlspecialchars($snippet['url']),
            'title' => htmlspecialchars($snippet['title']),
            'description' => htmlspecialchars($snippet['description']),
            'php_snippet' => htmlspecialchars($snippet['php_snippet']),
            'php_snippet_alternativ' => htmlspecialchars($snippet['php_snippet_alternativ']),
            'python_snippet' => htmlspecialchars($snippet['python_snippet']),
            'javascript_snippet' => htmlspecialchars($snippet['javascript_snippet']),
            'mitteilung_snippet' => $snippet['mitteilung_snippet']
        ];
    } else {
        echo "<section class='section'><div class='sectionContent'>Snippet nicht gefunden oder keine Übereinstimmung.</div></section>";
        require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
        exit;
    }
}

function renderSnippetSections($snippetData) {
    if (!empty($snippetData['mitteilung_snippet'])) {
        echo '<div class="mitteilungSnippet">';
        echo '<h2>Ein Hinweis in eigener Sache:</h2>';
        echo '<p>' . htmlspecialchars($snippetData['mitteilung_snippet']) . '</p>';
        echo '</div>';
    }

    if (!empty($snippetData['php_snippet'])) {
        echo '<h3 class="section-title">PHP</h3>';
        echo '<pre><code class="language-php">' . htmlspecialchars($snippetData['php_snippet']) . '</code></pre>';
    }

    if (!empty($snippetData['php_snippet_alternativ'])) {
        echo '<h3 class="section-title">PHP (Alternative Syntax)</h3>';
        echo '<pre><code class="language-php">' . htmlspecialchars($snippetData['php_snippet_alternativ']) . '</code></pre>';
    }

    if (!empty($snippetData['python_snippet'])) {
        echo '<h3 class="section-title">Python</h3>';
        echo '<pre><code class="language-python">' . htmlspecialchars($snippetData['python_snippet']) . '</code></pre>';
    }

    if (!empty($snippetData['javascript_snippet'])) {
        echo '<h3 class="section-title">JavaScript</h3>';
        echo '<pre><code class="language-javascript">' . htmlspecialchars($snippetData['javascript_snippet']) . '</code></pre>';
    }

    // Link-Bereich für "Bearbeiten" und "Löschen"
    echo '<section class="section">';
    echo '<div class="sectionContent">';
    echo '<a href="https://wissensportal.codevoyage.de/acp/edit.php?id=' . htmlspecialchars($snippetData['id']) . '">Bearbeiten</a> | ';
    echo '<a href="https://wissensportal.codevoyage.de/acp/delete.php?id=' . htmlspecialchars($snippetData['id']) . '">Löschen</a>';
    echo '</div>';
    echo '</section>';
}
?>