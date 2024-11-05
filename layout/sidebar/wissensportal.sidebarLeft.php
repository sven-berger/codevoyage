<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/sql/wissensportal.sql.php";

// Definiere die Kategorien und die zugehörigen Snippet-Variablen
$sections = [
    'Variablen' => $variablen_snippets ?? [],
    'Arrays / Listen' => $arrays_snippets ?? [],
    'Assoziatives Array / Einfaches Dictionarie' => $assoziatives_array_snippets ?? [],
    'Mehrdimensionales Array / Mehrfaches Dictionarie' => $mehrdimensionales_array_snippets ?? [],
    'for-Schleife' => $for_snippets ?? [],
    'if, else, elseif/elif' => $if_snippets ?? [],
    'Funktionen' => $funktionen_snippets ?? [],
    'Objektorientiertes Programmieren' => $oop_snippets ?? [],
    'Datenbanken' => $datenbanken_snippets ?? []
];
?>

<nav>
    <?php foreach ($sections as $title => $snippets): ?>
        <div class="boxCapital" style="margin-top: 20px;">
            <p><?php echo htmlspecialchars($title); ?></p>
        </div>
        <section class="sidebarBox">
            <div class="boxContent">
                <ul>
                    <?php if (empty($snippets)): ?>
                        <li>Kein Snippet vorhanden</li>
                    <?php else: ?>
                        <?php foreach ($snippets as $snippet): ?>
                            <li>
                                <a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>">
                                    <?php echo htmlspecialchars($snippet['title']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </section>
    <?php endforeach; ?>
</nav>