<?php
    $bereich = 'Administrationsbereich';
    $pageTitle = "Linke Seitenleiste";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/header/header.inc.php");
?>

<h3 class="section-title">Community-Spiele</h3>
<section class="section">
    <div class="sectionContent">
    <div class="ActionArea">
        <ul>
            <li><button class="button-action"><a href="https://codevoyage.de/acp/sidebar/left/codevoyage/community-spiele/add.php">Community-Spiel hinzufügen</a></button></li>
        </ul>
    </div>     
        <?php try { ?>
            <?php if (!empty($community_spiele_liste)) : ?>
                <table>
                    <tr>
                        <th>URL</th>
                        <th>Ziel</th>
                        <th>Aktion</th>
                    </tr>
                    <?php foreach ($community_spiele_liste as $row) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['url']); ?></td>
                            <td><?php echo htmlspecialchars($row['ziel']); ?></td>
                            <td>
                                <a href="https://codevoyage.de/acp/sidebar/left/codevoyage/community-spiele/edit.php?id=<?php echo htmlspecialchars($row['ID']); ?>">Bearbeiten</a> |
                                <a href="https://codevoyage.de/acp/sidebar/left/codevoyage/community-spiele/delete.php?id=<?php echo htmlspecialchars($row['ID']); ?>" onclick="return confirm('Bist du dir sicher, dass du diesen Eintrag löschen möchtest?');">Löschen</a>
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

<h3 class="section-title">Drittanbieter von Woltlab</h3>
<section class="section">
    <div class="sectionContent">
    <div class="ActionArea">
        <ul>
            <li><button class="button-action"><a href="https://codevoyage.de/acp/sidebar/left/codevoyage/drittanbieter-woltlab/add.php">Drittanbieter hinzufügen</a></button></li>
        </ul>
    </div>     
        <?php try { ?>
            <?php if (!empty($drittanbieter_woltab_liste)) : ?>
                <table>
                    <tr>
                        <th>URL</th>
                        <th>Ziel</th>
                        <th>Aktion</th>
                    </tr>
                    <?php foreach ($community_spiele_liste as $row) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['url']); ?></td>
                            <td><?php echo htmlspecialchars($row['ziel']); ?></td>
                            <td>
                                <a href="https://codevoyage.de/acp/sidebar/left/codevoyage/drittanbieter-woltlab/edit.php?id=<?php echo htmlspecialchars($row['ID']); ?>">Bearbeiten</a> |
                                <a href="https://codevoyage.de/acp/sidebar/left/codevoyage/drittanbieter-woltlab/delete.php?id=<?php echo htmlspecialchars($row['ID']); ?>" onclick="return confirm('Bist du dir sicher, dass du diesen Eintrag löschen möchtest?');">Löschen</a>
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