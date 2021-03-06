<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style-home.css');?>">
	<title>Settings</title>
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
            <h1 style="font:Roboto;font-size:31px;text-align:center;color:#ffffff;"><b>SETTINGS</b></h1>
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
 <div class="row row-centered">
    <section class="col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
        <ul class="list-group">
          <a href= "<?= base_url('settings/profil')?>" class="list-group-item"><span class="glyphicon glyphicon-user"> Ubah Profil</a>
          <a href= "<?= base_url('settings/password')?>" class="list-group-item"><span class="glyphicon glyphicon-th"> Ubah Password</a>
        </ul>
    </section>
  </div>
</div>


<script src="<?= base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/js/script.js');?>"></script>
</body>
</html>
