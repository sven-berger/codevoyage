<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Linke Seitenleiste (PHP-Bereich)";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/app.header.inc.php");
?>

<section class="section">
    <div class="sectionContent">
        <?php try { ?>
            <?php if (!empty($acp_sidebar_left_seitenleiste_liste)) : ?>
                <div class="ActionArea">
                    <ul>
                        <li><button class="button-action"><a href="https://codevoyage.de/acp/sidebar/left/php/eigene-werke/add.php">Eigenes Werk hinzufügen</a></button></li>
                    </ul>
                </div>     
                <table>
                    <tr>
                        <th>URL</th>
                        <th>Ziel</th>
                        <th>Aktion</th>
                    </tr>
                    <?php foreach ($acp_sidebar_left_seitenleiste_liste as $row) : ?>
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
           <?php else : ?>
                <p style="text-align: center;">Keine Einträge gefunden.</p>
            <?php endif; ?>
        <?php } catch (PDOException $e) { ?>
            <p style="text-align: center;">Es liegt ein Problem vor: <?php echo htmlspecialchars($e->getMessage()); ?></p>
        <?php } ?>
    </div>
</section>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/footer/acp.footer.inc.php");
?>