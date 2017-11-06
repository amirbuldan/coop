<div class="row row-centered">
    <section class="col-centered col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
        <div class="jumbotron vertical-center">
            <h3 style="text-align:center;">SIMULASI TRANSFER</h3>
        </div>

        <form action="<?= base_url('simulasi/proses_transfer');?>" method="POST">
            <div class="form-group">
                <label for="">Rekening Tujuan</label>
                <input type="text" class="form-control" name="rek_tujuan" placeholder="rekening tujuan"></input>
            </div>
            <div class="form-group">
                <label for="">Jumlah Transfer</label>
                <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Transfer"></input>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="submit" class="btn btn-primary" value="Transfer">
                </div>
                <div class="col-sm-offset-4 col-sm-4 text-right">
                    <a href="<?= base_url('simulasi'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </section>
</div>
