<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/functions.inc.php");
?>

<nav>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Seitenleisten</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php if (!empty($acp_sidebar_left_seitenleiste_liste)): ?>
                <?php foreach ($acp_sidebar_left_seitenleiste_liste as $row): ?>
                <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine eigenen Werke gefunden.</li>
            <?php endif; ?>
        </ul>
    </div>
</section>


<section class="sidebarBox">
        <h3 class="boxTitle">Seitenleisten</h3>
        <div class="boxContent">
            <ul>
                <li><a href="https://codevoyage.de/acp/sidebar/left/acp/add.php">Administrationsbereich</a></li>
                <li><a href="https://codevoyage.de/acp/sidebar/left/php/index.php">PHP-Bereich</a></li>
            </ul>
        </div>
</section>
<section class="sidebarBox">
        <h3 class="boxTitle">Umsatzrechner</h3>
        <div class="boxContent">
            <ul>
                <li><a href="https://codevoyage.de/acp/umsatzrechner/2023/">Übersicht</a></li>
            </ul>
        </div>
</section>
<section class="sidebarBox">
        <h3 class="boxTitle">Eintrittspreise</h3>
        <div class="boxContent">
            <ul>
                <li><a href="https://codevoyage.de/acp/eintrittspreise/">Übersicht</a></li>
            </ul>
        </div>
</section>
<section class="sidebarBox">
        <h3 class="boxTitle">Wissensportal</h3>
        <div class="boxContent">
            <ul>
                <li><a href="https://wissensportal.codevoyage.de/acp/index.php">Übersicht</a></li>
                <li><a href="https://wissensportal.codevoyage.de/acp/add.php">Snippet hinzufügen</a></li>
            </ul>
        </div>
</section>
<section class="sidebarBox">
        <h3 class="boxTitle">Blog</h3>
        <div class="boxContent">
            <ul>
                <li><a href="https://codevoyage.de/acp/blog/index.php">Übersicht</a></li>
                <li><a href="https://codevoyage.de/acp/blog/add.php">Blog-Artikel hinzufügen</a></li>
            </ul>
        </div>
</section>
</nav>