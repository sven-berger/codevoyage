<?php if (!isset($page)) $page = ''; ?>

<div class="navigation">
    <a href="https://codevoyage.de/" <?php if ($bereich === 'Startseite'): ?> class="active"<?php endif; ?>>Startseite</a>
    <a href="https://codevoyage.de/blog/" <?php if ($bereich === 'Blog'): ?> class="active"<?php endif; ?>>Blog</a>
    <a href="https://php.codevoyage.de/" <?php if ($bereich === 'PHP-Bereich'): ?> class="active"<?php endif; ?>>PHP-Bereich</a>
    <a href="https://python.codevoyage.de">Python-Bereich</a>
    <a href="https://javascript.codevoyage.de/" <?php if ($bereich === 'JavaScript-Bereich'): ?> class="active"<?php endif; ?>>JavaScript-Bereich</a>
    <a href="https://wissensportal.codevoyage.de/" <?php if ($bereich === 'Wissensportal'): ?> class="active"<?php endif; ?>>Wissensportal</a>
    <a href="https://codevoyage.de/acp/" <?php if ($bereich === 'Administrationsbereich'): ?> class="active"<?php endif; ?>>Administrationsbereich</a>
</div>