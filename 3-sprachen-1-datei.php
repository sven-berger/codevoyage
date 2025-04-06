<!-- Datenbankverbindung herstellen -->
<?php
    $servername = "localhost";
    $username = "root";
    $passwort = "";
    $dbname = "3-sprachen-1-datei";

    // Verbindung zur Datenbank herstellen mit PDO
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passwort);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

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
            <li><a href="https://github.com/sven-berger/codevoyage.de/blob/main/3s1d-edit.php" target="_blank">3s1d-edit.php auf GitHub</a></li>

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

    <!-- Daten aus der Datenbank ausgeben -->
    <table>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Inhalt</th>
            <th>Aktion</th>
        </tr>
        <?php foreach ($benutzer as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['vorname']); ?></td>
            <td><?php echo htmlspecialchars($row['nachname']); ?></td>
            <td><?php echo $row['inhalt']; ?></td>
            <td><a href="3s1d-edit.php?id=<?php echo $row['id']; ?>">Bearbeiten</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <form method="POST">
        <label for="vorname">Vorname:</label>
        <input type="text" id="vorname" name="vorname" required>

        <label for="nachname">Nachname:</label>
        <input type="text" id="nachname" name="nachname" required>

        <label for="Inhalt">Inhalt:</label>
        <textarea id="Inhalt" name="inhalt"></textarea>

        <button type="submit">Einfügen</button>
        <button type="reset">Zurücksetzen</button>
    </form>

    <?php
        // Überprüfen, ob das Formular gesendet wurde
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Eingabewerte aus dem Formular abrufen
            $vorname = htmlspecialchars($_POST['vorname']);
            $nachname = htmlspecialchars($_POST['nachname']);
            $inhalt = $_POST['inhalt'];

            // Erstellen der Tabelle, falls sie nicht existiert
            $sql = "CREATE TABLE IF NOT EXISTS benutzer (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                vorname VARCHAR(30) NOT NULL,
                nachname VARCHAR(30) NOT NULL,
                inhalt TEXT NOT NULL
            )";
            $connection->exec($sql);

            // SQL-Abfrage zum Einfügen der Daten in die Tabelle
            $statement = $connection->prepare("INSERT INTO benutzer (vorname, nachname, inhalt) VALUES (:vorname, :nachname, :inhalt)");
            $statement->bindParam(':vorname', $vorname);
            $statement->bindParam(':nachname', $nachname);
            $statement->bindParam(':inhalt', $inhalt);
            $statement->execute();
            echo "<h3>Formular erfolgreich gesendet!</h3>";
        }
    ?>

    <!-- TinyMCE Initialisierung -->
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr a {
            color: #00758f;
            text-decoration: none;
        }
        
        tr a:hover {
            text-decoration: underline;
        }
    </style>
</main>
<!-- TinyMCE -->
<script src="../assets/tinymce/tinymce.min.js"></script>
</body>
</html>
