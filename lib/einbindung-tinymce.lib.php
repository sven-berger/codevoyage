<?php
    require_once("lib/forms/einbindung-tinymce.form.php");
?>

<pre class="language-html"><code>&lt;!DOCTYPE html&gt;  
&lt;html lang="de"&gt;  
&lt;head&gt;  
    &lt;meta charset="UTF-8"&gt;  
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;  
    &lt;title&gt;CodeVoyage.de&lt;/title&gt;  

    &lt;!-- Font Awesome 6 Free einbinden --&gt;
    &lt;link rel="stylesheet" href="../assets/fontawesome/css/all.min.css"&gt;

    &lt;!-- HightLight.js einbinden --&gt;
    &lt;link rel="stylesheet" href="../assets/highlightjs/styles/default.min.css"&gt;
    &lt;script src="../assets/highlightjs/highlight.min.js"&gt;&lt;/script&gt;
    &lt;script&gt;hljs.highlightAll();&lt;/script&gt;

    &lt;!-- Angelegte Stylesheets einbinden --&gt;
    &lt;link rel="stylesheet "href="../styles/editor.css"&gt;
    &lt;link rel="stylesheet" href="../styles/styles.css"&gt;
    &lt;link rel="stylesheet" href="../styles/mobile.css"&gt;
&lt;/head&gt;

&lt;!-- TinyMCE-Editor einbinden --&gt;
&lt;script src="../assets/tinymce/tinymce.min.js"&gt;&lt;/script&gt;
&lt;script&gt;
tinymce.init({
    selector: 'textarea',
    license_key: 'gpl',
    content_css: '../assets/highlightjs/styles/default.min.css',
    content_css: ['../styles/editor.css'],
    menubar: false,
    language: 'de',
    language_url: '../assets/tinymce/langs/de.js',
    plugins: 'code table lists fullscreen wordcount link image autosave advlist codesample preview',
    toolbar: 'code undo redo | bold italic | blocks | link image codesample table blockquote | bullist numlist | alignleft aligncenter alignright removeformat preview',
    fontsize_formats: "10pt 12pt 14pt 16pt 18pt 24pt 36pt",
});
&lt;/script&gt;
</code></pre>