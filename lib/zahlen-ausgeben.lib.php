    <form method="POST" action="">
        <label for="beginnerzahl">Beginnerzahl</label>
        <input type="number" id="beginnerzahl" name="beginnerzahl" required>
        
        <label for="endzahl">Endzahl</label>
        <input type="number" id="endzahl" name="endzahl" required>

        <label for="schrittweise">Schrtittweise</label>
        <input type="number" id="schrittweise" name="schrittweise">

        <button type="submit">Abschicken</button>
    </form>

    <?php if (isset($_POST['beginnerzahl']) && isset($_POST['endzahl']) && isset($_POST['schrittweise'])): ?>
        <?php
            $beginnerzahl = (int)$_POST['beginnerzahl'];
            $endzahl = (int)$_POST['endzahl'];
            $schrittweise = (int)$_POST['schrittweise'];
            $schrittweise = isset($_POST['schrittweise']) && $_POST['schrittweise'] > 0 ? (int)$_POST['schrittweise'] : 1;
            
            $zahlen = range($beginnerzahl, $endzahl, $schrittweise);
            foreach ($zahlen as $zahl) {
                echo $zahl . "<br>";
            }
            
        ?>
    <?php endif; ?>