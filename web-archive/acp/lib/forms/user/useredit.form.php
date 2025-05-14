<form method="POST" action="">
    <label for="benutzername">Benutzername</label>
    <input type="text" name="benutzername" id="benutzername" value="<?= htmlspecialchars($row['benutzername'] ?? ''); ?>" required>

    <label for="email">E-Mail</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($row['email'] ?? ''); ?>" required>

    <label for="beschreibung">Beschreibung</label>
    <textarea name="beschreibung" id="beschreibung"><?= $row['beschreibung'] ?? ''; ?></textarea>

    <label for="iban">IBAN</label>
    <input type="text" name="iban" id="iban" value="<?= htmlspecialchars($row['iban'] ?? ''); ?>">

    <label for="kontostand">Kontostand</label>
    <input type="number" name="kontostand" id="kontostand" value="<?= htmlspecialchars($row['kontostand'] ?? ''); ?>">

    <label for="vorname">Vorname</label>
    <input type="text" name="vorname" id="vorname" value="<?= htmlspecialchars($row['vorname'] ?? ''); ?>">

    <label for="zweitname">Zweitname</label>
    <input type="text" name="zweitname" id="zweitname" value="<?= htmlspecialchars($row['zweitname'] ?? ''); ?>">

    <label for="nachname">Nachname</label>
    <input type="text" name="nachname" id="nachname" value="<?= htmlspecialchars($row['nachname'] ?? ''); ?>">

    <label for="benutzergruppe">Benutzergruppe</label>
    <select name="benutzergruppe" id="benutzergruppe" required>
        <?php foreach ($benutzergruppen as $gruppe): ?>
            <option value="<?= $gruppe['id']; ?>" <?= ($gruppe['id'] == $row['benutzergruppe'] ? 'selected' : ''); ?>>
                <?= htmlspecialchars($gruppe['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" name="submit">Benutzer bearbeiten</button>
    <button type="reset" name="reset">Zurücksetzen</button>
</form>

<div class="useroptions">
    <ul>
        <li><button><a href="../acp/index.php?page=user">Zurück zur Benutzerübersicht</a></button></li>
        <li><button><a href="../acp/index.php?page=user-delete&id=<?= $row['id']; ?>" onclick='return confirm("Bist du dir sicher, dass du diesen Benutzer löschen möchtest?");'>Benutzer löschen</a></button></li>
    </ul>
</div>