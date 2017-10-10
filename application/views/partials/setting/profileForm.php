<div class="row row-centered">
    <section class="col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
      <h5><b>Change Profile</b></h5>
		<form class="" action="<?= base_url('setting/updateProfil')?>" method="post">
	        <table class="table">
	          <tbody>
	            <tr>
	              <td><span class="list-group"><p> </p><i class="glyphicon glyphicon-user"></i></span></td>
	              <td>
					  <input type="text" class="form-control" name="username" placeholder=" Username"
					  id="inputusername" value="<?= $data[0]->username;?>">
				  </td>
	            </tr>
	            <tr>
	              <td><span class="list-group"><p> </p><i class="glyphicon glyphicon-credit-card"></i></span></td>
	              <td>
					  <input type="text" class="form-control" name="id" placeholder=" ID Number"
					  id="inputid" value="<?= $data[0]->id_number;?>">
				  </td>
	            </tr>
	            <tr>
	              <td><span class="list-group"><p> </p><i class="glyphicon glyphicon-home"></i></span></td>
	              <td>
					  <input type="text" class="form-control" name="address" placeholder=" Address"
					  id="inputaddress" value="<?= $data[0]->alamat;?>" >
				  </td>
	            </tr>
	            <tr>
	              <td><span class="list-group"><p> </p><i class="glyphicon glyphicon-envelope"></i></span></td>
	              <td>
					  <input type="email" class="form-control" name="email" placeholder=" Email"
					  id="inputemail" value="<?= $data[0]->email;?>" >
				  </td>
	            </tr>
	            <tr>
	              <td><span class="list-group"><p> </p><i class="glyphicon glyphicon-calendar"></i></span></td>
	              <td>
					  <input type="date" class="form-control" name="date" placeholder=" "
					  id="inputdate" value="<?= $data[0]->TTL?>" >
				  </td>
	            </tr>
	          </tbody>
	        </table>
          <button type="submit" class="container btn btn-primary btn-block"><h6>Submit</h6></button>
	  	</form>
    </section>
  </div>