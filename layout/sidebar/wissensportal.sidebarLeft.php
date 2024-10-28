<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/functions.inc.php");
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");
?>

<nav>
<div class="boxCapital" style="margin-top: 20px;">
    <p>Variablen</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php foreach ($variablen_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Arrays / Listen</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php foreach ($arrays_snippets as $snippet): ?>
                <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Assoziatives Array / Einfaches Dictionarie</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php foreach ($assoziatives_array_snippets as $snippet): ?>
                <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Mehrdimensionale Arrays / Dictionaries</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>for-Schleife</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <li><a href="https://wissensportal.codevoyage.de/index.php?snippet=for-schleife">Die for-Schleife</a></li>
            <li><a href="https://wissensportal.codevoyage.de/index.php?snippet=array_listen-zusammensetzen">Array / Liste zusammensetzen</a></li>
            <li><a href="https://wissensportal.codevoyage.de/index.php?snippet=zahlen-von-1bis100-mit-for-in-array_liste">Zahlen von 1 - 100 mit for im Array / in der Liste</a></li>
        </ul>
    </div>
</section>
</nav>



    
    
    
    
    

