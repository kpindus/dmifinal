<div id="containernews">
    <div id="contentnews">
        <h2>we are<span> DMI</span></h2>
            <?foreach ($allRows as $curRow): ?>
                <? echo $curRow->content; ?>
            <?endforeach;?>
    </div>
</div>