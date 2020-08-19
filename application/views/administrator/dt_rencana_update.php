<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		    <i class="fas fa-building"></i> Form Update Data Rencana Produksi
		</div>

		<?php foreach ($dt_rencana as $rc) : ?>
	
	<form method="post" action="<?php echo base_url('administrator/dt_rencana/update_aksi') ?>">
		<div class="form-group">
				<label>Id Pesanan</label>
				<input type="hidden" name="dt_rencana" value="<?php echo $rc->id_rencana ?>">
				<input type="text" name="id_rencana" class="form-control" value="<?php echo $rc->id_rencana ?>">
		</div>

		<div class="form-group">
			<label>Waktu</label>
			<input type="text" name="waktu" placeholder="Masukkan Waktu" class="form-control">
			<?php echo form_error('waktu','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
				<label>Aliran Waktu</label>
				<input type="text" name="aliran_waktu" class="form-control" value="<?php echo $cr->aliran_waktu ?>">
			</div>

			<div class="form-group">
				<label>Due Date</label>
				<input type="text" name="due_date" class="form-control" value="<?php echo $cr->due_date ?>">
			</div>

			<div class="form-group">
				<label>Keterlambatan</label>
				<input type="text" name="keterlambatan" class="form-control" value="<?php echo $cr->keterlambatan ?>">
			</div>

		<button type="submit" class="btn btn-primary">Simpan
		</button>
	</form>

	<?php endforeach; ?>
</div>