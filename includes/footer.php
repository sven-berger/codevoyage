<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    // Sichere SQL-Abfrage mit Prepared Statement
    $stmt = $connection->prepare("SELECT * FROM pages WHERE url = :page");
    $stmt->bindParam(':page', $page, PDO::PARAM_STR);
    $stmt->execute();

    // Eine einzelne Zeile abrufen
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<?php if (!empty($row)): ?>
    <?php $gelistetAufGitHub = false; ?>
    <?php if (isset($_SESSION['benutzername'])): ?>
    <div class="page-function">
        <ul>
            <li>
                <button><a href="../acp/index.php?page=page-edit&url=<?php echo htmlspecialchars($row['url']); ?>">Seite bearbeiten</a></button>
            </li>
        </ul>
    </div>
    <?php endif ;?>
<?php else: ?>
    <?php $gelistetAufGitHub = true; ?>
<?php endif; ?>

<?php if ($gelistetAufGitHub): ?>
    <?php 
        $gitHubMain = "https://github.com/sven-berger/codevoyage.de/blob/main/lib";
        $gitHubLinks = [
            "Bibliothek" => "<a href='{$gitHubMain}/pages/{$page}.page.php' target='_blank' class='link-success fw-bolder'>{$page}.lib.php</a>",
            "Klasse" => "<a href='{$gitHubMain}/class/{$page}.class.php' target='_blank' class='link-success fw-bolder'>{$page}.class.php</a>",
            "Formular" => "<a href='{$gitHubMain}/forms/{$page}.form.php' target='_blank' class='link-success fw-bolder'>{$page}.form.php</a>",
        ];
    ?>
    <div class="gelistetAufGitHub bg-white border p-3 rounded-3">
        <h6>Dateien auf GitHub</h4>
        <ul class="list-unstyled github p-0 mb-0">
            <?php foreach ($gitHubLinks as $key => $value): ?>
            <li><span class='gitHub-Key text-danger fw-bolder'><?= $key; ?></span>: <span><?= $value; ?></span></li>
            <?php endforeach; ?>  
        </ul>
    </div>
<?php endif; ?>
</div>
            </div>
</div>

<!-- TinyMCE-Editor einbinden -->
<script src="../assets/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: 'textarea',
    license_key: 'gpl',
    content_css:
    [
        '../assets/highlightjs/styles/default.min.css',
        '../styles/editor.css'
    ],
    menubar: false,
    language: 'de',
    language_url: '../assets/tinymce/langs/de.js',
    plugins: 'code table lists fullscreen wordcount link image autosave advlist codesample preview',
    toolbar: 'code undo redo | bold italic | blocks | link image codesample table blockquote | bullist numlist | alignleft aligncenter alignright removeformat preview',
    fontsize_formats: "10pt 12pt 14pt 16pt 18pt 24pt 36pt"
});
</script>

<!-- Bootstrap Bundle mit Popper einbinden -->
<script src="https://codevoyage.de/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<style>
    .gelistetAufGitHub {
        margin-top: auto;
    }

    .gelistetAufGitHub li a {
        text-decoration: none;
    }
</style>