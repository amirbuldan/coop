<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style-home.css');?>">
	<title>Inbox</title>
</head>
<body>
<div class="icon-bar">
    <div id="mySidenav" class="sidenav">
      <div class="info container-fluid">
        <div class="list-group">
          <h4>--nama--</h4>
          <h5>--no rekening--</h5>
        </div>
      </div>
    <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span>
	<a href="<?= base_url('');?>" class="side table"><span class="glyphicon glyphicon-home"></span> Home</a>
	<a href="<?= base_url('history');?>" class="side table"><span class="glyphicon glyphicon-duplicate"></span> History</a>
	<a href="<?= base_url('inbox');?>" class="side table"><span class="glyphicon glyphicon-envelope"></span> Inbox</a>
	<a href="<?= base_url('settings');?>" class="side table"><span class="glyphicon glyphicon-wrench"></span> Settings</a>
	<a href="<?= base_url('auth/logout');?>" class="side table"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-3">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">
            <span class="glyphicon glyphicon-menu-hamburger" style="color:white;top: 4px;padding-top:5%;"></span>
          </span>
        </div>
        <div class="col-xs-6">
            <h1 style="font:Roboto;font-size:31px;text-align:center;color:#ffffff;"><b>INBOX</b></h1>
        </div>
        </div>
    </div>
  </div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<div style="padding-top:3%;" class="container">
 <div class="row row-centered">
    <section class="col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
        <ul class="list-group">

			<a href="#message" class="list-group-item" data-toggle="modal"><span class="glyphicon glyphicon-envelope"> tes1</a>
		<?php foreach ($msg as $key => $m): ?>
			<a href="<?= '#'.$m->id_message;?>" class="list-group-item" data-toggle="modal">
				<span class="glyphicon glyphicon-envelope"> <?= $m->judul; ?></a>
		<?php endforeach; ?>
        </ul>
    </section>
  </div>
</div>
<!-- lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-sed-do.  -->
<!-- modal -->
<div class="modal fade" id="message" role="dialog">
	<div class="modal-dialog">

		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" name="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" name="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php foreach ($msg as $key => $m): ?>
	<div class="modal fade" id="<?= $m->id_message;?>" role="dialog">
		<div class="modal-dialog">

			<!-- modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" name="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><?= $m->judul; ?></h4>
				</div>
				<div class="modal-body">
					<p><?= $m->isi; ?></p>
				</div>
				<div class="modal-footer">
					<button type="button" name="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<script src="<?= base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/js/script.js');?>"></script>
</body>
</html>
