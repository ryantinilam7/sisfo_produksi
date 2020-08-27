<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		    <i class="fas fa-building"></i> Form Input Data Rencana Produksi
		</div>
	
	<form method="post" action="<?php echo base_url('administrator/dt_rencana/tambah_rencana_aksi') ?>">
		<div class="form-group">
			<label>Nama Pesanan</label>
			<input type="text" name="tgl_pesan" placeholder="Masukkan Nama Pesanan" class="form-control">
			<?php echo form_error('tgl_pesan','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Waktu</label>
			<input type="text" name="waktu" placeholder="Masukkan Jumlah Waktu" class="form-control">
			<?php echo form_error('waktu','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Aliran Waktu</label>
			<input type="text" name="aliran_waktu" placeholder="Masukkan Aliran Waktu" class="form-control">
			<?php echo form_error('aliran_waktu','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Due Date</label>
			<input type="text" name="due_date" placeholder="Masukkan Due Date" class="form-control">
			<?php echo form_error('due_date','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Keterlambatan</label>
			<input type="text" name="keterangan" placeholder="Masukkan keterangan" class="form-control">
			<?php echo form_error('keterangan','<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan
		</button>
	</form>
</div>