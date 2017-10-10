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
	<a href="<?= base_url('setting');?>" class="side table"><span class="glyphicon glyphicon-wrench"></span> Settings</a>
	<a href="#" data-href="<?= base_url('auth/logout');?>" class="side table" data-toggle="modal" data-target="#modal-confirm"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-3">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">
            <span class="glyphicon glyphicon-menu-hamburger" style="color:white;top: 4px;padding-top:5%;"></span>
          </span>
        </div>
        <div class="col-xs-6">
            <h1 style="font:Roboto;font-size:31px;text-align:center;color:#ffffff;"><b><?= strtoupper($template['title']); ?></b></h1>
        </div>
        </div>
    </div>
    </div>

<div class="modal fade" id="modal-confirm" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger btn-ok">logout</a>
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

function confirm_logout() {
    confirm("Anda yakin ingin keluar?");
}
$('#modal-confirm').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>