<?php
    $sql = "SELECT * FROM benutzergruppen;";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $benutzergruppe = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="POST" action="">
    <label for="benutzername">Benutzername</label>
    <input type="text" name="benutzername" id="benutzername" required>

    <label for="passwort">Passwort</label>
    <input type="password" name="passwort" id="passwort" required>

    <label for="email">E-Mail</label>
    <input type="email" name="email" id="email" required>

    <label for="beschreibung">Beschreibung</label>
    <textarea name="beschreibung" id="beschreibung"></textarea>

    <label for="iban">IBAN</label>
    <input type="text" name="iban" id="iban">

    <label for="kontostand">Kontostand</label>
    <input type="number" name="kontostand" id="kontostand">

    <label for="vorname">Vorname</label>
    <input type="text" name="vorname" id="vorname">

    <label for="zweitname">Zweitname</label>
    <input type="text" name="zweitname" id="zweitname">

    <label for="nachname">Nachname</label>
    <input type="text" name="nachname" id="nachname">

    <label for="benutzergruppe">Benutzergruppe</label>
    <select name="benutzergruppe" id="benutzergruppe" required>
        <?php foreach ($benutzergruppe as $gruppe): ?>
            <option value='<?= $gruppe['id']; ?>'><?= $gruppe['name']; ?></option>";
        <?php endforeach; ?>
    </select>
    <button type="submit">Benutzer hinzufügen</button>
    <button type="reset">Zurücksetzen</button>
</form>