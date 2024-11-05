<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../includes/sql/wissensportal.sql.php");
?>

<nav>
<div class="boxCapital" style="margin-top: 20px;">
    <p>Variablen</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($variablen_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($variablen_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Arrays / Listen</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($arrays_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($arrays_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Assoziatives Array / Einfaches Dictionarie</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($assoziatives_array_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($assoziatives_array_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Mehrdimensionales Array / Mehrfaches Dictionarie</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($mehrdimensionales_array_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($mehrdimensionales_array_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>for-Schleife</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($for_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($for_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>if, else, elseif/elif</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($if_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($if_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Funktionen</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($funktionen_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($funktionen_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Objektorientiertes Programmieren</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($oop_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($oop_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Datenbanken</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($datenbanken_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($datenbanken_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>
</nav>



    
    
    
    
    

