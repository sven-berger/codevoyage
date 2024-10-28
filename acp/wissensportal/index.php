<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = 'Wissensportal';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>

<div class="ActionArea">
    <ul>
        <li><button class="button-action"><a href="https://codevoyage.de/acp/wissensportal/add.php">Snippet hinzufügen</a></button></li>
    </ul>
</div>

<h3 class="section-title">Variablen</h3>
<section class="section">
    <div class="sectionContent">
<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($variablen_snippets as $snippet): ?>
            <tr>
                <td><?php echo htmlspecialchars($snippet['title']); ?></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Arrays / Listen</h3>
<section class="section">
    <div class="sectionContent">
<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($arrays_snippets as $snippet): ?>
            <tr>
                <td><?php echo htmlspecialchars($snippet['title']); ?></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/sidebar/left/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/sidebar/left/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Assoziatives Array / Einfaches Dictionarie</h3>
<section class="section">
    <div class="sectionContent">
<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($assoziatives_array_snippets as $snippet): ?>
            <tr>
                <td><?php echo htmlspecialchars($snippet['title']); ?></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/sidebar/left/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/sidebar/left/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>
