<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Eine Kurzanleitung für GitHub';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.core.header.inc.php");
?>

<h3 class="boxTitle">AUF GITHUB HOCHLADEN</h3>
<pre><code class="language-bash">git add XXX.<i>file</i>

git commit -m "Das und das wurde bearbeitet"

git push</code></pre>

<h3 class="boxTitle">MIT SERVER VERBINDEN UND VON GITHUB HERUNTERLADEN</h3>
<pre><code class="language-bash">ssh user@hostname.tld / IP

cd <span style="font-weight: bold; color:darkred;">/verzeichnis-in-das-das-github-repository-kommen-soll/</span></code></pre>

<pre><code class="language-bash">git clone https://github.com/username/repository.de.git</code></pre>
<p class="notice">Bei Bedarf - Das Herunterladen sollte aber in der Regel nur einmal nötig sein</p>
<pre><code class="language-bash">cd <span style="font-weight: bold; color:darkred;">./verzeichnis-mit-dem-eben-heruntergeladenen-github-repository/</span>

git pull</code></pre>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
    ?>