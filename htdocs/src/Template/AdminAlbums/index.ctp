<? $this->layout = 'Admin'; ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"><? echo $subTitle; ?></h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>#ID</th>
                <th>Album name</th>
                <th>Album Description</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($allAlbums as $curAlbum) : ?>
                <tr>
                    <td class="delete-row"><a href="<? echo 'AdminAlbums/delete/' . $curAlbum->id; ?>">Delete</a></td>
                    <td><a class="edit-row" href="#">Edit</a></td>
                    <td class="data-row-id"><? echo $curAlbum->id; ?></td>
                    <td><? echo $curAlbum->album_name; ?></td>
                    <td><? echo substr(htmlspecialchars($curAlbum->album_description, ENT_HTML5), 0, 50) . '...'; ?></td>
                    <td><? echo $curAlbum->date; ?></td>
                </tr>
            <? endforeach;?>
            <tr>
            </tbody>
        </table>
    </div>
    <div class="row pagination-block">
        <div class="paginator">
            <ul>
                <? echo $this->Paginator->prev('Previous'); ?>
                <? echo $this->Paginator->numbers(['first' => 1, 'last' => 1]); ?>
                <? echo $this->Paginator->next('Next'); ?>
            </ul>
            <div class="row">
                <? echo $this->Paginator->counter('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}'); ?>
            </div>
        </div>
    </div>
    <button class="btn btn-default add-btn">Add New</button>
    <button class="btn btn-default cancel-btn">Cancel</button>
    <div class="row add-edit-block">
        <form class="data-form" action="AdminAlbums/add" method="post">
            <fieldset class="form-group">
                <br>
                <label for="album_name">Album's name</label>
                <input type="text" class="form-control header-name" placeholder="Album name" name="album_name">
                <br>
                <label for="content_body">Albums's description</label>
                <textarea class="form-control content_body" rows="5" name="content"></textarea>
            </fieldset>
            <button class="btn btn-default submit">Submit</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="../../../webroot/js/Admin/albums.js"></script>
