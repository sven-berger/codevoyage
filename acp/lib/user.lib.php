<?php
    require_once "$_SERVER[DOCUMENT_ROOT]" . "/acp/lib/class/User/UserList.class.php";
    $userList = new UserList($connection);
    $benutzer = $userList->getData();
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Benutzername</th>
            <th>E-Mail</th>
            <th>Benutzergruppe</th>
            <th>Aktion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($benutzer as $daten): ?>
            <tr>
                <td><?= $daten['id']; ?></td>
                <td><a href="../acp/index.php?page=user-edit&id=<?= $daten['id']; ?>"><?= htmlspecialchars($daten['benutzername']); ?></a></td>
                <td><?= htmlspecialchars($daten['email']); ?></td>
                <td><?= htmlspecialchars($daten['gruppenname']); ?></td>
                <td><a href="../index.php?page=user-profile&id=<?= $daten['id']; ?>">Zum öffentlichen Profil</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>