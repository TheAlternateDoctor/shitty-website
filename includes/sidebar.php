<?php
include_once("visitorCounter.php");
?>

<div class="navigation">
    <img src="/img/navigation.png" class="img-nav">

    <div class="navbar">
        <a href="/index.html">Main page</a><br>
        <a href="/projects.html">Projects</a><br>
        <a href="/gallery/gallery.html">Gallery</a><br>
        <h2><a href="/lore/index.html">Lore and OCs:</a></h2>
        <a href="/lore/matt.html">Matt</a><br>
        <a href="/lore/thierry.html">Thierry</a><br>
        <a href="/lore/diode.html">Diode</a><br>
        <a href="/lore/cathode.html">Cathode</a><br>
        <a href="/lore/camp.html">Camp</a><br>
    </div>

    <div class="sticky-socials footer" id="footer">
        <a href="https://www.youtube.com/c/TheAlternateDoctor" class="blinky-footer-single"><img src="/img/blinkies/youtube.gif" class="blinky-footer"></a>
        <br/>
        <a href="https://x.com/AlternateDoctor"><img src="/img/blinkies/twitter.gif" class="blinky-footer"></a>
        <a href="https://bsky.app/profile/matt.thealtdoc.fr"><img src="/img/blinkies/bluesky.gif" class="blinky-footer"></a>
        <img src="/img/blinkies/coffee.gif" class="blinky-footer">
        <img src="/img/blinkies/music.gif" class="blinky-footer">
        <img src="/img/blinkies/slow.gif" class="blinky-footer">
        <img src="/img/blinkies/arch.gif" class="blinky-footer">
        <br/>
        <img src="/img/blinkies/agender.gif" class="blinky-footer">
        <img src="/img/blinkies/pan.gif" class="blinky-footer">
        <br/>
        <div id="visitors">"Since the beginning, this website saw <?php echo $visitorCount ?> visitors!"</div>
    </div>
</div>