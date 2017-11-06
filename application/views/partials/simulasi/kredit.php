<div class="row row-centered">
    <section class="col-centered col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
        <div class="jumbotron vertical-center">
            <h3 style="text-align:center;">SIMULASI KREDIT</h3>
        </div>


        <form action="<?= base_url('simulasi/proses_kredit');?>" method="POST">
            <div class="form-group">
                <label for="">Jumlah kredit</label>
                <input type="text" class="form-control" name="jumlah" placeholder="Jumlah kredit"></input>
            </div>
            <div class="form-group">

                <div class="row">
                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-primary" value="Input">
                    </div>
                    <div class="col-sm-offset-4 col-sm-4 text-right">
                        <a href="<?= base_url('simulasi'); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

            </div>
        </form>
    </section>
</div>
