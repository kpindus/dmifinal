<? $this->layout = 'Admin'; ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"><? echo $subTitle; ?></h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>#ID</th>
                <th>Content</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($contactsContent as $curContent) : ?>
                <tr>
                    <td class="edit-row"><a href="#">Edit</a></td>
                    <td class="data-row-id"><? echo $curContent->id; ?></td>
                    <td><? echo substr(htmlspecialchars($curContent->content, ENT_HTML5), 0, 50) . '...'; ?></td>
                </tr>
            <? endforeach;?>
            <tr>
            </tbody>
        </table>
        <button class="btn btn-default cancel-btn">Cancel</button>
    </div>
    <div class="row add-edit-block">
        <form class="data-form" action="AdminContacts/Edit" method="post">
            <fieldset class="form-group">
                <label for="content_body">Content</label>
                <textarea class="form-control content_body" rows="5" name="content">
                </textarea>
            </fieldset>
            <button class="btn btn-default" class="submit">Submit</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="../../../webroot/js/Admin/contacts.js"></script>
