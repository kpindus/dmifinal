<div id="containernews">
    <div id="contentnews">
        <h2><span>Contacts:</span></h2>
        <? foreach ($allContacts as $contact): ?>
            <? echo $contact->content; ?>
        <? endforeach; ?>
    </div>
</div>