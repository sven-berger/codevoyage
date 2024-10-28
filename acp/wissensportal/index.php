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
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
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
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
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
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Mehrdimensionales Array / Mehrfaches Dictionarie</h3>
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
            <?php foreach ($mehrdimensionales_array_snippets as $snippet): ?>
            <tr>
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Die for-Schleife</h3>
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
            <?php foreach ($for_snippets as $snippet): ?>
            <tr>
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">if, elsif/elif, else</h3>
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
            <?php foreach ($if_snippets as $snippet): ?>
            <tr>
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Funktionen</h3>
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
            <?php foreach ($funktionen_snippets as $snippet): ?>
            <tr>
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Objektorientiertes Programmieren</h3>
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
            <?php foreach ($oop_snippets as $snippet): ?>
            <tr>
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Datenbanken</h3>
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
            <?php foreach ($datenbanken_snippets as $snippet): ?>
            <tr>
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Vorlagen</h3>
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
            <?php foreach ($vorlagen_snippets as $snippet): ?>
            <tr>
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>
</section>

<h3 class="section-title">Sonstiges</h3>
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
            <?php foreach ($sonstiges_snippets as $snippet): ?>
            <tr>
                <td><a href="<?php echo 'https://wissensportal.codevoyage.de/index.php?snippet=' . htmlspecialchars($snippet['url']); ?>" target="_blank"><?php echo htmlspecialchars($snippet['title']); ?></a></td>
                <td><?php echo htmlspecialchars($snippet['description']); ?></td>
                <td>
                    <a href="https://codevoyage.de/acp/wissensportal/edit.php?id=<?php echo $snippet['id']; ?>">Bearbeiten</a> |
                    <a href="https://codevoyage.de/acp/wissensportal/delete.php?id=<?php echo $snippet['id']; ?>" onclick="return confirm('Sicher, dass du dieses Snippet löschen willst?');">Löschen</a>
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
