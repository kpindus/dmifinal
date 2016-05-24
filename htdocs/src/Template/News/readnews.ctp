<div id="containernews">
    <div id="contentnews">
            <div class="news">
                <h2><span><? echo $selectedNews->new_name; ?></span></h2>
                <? echo $selectedNews->new_content; ?>
                <p class="datenews"><? echo date('d-m-Y', strtotime($selectedNews->new_date)); ?></p>
            </div>
    </div>
</div>