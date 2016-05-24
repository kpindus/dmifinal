<? $this->layout = 'Admin'; ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"><? echo $subTitle; ?></h1>
    <div class="row">
        <div class="upload-block">
            <form action="AdminGallery/uploadfiles" method="post" enctype="multipart/form-data">
                <input type="file" name="uploadFile[]" id="uploadFile" multiple>
                <button type="submit" class="submit-files btn btn-default" name="submit">Upload files</button>
            </form>
            <input type="button" class="select-files-btn btn btn-toolbar" value="Select Files">
            <p class="files-info"></p>
        </div>
    </div>
    <hr>
    <div class="row gallery-block">
        <? foreach ($photo as $curPhoto) : ?>
            <div class="image-block row">
                <a href="../../../webroot/img/gallery/<? echo $curPhoto->photo_name; ?>" data-lightbox="<? echo $curPhoto->photo_name; ?>">
                    <? echo $this->Html->image('gallery/preview/' . $curPhoto->photo_name, ['class' => 'image-settings']); ?>
                </a>
                <a href="<? echo 'AdminGallery/delete/' . $curPhoto->id; ?>"><button class="delete-image-btn btn btn-default">Delete</button></a>
            </div>
        <? endforeach; ?>
    </div>
</div>
<script src="../../../webroot/js/Admin/gallery.js"></script>
<script src="../../../webroot/js/lightbox/lightbox.js"></script>