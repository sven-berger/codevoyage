<aside>
<div class="boxCapital">
    <p>Vorlagen</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($vorlagen_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($vorlagen_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>

<div class="boxCapital">
    <p>Sonstiges</p>
</div>
<section class="sidebarBox">
    <div class="boxContent">
        <ul>
        <?php if (empty($sonstiges_snippets)): ?>
            <li>Kein Snippet vorhanden</li>
        <?php else: ?>
            <?php foreach ($sonstiges_snippets as $snippet): ?>
            <li><a href="<?php echo 'index.php?snippet=' . htmlspecialchars($snippet['url']); ?>"><?php echo htmlspecialchars($snippet['title']); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </div>
</section>
</aside>



    
    
    
    
    

