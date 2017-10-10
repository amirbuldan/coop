<div class="row row-centered">
    <section class="col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">        
    <!-- penyesuaian ukuran menyusul-->
    <div class="well container-fluid">
        <div class="row">
            <div class="col-xs-6">
                <h3><?= strtoupper($data[0]->nama); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <h4>No Rekening: <?= $data[0]->no_rekening;?></h4>
            </div>
            <div class="col-xs-6">
                <h4 style="text-align:right;">
                    Saldo Rp. <?= number_format($data[0]->saldo, 2, ',', '.');?>
                </h4>
            </div>
        </div>
    </div>
    
    