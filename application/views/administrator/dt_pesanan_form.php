<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-building"></i> Form Input Data Pesanan
	</div>

	<form method="post" action="<?php echo base_url('administrator/dt_pesanan/tambah_pesanan_aksi') ?>">
		<div class="form-group">
			<label>Tanggal Pesan</label>
			<input type="date" name="tgl_pesan" placeholder="Masukkan Tanggal Pesanan" class="form-control">
			<?php echo form_error('tgl_pesan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal Kirim</label>
			<input type="date" name="tgl_kirim" placeholder="Masukkan Tanggal Kirim" class="form-control">
			<?php echo form_error('tgl_kirim', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Perusahaan</label>
			<input type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" class="form-control">
			<?php echo form_error('nama_perusahaan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Produk</label>
			<input type="text" name="produk" placeholder="Masukkan Produk" class="form-control">
			<?php echo form_error('produk', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Keterangan</label>
			<input type="text" name="keterangan" placeholder="Masukkan keterangan" class="form-control">
			<?php echo form_error('keterangan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Jumlah</label>
			<input type="text" name="jumlah" placeholder="Masukkan jumlah" class="form-control">
			<?php echo form_error('jumlah', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nomor PO</label>
			<input type="text" name="no_po" placeholder="Masukkan Nomor PO" value=" PI-PO/2020<?= $month, $aii ?> " class="form-control disabled" readonly>
			<?php echo form_error('no_po', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan
		</button>
	</form>
</div>