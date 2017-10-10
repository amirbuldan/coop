<div class="row row-centered">
    <section class="col-centered col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
      <div class="jumbotron vertical-center">
        <h3 style="text-align:center;">Rp.<?= number_format($data[0]->saldo, 2, ',','.'); ?></h3>
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

			<?php foreach ($trans as $value): ?>
				<tr>
	              <td><?= mdate("%d/%m/%Y" ,mysql_to_unix($value->tgl_transaksi)); ?></td>
	              <td><?= $value->jenis; ?></td>
				  <?php if ($value->jenis == 'kredit'): ?>
				  		<td>-</td>
						<td><?= "Rp. ". number_format($value->jumlah_transaksi, 2,',','.'); ?></td>
				  <?php else: ?>
					  <td><?= "Rp. ".number_format($value->jumlah_transaksi, 2, ',', '.'); ?></td>
					  <td>-</td>
				  <?php endif; ?>
	            </tr>
			<?php endforeach; ?>

          </tbody>


      </table>
    </section>
</div>