<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style-home.css');?>">
	<title>History</title>
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
            <h1 style="font:Roboto;font-size:31px;text-align:center;color:#ffffff;"><b>HISTORY</b></h1>
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

    <!-- penyesuaian ukuran menyusul-->
    <div class="well container-fluid">
        <div class="row">
        <div class="col-xs-6">
          <h3><?= $data[0]->nama; ?></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <h4>No Rekening: <?= $data[0]->no_rekening;?></h4>
        </div>
        <div class="col-xs-6">
          <h4 style="text-align:right;">Saldo IDR <?= $data[0]->saldo;?></h4>
        </div>
        </div>
      </div>

        <!-- <div class="row">

          <div class="col-xs-1">
            <h5>Dari: </h5>
          </div>

          <div class="col-xs-1">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input id="date" type="date" class="form-control">
            </div>
          </div>

          <div class="col-xs-1">
            <h5>Sampai: </h5>
          </div>

          <div class="col-xs-1 style="align:left;"">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input id="email" type="date" class="form-control">
            </div>
          </div> -->

   <div class="container">
    <div class='col-xs-3'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='date' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-xs-3'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='date' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>



        <table class="table table-hover">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Transaksi</th>
              <th>Debit</th>
              <th>Kredit</th>
            </tr>
          </thead>
          <tbody>

			<?php foreach ($data as $key => $value): ?>
				<tr>
	              <td><?= mdate('%d/%m/%Y' ,mysql_to_unix($value->tanggal_transaksi)); ?></td>
	              <td><?= $value->jenis_transaksi ?></td>
				  	<?php if ($value->jenis_transaksi == 'debit'): ?>
					  	<td><?= $value->jumlah; ?></td>
				  		<td>-</td>
					<?php elseif ($value->jenis_transaksi == 'kredit'):?>
				  		<td>-</td>
						<td><?= $value->jumlah; ?></td>
				  	<?php endif; ?>
	            </tr>
			<?php endforeach; ?>
          </tbody>
        </table>
        <table>
          <tbody>
            <tr>
              <td>Saldo awal</td>
              <td>....</td>
            </tr>
            <tr>
              <td>Saldo debit</td>
              <td>....</td>
            </tr>
            <tr>
              <td>total kredit</td>
              <td>....</td>
            </tr>
            <tr>
              <td>Saldo akhir</td>
              <td>....</td>
            </tr>
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
