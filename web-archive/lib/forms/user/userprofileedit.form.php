<form method="POST" action="" class="form-userprofile">
<div class="row user-profile-row">
        <div class="col-md-6">
            <h3 class="section-title">Persönliche Daten</h3>
            <div class="user-details user-details-personal">
                <!-- Überprüfung auf Vorname, Zweitname und Nachname -->
                <?php if ($userProfileEdit->getVorname() || $userProfileEdit->getZweitname() || $userProfileEdit->getNachname()): ?>
                    <h4 class="sectionHeader">Vorname</h4>
                    <input type="text" id="vorname" name="vorname" value="<?= $userProfileEdit->getVorname(); ?>">
                    <h4 class="sectionHeader">Zweitname</h4>
                    <input type="text" id="zweitname" name="zweitname" value="<?= $userProfileEdit->getZweitname(); ?>">
                    <h4 class="sectionHeader">Nachname</h4>
                    <input type="text" id="nachname" name="nachname" value="<?= $userProfileEdit->getNachname(); ?>">
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="section-title">Details</h3>
            <div class="user-details">
                <h4 class="sectionHeader">Benutzername</h4>
                <input type="text" id="benutzername" name="benutzername" value="<?= $userProfileEdit->getBenutzername(); ?>">

                
            </div>
        </div>
    </div>

    <div class="row user-profile-row">
        <div class="col-md-4">
            <h3 class="section-title">Kontakt</h3>
            <div class="user-details user-details-contact">
                <p>E-Mail</p>
                <input type="text" id="email" name="email" value="<?= $userProfileEdit->getEmail(); ?>">
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="section-title">Platzhalter</h3>
            <div class="user-details">
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="section-title">Platzhalter</h3>
            <div class="user-details">
            </div>
        </div>
    </div>

    <?php if ($userProfileEdit->getBeschreibung()): ?>
        <h3 class="section-title">Beschreibung</h3>
        <div class="user-desc">
            <textarea name="beschreibung" id="beschreibung"><?= $userProfileEdit->getBeschreibung(); ?></textarea>
        </div>
    <?php endif; ?>

    <button type="submit" name="submit">Daten aktualisieren</button>
    <button type="reset">Zurücksetzen</button>
</form>