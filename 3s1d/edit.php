<?php ob_start(); require_once 'db.php'; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 Sprachen in 1 Datei (PHP, MySQL, JavaScript(</title>

    <!-- Font Awesome 6 Free einbinden -->
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>
<body>
<main class="content">
    <h1 class="header">3 Sprachen in 1 Datei - Ein Beispiel für HTML, CSS, PHP, JavaScript und MySQL</h1>
    <div class="links-to-github">
        <ul>
            <li><a href="https://github.com/sven-berger/codevoyage.de/blob/main/3-sprachen-1-datei.php" target="_blank">3-sprachen-1-datei.php auf GitHub</a></li>
            <li><a href="https://github.com/sven-berger/codevoyage.de/blob/main/edit.php" target="_blank">3s1d-edit.php auf GitHub</a></li>

        </ul>
    </div>
        
    <h3 class="html">
        Hallo HTML
    </h3>

    <h3 class='css'>
        Hallo CSS
    </h3>

    <h3 class='php'>
        <?php echo "Hallo PHP!"; ?>
    </h3>

    <h3 class='js'><script>
        document.write("Hallo JavaScript!");
    </script></h3>

<h3 class="mysql">
        <?php
            $statement = $connection->prepare("SELECT * FROM hello_mysql");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                echo htmlspecialchars($row['hello']);
            }
        ?>
    </h3>

    <!-- Daten aus der Datenbank abrufen -->
    <?php
        $sql = "SELECT * FROM benutzer";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $benutzer = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Daten aus der Datenbank bearbeiten -->
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM benutzer WHERE id = :id";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        }
    ?>

    <!-- Formular zum Bearbeiten der Daten -->
    <?php if ($row): ?>
        <form method="POST" action="">
            <label for="vorname">Vorname:</label>
            <input type="text" id="vorname" name="vorname" value="<?php echo htmlspecialchars($row['vorname']); ?>" required>

            <label for="nachname">Nachname:</label>
            <input type="text" id="nachname" name="nachname" value="<?php echo htmlspecialchars($row['nachname']); ?>" required>

            <label for="Inhalt">Inhalt:</label>
            <textarea id="Inhalt" name="inhalt"><?php echo htmlspecialchars($row['inhalt']); ?></textarea>

            <button type="submit">Ändern</button>
            <button type="reset">Zurücksetzen</button>
            <a href="3-sprachen-1-datei.php" class="button">Zurück zur Übersicht</a>
        </form>
    <?php endif; ?>

    <!-- Wenn das Formular erfolgreich gesendet wurde -->
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
            // Eingabewerte aus dem Formular abrufen
            $vorname = htmlspecialchars($_POST['vorname']);
            $nachname = htmlspecialchars($_POST['nachname']);
            $inhalt = $_POST['inhalt'];

            // SQL-Abfrage zum Aktualisieren der Daten in der Tabelle
            $statement = $connection->prepare("UPDATE benutzer SET vorname = :vorname, nachname = :nachname, inhalt = :inhalt WHERE id = :id");
            $statement->bindParam(':vorname', $vorname);
            $statement->bindParam(':nachname', $nachname);
            $statement->bindParam(':inhalt', $inhalt);
            $statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $statement->execute();

            // Weiterleitung nach erfolgreichem Update
            header("Location: index.php");
            exit();
        }
    ?>

    <!-- TinyMCE Initialisierung -->
    <script src="../assets/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    </script>

    <!-- CSS für die Darstellung -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkolivegreen;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .content {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
        }

        .header {
            color: #2c3e50;
            padding-bottom: 5px;
            border-bottom: 2px solid #2c3e50;
        }

        .links-to-github {
            margin-bottom: 20px;
        }

        .links-to-github ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            padding: 10px;
        }
        
        .links-to-github li:last-child {
            margin-top: 10px;
        }

        .links-to-github li a {
            color: #00758f;
            text-decoration: none;
            font-weight: 700;
        }

        .links-to-github li:before {
            font-family: FontAwesome;
            content: "\f09b";
            margin-right: 10px;
        }

        .links-to-github li a:hover {
            text-decoration: underline;
        }

        h3.html {
            margin-bottom: 20px;
            color: #e44d26;
        }

        h3.html:before {
            font-family: FontAwesome;
            content: "\f13b";
            margin-right: 5px;
        }

        h3.css {
            margin-bottom: 20px;
            color: #264de4;
        }

        h3.css:before {
            font-family: FontAwesome;
            margin-right: 5px;
            content: "\e6a2";
        }

        h3.php {
            margin-bottom: 20px;
            color: blue;
        }

        h3.php:before {
            font-family: FontAwesome;
            content: "\f457";
        }

        h3.js {
            margin-bottom: 20px;
            color: green;
        }

        h3.js:before {
            font-family: FontAwesome;
            content: "\f3b8";
            margin-right: 10px;
        }

        h3.mysql {
            margin-bottom: 20px;
            color: #00758f;
        }

        h3.mysql:before {
            font-family: FontAwesome;
            content: "\f1c0";
            margin-right: 5px;
        }

        h3:before {
            color: darkorange;
        }

        form {
            display: grid;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button[type="reset"] {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .button {
            background-color: #00758f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
        }
    </style>
</main>
</body>
</html>
