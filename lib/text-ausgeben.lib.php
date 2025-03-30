    <form method="POST" action="">
        <label for="string">Ausgesuchter Text</label>
        <input type="text" id="string" name="string" required>

        <label for="ausgaben">Wie oft soll der Text wiederholt werden?</label>
        <input type="number" id="ausgaben" name="ausgaben" required>

        <button type="submit">Abschicken</button>
    </form>

    <?php if (isset($_POST['string']) && isset($_POST['ausgaben'])): ?>
        <?php
            $string = htmlspecialchars($_POST['string']);
            $ausgaben = (int)$_POST['ausgaben'];

            for ($i = 0; $i < $ausgaben; $i++) {
                echo $string . "<br>";
            }
        ?>
    <?php endif; ?>