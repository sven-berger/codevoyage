<?php if (isset($_GET['spielzug'])): ?>
    <?php 
    // Die gewählte Karte und Farbe aufteilen
    list($gewaehlte_karte, $gewaehlte_farbe) = explode(',', $_GET['spielzug']);
    ?>

    <!-- Überprüfen, ob die Karte gelegt werden kann -->
    <?php if ($spielkarten[0]['farbe'] === $gewaehlte_farbe || $gewaehlte_karte === 'Farbwahl'): ?>
        <!-- Karte aus der Hand entfernen -->
        <?php foreach ($meine_karten as $key => $karte): ?>
            <?php if ($karte['name'] === $gewaehlte_karte && $karte['farbe'] === $gewaehlte_farbe): ?>
                <?php unset($meine_karten[$key]); ?>
                <?php break; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- Aktualisiere die Handkarten in der Session -->
        <?php $_SESSION['meine_karten'] = $meine_karten; ?>

        <!-- Erfolgreiche Nachricht -->
        <?php echo $section_beginn; ?>
            <p class="success" style="font-weight: bold; text-align: center">
                Du hast folgende Karte gelegt: <?php echo $gewaehlte_karte . " (" . $gewaehlte_farbe . ")"; ?>
            </p>
        <?php echo $section_ende; ?>

        <!-- Anzeige der verbleibenden Karten in der Hand -->
        <h3>Verbleibende Karten:</h3>
        <ul>
            <?php foreach ($meine_karten as $karte): ?>
                <li><?php echo $karte['name'] . " (" . $karte['farbe'] . ")"; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <?php echo $section_beginn; ?>
            <p class="fail" style="font-weight: bold; text-align: center">Du kannst diese Karte nicht spielen, bitte wähle eine andere.</p>
        <?php echo $section_ende; ?>
    <?php endif; ?> 
<?php endif; ?>