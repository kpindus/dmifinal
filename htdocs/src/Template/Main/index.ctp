<div id="container">
    <div id="leftbar">
        <h3><span>RECENT</span> news</h3>
        <? foreach ($lastNews as $curNews):?>
        <ul class="events">
            <li class="datetime"><? echo date('d-m-Y', strtotime($curNews->new_date)); ?></li>
            <li class="info"><h3><span><? echo $curNews->new_name; ?></span></h3></li>
            <li class="info"><? echo substr($curNews->new_content, 0, 90);  echo strlen($curNews->new_content) > 90 ? '...' : '' ?></li>
            <li class="readmore"><a href="<? echo 'News/readnews/' . $curNews->id; ?>" class="button">Read More</a></li>
        </ul>
        <? endforeach; ?>
    </div>
    <div id="content">
        <? foreach ($mainNews as $main): ?>
        <h2><span><? echo $main->new_name; ?></span></h2>
            <? echo $main->new_content; ?>
            <p id="date"><? echo date('d-m-Y', strtotime($main->new_date)); ?></p>
        <? endforeach; ?>
    </div>

</div>