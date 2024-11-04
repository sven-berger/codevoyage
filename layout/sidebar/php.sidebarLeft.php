<?php
    require_once "/var/customers/webs/codevoyage/includes/functions.inc.php";
?>

<nav>
    <!-- Eigene Werke -->
    <div class="boxCapital" style="margin-top: 20px;">
        <p>Eigene Werke</p>
    </div>
    <section class="sidebarBox">
        <div class="boxContent">
            <ul>
                <?php if (!empty($eigene_werke_liste)): ?>
                    <?php foreach ($eigene_werke_liste as $row): ?>
                    <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Keine eigenen Werke gefunden.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <!-- Spielereien -->
    <div class="boxCapital" style="margin-top: 20px;">
        <p>Spielereien</p>
    </div>
    <section class="sidebarBox">
        <div class="boxContent">
            <ul>
                <?php if (!empty($spielereien_liste)): ?>
                    <?php foreach ($spielereien_liste as $row): ?>
                    <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Keine Spielerei und Snippet gefunden.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <!-- Sonstiges -->
    <div class="boxCapital" style="margin-top: 20px;">
        <p>Sonstiges</p>
    </div>
    <section class="sidebarBox">
        <div class="boxContent">
            <ul>
                <?php if (!empty($sonstiges_liste)): ?>
                    <?php foreach ($sonstiges_liste as $row): ?>
                    <li><a href="<?php echo htmlspecialchars($row['url']); ?>"><?php echo htmlspecialchars($row['ziel']); ?></a></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Kein Snippet gefunden.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</nav>