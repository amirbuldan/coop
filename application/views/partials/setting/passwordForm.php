<div class="row row-centered">
    <section class="col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
        <h5><b>Change Password</b></h5>
        <form class="" action="<?= base_url('setting/updatePassword')?>" method="post">
            <table class="table">
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <tbody>
                <tr>
                    <td><span class="list-group"><p> </p><i class="glyphicon glyphicon-th"></i></span></td>
                    <td><input type="password" class="form-control" name="oldpassword" placeholder=" Previous Password" id="inputoldpassword"></td>
                </tr>
                <tr>
                    <td><span class="list-group"><p> </p><i class="glyphicon glyphicon-th"></i></span></td>
                    <td><input type="password" class="form-control" name="newpassword" placeholder=" New Password" id="inputnewpassword"></td>
                </tr>
                <tr>
                    <td><span class="list-group"><p> </p><i class="glyphicon glyphicon-th"></i></span></td>
                    <td><input type="password" class="form-control" name="confirmnewpassword" placeholder=" Confirm Password" id="confirmpassword"></td>
                </tr>
                </tbody>
            </table>
            <button type="submit" class="container btn btn-primary btn-block"><h6>Submit</h6></button>
        </form>
    </section>
</div>