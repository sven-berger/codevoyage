    <form method="POST" action="">
        <label for="beginnerzahl">Beginnerzahl</label>
        <input type="number" id="beginnerzahl" name="beginnerzahl" required>
        
        <label for="endzahl">Endzahl</label>
        <input type="number" id="endzahl" name="endzahl" required>

        <label for="schrittweise">Schrtittweise</label>
        <input type="number" id="schrittweise" name="schrittweise">

        <button type="submit">Abschicken</button>
    </form>

    <?php if (isset($_POST['beginnerzahl']) && isset($_POST['endzahl'])): ?>
    <?php
        $beginnerzahl = (int)$_POST['beginnerzahl'];
        $schrittweise = isset($_POST['schrittweise']) && $_POST['schrittweise'] > 0 ? (int)$_POST['schrittweise'] : 1;
        $endzahl = (int)$_POST['endzahl'];

        for ($i = $beginnerzahl; $i <= $endzahl; $i += $schrittweise) {
            echo $i . "<br>";
        }
    ?>
<?php endif; ?>