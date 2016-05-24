<div id="containernews">
    <div class="gallery-block">
        <div class="image-block">
            <? foreach ($allPhoto as $curPhoto): ?>
              <p>
                  <a href="../../../webroot/img/gallery/<? echo $curPhoto->photo_name; ?>" data-lightbox="<? echo $curPhoto->photo_name; ?>">
                    <? echo $this->Html->image('gallery/preview/' . $curPhoto->photo_name, ['class' => 'image-settings']); ?>
                  </a>
              </p>
            <?endforeach;?>
        </div>
    </div>
</div>
<script src="../../../webroot/js/lightbox/lightbox.js"></script>
<script>
    $(document).ready(function(){
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    });
</script>
