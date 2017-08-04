<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style-home.css');?>">
	<script src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
	<title>Home</title>
</head>

<body>
  <div class="icon-bar">
    <div id="mySidenav" class="sidenav">
      <div class="info container-fluid">
        <div class="list-group">
          <h4><?= strtoupper($data[0]->nama); ?></h4>
          <h5><?= $data[0]->no_rekening; ?></h5>
        </div>
      </div>
    <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span>
      <a href="<?= base_url('');?>" class="side table"><span class="glyphicon glyphicon-home"></span> Home</a>
      <a href="<?= base_url('history');?>" class="side table"><span class="glyphicon glyphicon-duplicate"></span> History</a>
      <a href="<?= base_url('inbox');?>" class="side table"><span class="glyphicon glyphicon-envelope"></span> Inbox</a>
      <a href="<?= base_url('settings');?>" class="side table"><span class="glyphicon glyphicon-wrench"></span> Settings</a>
      <a data-href="<?= base_url('auth/logout');?>" class="side table" data-toggle="modal" data-target="#confirm-logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </div>

<!-- modal confirm logout -->
<div class="modal fade" id="confirm-logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				....
			</div>
			<div class="modal-body">
				Yakin ingin keluar ?
			</div>
			<div class="modal-footer">
				<button type="button" name="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="<?= base_url('auth/logout');?>" class="btn btn-danger btn-ok">Logout</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#confirm-logout').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-3">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">
            <span class="glyphicon glyphicon-menu-hamburger" style="color:white;top: 4px;padding-top:5%;"></span>
          </span>
        </div>
        <div class="col-xs-6">
            <h1 style="font:Roboto;font-size:31px;text-align:center;color:#ffffff;"><b>HOME</b></h1>
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

<div style="padding-top:3%;" class="container-fluid">
	<?php if ($this->session->flashdata('msg')): ?>
		<div class="alert alert-success alert-dismissable">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		    <strong>Success!</strong> <?= $this->session->flashdata('msg'); ?>.
	  	</div>
	<?php endif; ?>
 <div class="row row-centered">
    <section class="col-centered col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
      <div class="jumbotron vertical-center">
        <h3 style="text-align:center;">IDR. <?= $data[0]->saldo; ?></h3>
      </div>

    <h3>History</h3>
      <table class="table table-striped">

          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Transaksi</th>
              <th>Debit</th>
              <th>Kredit</th>
            </tr>
          </thead>
          <tbody>

			<?php foreach ($trans as $key => $value): ?>
				<tr>
	              <td><?= mdate("%d/%m/%Y" ,mysql_to_unix($value['tanggal_transaksi'])); ?></td>
	              <td><?= $value['jenis_transaksi']; ?></td>
				  <?php if ($value['jenis_transaksi'] == 'kredit'): ?>
				  		<td>-</td>
						<td><?= "IDR. ". $value['jumlah']; ?></td>
				  <?php else: ?>
					  <td><?= "IDR. ".$value['jumlah']; ?></td>
					  <td>-</td>
				  <?php endif; ?>
	            </tr>
			<?php endforeach; ?>

          </tbody>


      </table>
    </section>
  </div>
</div>


<script src="<?= base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/js/script.js');?>"></script>
</body>
</html>
