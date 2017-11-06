<div class="container">
    <div class="row">
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
        <div class="col-xs-1">

          <div class="form-group">
            <input type="submit" value="sort" class="btn btn-primary">
          </div>

        </div>
        </form>
      </div>
    </div>

<div class="clearfix">
<br>

</div>

       <table class="table table-hover table-data">
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
	              <td>
                      <span style='display:none;'><?= mdate('%Y%m%d' ,mysql_to_unix($value->tgl_transaksi)); ?></span>
                      <?= mdate('%d/%m/%Y' ,mysql_to_unix($value->tgl_transaksi)); ?>
                  </td>
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
              <td class="text-right"><?= number_format(
                  isset($history[1]['saldo_awal'][0]->saldo_awal) ? $history[1]['saldo_awal'][0]->saldo_awal : 0
                  , 2, ',', '.');?></td>
            </tr>
            <tr>
              <td>Saldo debit</td>
              <td class="text-right"><?= number_format($history[1]['total_debit'][0]->total_debit, 2, ',', '.');?></td>
            </tr>
            <tr>
              <td>total kredit</td>
              <td class="text-right"><?= number_format($history[1]['total_kredit'][0]->total_kredit, 2, ',', '.');?></td>
            </tr>
            <tr>
              <td>Saldo akhir</td>
              <td class="text-right"><?= number_format(
                  isset($history[1]['saldo_akhir'][0]->saldo_akhir) ? $history[1]['saldo_akhir'][0]->saldo_akhir : 0
                  , 2, ',', '.');?></td>
            </tr>

          </tbody>
        </table>
<script src="<?= base_url('assets/js/jquery-3.1.1.min.js');?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/datatables.min.js');?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js');?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap.min.js');?>" charset="utf-8"></script>
<script>
    $(document).ready( function(){
        $('.table-data').DataTable( {
            responsive:true,
            aaSorting : [
                [0, 'desc'],
            ],
        });
    });
</script>
