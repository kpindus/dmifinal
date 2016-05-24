<div id="containernews">
    <div id="contentnews">
        <? foreach ($allAlbums as $album): ?>
        <div class="news">
            <h2><span><? echo $album->album_name; ?></span></h2>
            <? echo $album->album_description; ?>
            <p class="datenews"><? echo $album->date; ?></p>
        </div>
        <?endforeach;?>
    </div>
</div>