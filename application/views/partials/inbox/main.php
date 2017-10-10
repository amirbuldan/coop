<div class="row row-centered">
    <section class="col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
        <ul class="list-group">

			<a href="#message" class="list-group-item" data-toggle="modal"><span class="glyphicon glyphicon-envelope"> tes1</a>
		<?php foreach ($msg as $key => $m): ?>
			<a href="<?= '#'.$m->id_message;?>" class="list-group-item" data-toggle="modal">
				<span class="glyphicon glyphicon-envelope"> <?= $m->judul; ?></a>
		<?php endforeach; ?>
        </ul>
    </section>
</div>

<!-- modal -->
<div class="modal fade" id="message" role="dialog">
	<div class="modal-dialog">

		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" name="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" name="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php foreach ($msg as $key => $m): ?>
	<div class="modal fade" id="<?= $m->id_message;?>" role="dialog">
		<div class="modal-dialog">

			<!-- modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" name="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><?= $m->judul; ?></h4>
				</div>
				<div class="modal-body">
					<p><?= $m->isi; ?></p>
				</div>
				<div class="modal-footer">
					<button type="button" name="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>