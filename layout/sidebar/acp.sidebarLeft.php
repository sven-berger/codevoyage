<nav>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Navigation</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php if (!empty($acp_sidebar_left_navigation_header_liste)): ?>
                <?php foreach ($acp_sidebar_left_navigation_header_liste as $row): ?>
                <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine Einträge gefunden.</li>
            <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Linke Seitenleiste</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php if (!empty($acp_sidebar_left_seitenleiste_liste)): ?>
                <?php foreach ($acp_sidebar_left_seitenleiste_liste as $row): ?>
                <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine Einträge gefunden.</li>
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

<div class="boxCapital" style="margin-top: 20px;">
    <p>Wissensportal</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php if (!empty($acp_sidebar_left_wissensportal_liste)): ?>
                <?php foreach ($acp_sidebar_left_wissensportal_liste as $row): ?>
                <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine Snippets gefunden.</li>
            <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Einkaufsliste</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php if (!empty($acp_sidebar_left_einkaufsliste_liste)): ?>
                <?php foreach ($acp_sidebar_left_einkaufsliste_liste as $row): ?>
                <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine Produkte gefunden.</li>
            <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital" style="margin-top: 20px;">
    <p>Blog</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
            <?php if (!empty($acp_sidebar_left_blog_liste)): ?>
                <?php foreach ($acp_sidebar_left_blog_liste as $row): ?>
                <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Keine Snippets gefunden.</li>
            <?php endif; ?>
        </ul>
    </div>
</section>
</nav>