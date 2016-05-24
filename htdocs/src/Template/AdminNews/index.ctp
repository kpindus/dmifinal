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
                <th>New's name</th>
                <th>New's body</th>
                <th>Date</th>
                <th>Is Main</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($allNews as $curNew) : ?>
                <tr>
                    <td class="delete-row"><a href="<? echo 'AdminNews/delete/' . $curNew->id ?>">Delete</a></td>
                    <td><a class="edit-row" href="#">Edit</a></td>
                    <td class="data-row-id"><? echo $curNew->id; ?></td>
                    <td><? echo $curNew->new_name; ?></td>
                    <td><? echo substr(htmlspecialchars($curNew->new_content, ENT_HTML5), 0, 50) . '...'; ?></td>
                    <td><? echo $curNew->new_date; ?></td>
                    <td><? echo ($curNew->new_is_main == 1) ? "true" : "false"; ?></td>
                </tr>
            <? endforeach; ?>
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
        <form class="data-form" action="AdminNews/Add" method="post">
            <fieldset class="form-group">
                <div class="row inline">
                    <div>
                        <label for="name">New's name</label>
                        <input type="text" id="name" class="form-control header-name" placeholder="New's name"
                               name="new_name">
                    </div>
                    <div>
                        <label for="is-main">Is Main</label>
                        <select class="is-main form-control" name="is_main">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <br>
                <label for="new_body">New's body</label>
                <textarea class="form-control content_body" rows="5" name="new_content"></textarea>
            </fieldset>
            <button class="btn btn-default submit">Submit</button>
        </form>
    </div>
</div>

<script type="text/javascript" src="../../../webroot/js/Admin/news.js"></script>