<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/functions.inc.php");
?>

<nav>
    <div class="boxCapital" style="margin-top: 20px;">
        <p>Community-Spiele</p>
    </div>
    <section class="sidebarBox">
        <div class="boxContent">
            <ul>
                <?php if (!empty($community_spiele_liste)): ?>
                    <?php foreach ($community_spiele_liste as $row): ?>
                    <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Keine Community-Spiele gefunden.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</nav>