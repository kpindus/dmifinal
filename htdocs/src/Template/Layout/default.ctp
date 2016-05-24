<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
        <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('lightbox.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script type="text/javascript" src="../../../webroot/js/jquery.min.js"></script>
</head>
<body>
<div id="wrapper">
    <div id="topline">
        <div id="topfone">
        </div>
        <header>
            <ul>
                <li><? echo $this->Html->link('main page', 'Main'); ?></li>
                <li><? echo $this->Html->link('news', 'News'); ?></li>
                <li><? echo $this->Html->link('about us', 'About'); ?></li>
                <li><? echo $this->Html->link('music', 'Albums'); ?></li>
                <li><? echo $this->Html->link('gallery', 'Gallery'); ?></li>
                <li><? echo $this->Html->link('contacts', 'Contacts', ['id' => 'lastchld']); ?></li>
            </ul>
        </header>
    </div>
    <?= $this->fetch('content') ?>
    <footer>
        <p>
            <a href="https://www.facebook.com/clubdmi/">
                <? echo $this->Html->image('fb.png'); ?>
            </a>
            <a href="https://delaymyinnocence1.bandcamp.com/releases">
                <? echo $this->Html->image('bc.png'); ?>
            </a>
            <a href="https://itunes.apple.com/gb/artist/delay-my-innocence/id1105033997">
                <? echo $this->Html->image('itunes.png'); ?>
            </a>
            <a href="https://soundcloud.com/delay-my-innocence">
                <? echo $this->Html->image('soundCloud.png'); ?>
            </a>
            <a href="https://play.spotify.com/artist/3GoSMNzgYKkdAWmZO2Bdh5">
                <? echo $this->Html->image('spotify.png'); ?>
            </a>
        </p>
    </footer>
</div>
</body>
</html>
