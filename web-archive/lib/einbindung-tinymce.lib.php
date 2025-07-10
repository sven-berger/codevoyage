<?php
    require_once("../web-archive//lib/forms/einbindung-tinymce.form.php");
?>

<pre class="language-html"><code>&lt;!-- TinyMCE-Editor einbinden --&gt;
&lt;script src="https://samwilliam.de/assets/tinymce/tinymce.min.js"&gt;&lt;/script&gt;
&lt;script&gt;
tinymce.init({
    selector: 'textarea',
    license_key: 'gpl',
    content_css:
    [
        'https://samwilliam.de/assets/highlightjs/styles/default.min.css',
        'https://samwilliam.de/styles/editor.css'
    ],
    menubar: false,
    language: 'de',
    language_url: 'https://samwilliam.de/assets/tinymce/langs/de.js',
    plugins: 'code table lists fullscreen wordcount link image autosave advlist codesample preview',
    toolbar: 'code undo redo | bold italic | blocks | link image codesample table blockquote | bullist numlist | alignleft aligncenter alignright removeformat preview',
    fontsize_formats: "10pt 12pt 14pt 16pt 18pt 24pt 36pt"
});
&lt;/script&gt;
</code></pre>