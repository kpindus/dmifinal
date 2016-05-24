<div id="containernews">
    <div id="contentnews">
        <? foreach ($allNews as $curNews):?>
        <div class="news">
            <h2><span><? echo $curNews->new_name; ?></span></h2>
            <? echo substr($curNews->new_content, 0, 780); echo strlen($curNews->new_content) > 780 ? '...' : ''; ?>
            <p class="datenews"><? echo date('d-m-Y', strtotime($curNews->new_date)); ?></p>
            <p class="readmore"><a href="<? echo 'News/readnews/' . $curNews->id; ?>" class="button">Read More</a><p>
        </div>
        <? endforeach; ?>
        <div class="paginator">
            <ul>
              <? echo $this->Paginator->prev('Prev'); ?> 
              <? echo $this->Paginator->numbers(['first' => 1, 'last' => 1]); ?>
              <? echo $this->Paginator->next('Next'); ?>
            </ul>
            <div class="paginator-info">
                <p><? echo $this->Paginator->counter('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}'); ?></p>
            </div>
        </div>
    </div>
</div>
