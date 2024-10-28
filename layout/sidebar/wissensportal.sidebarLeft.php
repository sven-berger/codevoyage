<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");

    try {
        $variablen_sql = "SELECT * FROM wissensportal WHERE kategorie_id = 1";
        $stmt = $connection->query($variablen_sql);
        $variablen_snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arrays_sql = "SELECT * FROM wissensportal WHERE kategorie_id = 2";
        $stmt = $connection->query($arrays_sql);
        $arrays_snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Alle Snippets abrufen
        $sql = "SELECT * FROM wissensportal";
        $stmt = $connection->query($sql);
        $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Fehler beim Laden der Snippets: " . htmlspecialchars($e->getMessage());
        exit;
    }

    try {
        $sql = "SELECT * FROM wissensportal_kategorien";
        $stmt = $connection->query($sql);
        $wissensportal_kategorien = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Fehler beim Laden der Kategorien: " . htmlspecialchars($e->getMessage());
        exit;
    }
?>

<nav>
<div class="boxCapital" style="margin-top: 20px;">
    <p>Variablen</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php foreach ($variablen_snippets as $snippet): ?>
            <li><a href="<?php echo htmlspecialchars($snippet['url']); ?>">index.php?snippet=<?php echo htmlspecialchars($snippet['title']); ?></a></li>
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
            <li><a href="<?php echo htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Assoziative Arrays / Einfaches Dictionarie</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
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



    
    
    
    
    

