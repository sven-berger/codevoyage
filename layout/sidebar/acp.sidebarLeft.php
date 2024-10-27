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

<div class="boxCapital" style="margin-top: 20px;">
    <p>Wissensportal</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php if (!empty($acp_sidebar_left_wissensportal_liste)): ?>
                <?php foreach ($acp_sidebar_left_wissensportal as $row): ?>
                <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine Snippets gefunden.</li>
            <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Eigene Werke</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php if (!empty($acp_sidebar_left_eigene_werke_liste)): ?>
                <?php foreach ($acp_sidebar_left_eigene_werke_liste as $row): ?>
                <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine eigenen Werke gefunden.</li>
            <?php endif; ?>
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