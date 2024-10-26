<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Linke Seitenleiste (PHP-Bereich)";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/header.inc.php");
?>

<h3 class="section-title">Eigene Werke</h3>
<section class="section">
    <div class="sectionContent">
        <?php try { ?>
            <?php if (!empty($eigene_werke_liste)) : ?>
                <table>
                    <tr>
                        <th>URL</th>
                        <th>Ziel</th>
                        <th>Aktion</th>
                    </tr>
                    <?php foreach ($eigene_werke_liste as $row) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['url']); ?></td>
                            <td><?php echo htmlspecialchars($row['ziel']); ?></td>
                            <td>
                                <a href="https://codevoyage.de/acp/sidebar/left/php/eigene-werke/edit.php?id=<?php echo htmlspecialchars($row['ID']); ?>">Bearbeiten</a> |
                                <a href="https://codevoyage.de/acp/sidebar/left/php/eigene-werke/delete.php?id=<?php echo htmlspecialchars($row['ID']); ?>" onclick="return confirm('Bist du dir sicher, dass du diesen Eintrag löschen möchtest?');">Löschen</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <button class="button-action"><a href="https://codevoyage.de/acp/sidebar/left/php/eigene-werke/add.php">Eigenes Werk hinzufügen</a></button>
            <?php else : ?>
                <p style="text-align: center;">Keine Einträge gefunden.</p>
            <?php endif; ?>
        <?php } catch (PDOException $e) { ?>
            <p style="text-align: center;">Es liegt ein Problem vor: <?php echo htmlspecialchars($e->getMessage()); ?></p>
        <?php } ?>
    </div>
</section>

<h3 class="section-title">Spielereien</h3>
<section class="section">
    <div class="sectionContent">
        <?php try { ?>
            <?php if (!empty($spielereien_liste)) : ?>
                <table>
                    <tr>
                        <th>URL</th>
                        <th>Ziel</th>
                        <th>Aktion</th>
                    </tr>
                    <?php foreach ($spielereien_liste as $row) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['url']); ?></td>
                            <td><?php echo htmlspecialchars($row['ziel']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo htmlspecialchars($row['ID']); ?>">Bearbeiten</a> |
                                <a href="delete.php?id=<?php echo htmlspecialchars($row['ID']); ?>" onclick="return confirm('Bist du dir sicher, dass du diesen Eintrag löschen möchtest?');">Löschen</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="ContentFooter">
                    <button class="button-action"><a href="https://codevoyage.de/acp/sidebar/left/php/spielereien/add.php">Spielereien hinzufügen</a></button>
                </div>
            <?php else : ?>
                <p style="text-align: center;">Keine Einträge gefunden.</p>
            <?php endif; ?>
        <?php } catch (PDOException $e) { ?>
            <p style="text-align: center;">Es liegt ein Problem vor: <?php echo htmlspecialchars($e->getMessage()); ?></p>
        <?php } ?>
    </div>
</section>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/acp/includes/footer.inc.php");
?>