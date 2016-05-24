<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Board</title>

    <!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?= $this->Html->css('ie10-viewport-bug-workaround') ?>

    <!-- Custom styles for this template -->
    <?= $this->Html->css('dashboard') ?>
    <?= $this->Html->css('AdminsStyle.css') ?>
    <?= $this->Html->css('lightbox.css') ?>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script type="text/javascript" src="../../../webroot/js/helpers/ie-emulation-modes-warning.js">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9] -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="../../../webroot/js/jquery.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DMI Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Admin/logout">Exit</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="<? echo strpos(strtolower($this->request->url), 'news') !== false ? 'active' : 'notactive'; ?>"><? echo $this->Html->link('News', '/AdminNews');  ?></li>
                <li class="<? echo strpos(strtolower($this->request->url), 'about') !== false ? 'active' : 'notactive'; ?>"><? echo $this->Html->link('About Us', '/AdminAboutUs');  ?></li>
                <li class="<? echo strpos(strtolower($this->request->url), 'albums') !== false ? 'active' : 'notactive'; ?>"><? echo $this->Html->link('Albums', '/AdminAlbums');  ?></li>
                <li class="<? echo strpos(strtolower($this->request->url), 'gallery') !== false ? 'active' : 'notactive'; ?>"><? echo $this->Html->link('Gallery', '/AdminGallery');  ?></li>
                <li class="<? echo strpos(strtolower($this->request->url), 'contacts') !== false ? 'active' : 'notactive'; ?>"><? echo $this->Html->link('Contacts', '/AdminContacts');  ?></li>
            </ul>
        </div>
        <?= $this->fetch('content') ?>
    </div>
</div>

<!-- Placed at the end of the document so the pages load faster -->
<script src="../../../webroot/js/bootstrap/bootstrap.min.js"></script>
<script src="../../../webroot/js/helpers/holder.min.js"></script>
<script src="../../../webroot/js/helpers/ie10-viewport-bug-workaround.js"></script>
<script src="../../../webroot/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../../webroot/js/Admin/AdminMain.js"></script>
</body>
</html>

