<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		    <i class="fas fa-building"></i> Form Input Data Hasil Produksi
		</div>
	
	<form method="post" action="<?php echo base_url('administrator/dt_hasil/tambah_hasil_aksi') ?>">
		<div class="form-group">
			<label>Id Pesanan</label>
			<input type="text" name="id_pesanan" placeholder="Masukkan Id Pesanan" class="form-control">
			<?php echo form_error('id_pesanan','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>No SPK</label>
			<input type="text" name="no_spk" placeholder="Masukkan No SPK" class="form-control">
			<?php echo form_error('no_spk','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal Selesai</label>
			<input type="text" name="tgl_selesai" placeholder="Masukkan Tanggal Selesai" class="form-control">
			<?php echo form_error('tgl_selesai','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Reject</label>
			<input type="text" name="reject" placeholder="Masukkan Reject" class="form-control">
			<?php echo form_error('produk','<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan
		</button>
	</form>
</div>