<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Ein schwarzes Loch";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.core.header.inc.php");
?>

<style>#black-hole{background:#000;display:grid;place-content:center;height:100vh;filter:blur(8px)}black-hole,black-hole:after,black-hole:before{display:block;border-radius:50%}black-hole{width:50vmin;height:51vmin;box-shadow:1vmin 0 3vmin 2vmin #f50,inset -1vmin 0 3vmin 4vmin #f80,-4vmin 0 35vmin 0 #f60;animation:bh 5s linear infinite}@keyframes bh{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}black-hole:after,black-hole:before{content:"";background:#fff;position:relative;top:6vmin}black-hole:before{width:3vmin;height:3vmin;left:40vmin;box-shadow:#ff0 0 0 2vmin 2vmin,#ff0 2vmin 4vmin 2vmin .5vmin}black-hole:after{width:38vmin;height:38vmin;opacity:.03;left:-14vmin}</style>

<div id="black-hole"><black-hole /></div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>