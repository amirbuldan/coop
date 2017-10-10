<div class="container">
  <form action="<?= base_url('history/sort');?>" method="GET">
  <div class='col-xs-3'>
      <div class="form-group">
          <div class='input-group date' id='datetimepicker6'>
              <input type='date' class="form-control" name="ts" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
      </div>
  </div>
  <div class='col-xs-3'>
      <div class="form-group">
          <div class='input-group date' id='datetimepicker7'>
              <input type='date' class="form-control" name="te" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
      </div>
  </div>
  <div class="col-xs-3">
    <div class="form-group">
      <input type="submit" value="sort" class="btn btn-primary">
    </div>
  </div>
  </form>
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

			<?php foreach ($history[0] as $value): ?>
				<tr>
	              <td><?= mdate('%d/%m/%Y' ,mysql_to_unix($value->tgl_transaksi)); ?></td>
                <td><?= $value->jenis ;?></td>
				  	<?php if ($value->jenis == 'debit'): ?>
					  	<td><?= number_format($value->jumlah_transaksi, 2, ',', '.'); ?></td>
				  		<td>-</td>
					<?php elseif ($value->jenis == 'kredit'):?>
				  		<td>-</td>
						<td><?= number_format($value->jumlah_transaksi, 2, ',', '.'); ?></td>
				  	<?php endif; ?>
	            </tr>
			<?php endforeach; ?>
          </tbody>
        </table>
        <br />
        <br />
        <table class="table table-hover">
          <tbody>
            <tr>
              <td>Saldo awal</td>
              <td class="text-right"><?= number_format($history[1][0]->saldo_awal, 2, ',', '.');?></td>
            </tr>
            <tr>
              <td>Saldo debit</td>
              <td class="text-right"><?= number_format($history[2][0]->total_debit, 2, ',', '.');?></td>
            </tr>
            <tr>
              <td>total kredit</td>
              <td class="text-right"><?= number_format($history[3][0]->total_kredit, 2, ',', '.');?></td>
            </tr>
            <tr>
              <td>Saldo akhir</td>
              <td class="text-right"><?= number_format($history[4][0]->saldo_akhir, 2, ',', '.');?></td>
            </tr>
          </tbody>
        </table>