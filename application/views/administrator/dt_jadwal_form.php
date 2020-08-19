<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		    <i class="fas fa-building"></i> Form Input Data Penjadwalan
		</div>

	<form method="post" action="<?php echo base_url('administrator/dt_jadwal/tambah_jadwal_aksi') ?>">
		<div class="form-group">
			<label>Tanggal SPK</label>
			<input type="text" name="tgl_spk" placeholder="Masukkan Tanggal SPK" class="form-control">
			<?php echo form_error('tgl_spk','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>tgl_kirim</label>
			<input type="text" name="tgl_kirim" placeholder="Masukkan Tanggal Kirim" class="form-control">
			<?php echo form_error('waktu','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Id Pesanan</label>
			<input type="text" name="id_pesanan" placeholder="Masukkan Id Pesanan" class="form-control">
			<?php echo form_error('id_pesanan','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Jumlah</label>
			<input type="text" name="jumlah" placeholder="Jumlah" class="form-control">
			<?php echo form_error('jumlah','<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan
		</button>
	</form>
</div>