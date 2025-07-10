<form method="POST" action="">
    <label for="absendekonto">Absendekonto</label>
    <select name="absendekonto" id="absendekonto">
        <?php foreach ($result as $row): ?>
            <option value="<?= $row['iban'] ?>"><?= $row['iban'] . " (" . $row['inhaber'] . ")" . " => " . "(" . $row['kontostand'] . "€)"; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="zielkonto">Zielkonto</label>
    <select name="zielkonto" id="zielkonto">
        <?php foreach ($result as $row): ?>
            <option value="<?= $row['iban'] ?>"><?= $row['iban'] . " (" . $row['inhaber'] . ")" . " => " . "(" . $row['kontostand'] . "€)"; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="betrag">Betrag</label>
    <input type="number" id="betrag" name="betrag" step="0.01" required>

    <button type="submit">Auftrag übermitteln</button>
    <button type="reset">Zurücksetzen</button>
</form>