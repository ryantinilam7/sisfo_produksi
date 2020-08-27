<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-building"></i> Form Update Data Pesanan
	</div>

	<?php foreach ($dt_pesanan as $ps) : ?>

		<form method="post" action="<?php echo base_url('administrator/dt_pesanan/update_aksi') ?>">
			<div class="form-group">
				<label>Tanggal Pesanan</label>
				<input type="hidden" name="id_pesanan" value="<?php echo $ps->id_pesanan ?>">
				<input type="date" name="tgl_pesan" class="form-control" value="<?php echo $ps->tgl_pesan ?>">
			</div>

			<div class="form-group">
				<label>Tanggal Kirim</label>
				<input type="date" name="tgl_kirim" class="form-control" value="<?php echo $ps->tgl_kirim ?>">
			</div>

			<div class="form-group">
				<label>Nama Perusahaan</label>
				<input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $ps->nama_perusahaan ?>">
			</div>

			<div class="form-group">
				<label>Produk</label>
				<input type="text" name="produk" class="form-control" value="<?php echo $ps->produk ?>">
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" class="form-control" value="<?php echo $ps->keterangan ?>">
			</div>

			<div class="form-group">
				<label>Jumlah</label>
				<input type="text" name="jumlah" class="form-control" value="<?php echo $ps->jumlah ?>">
			</div>

			<div class="form-group">
				<label>Nomor PO</label>
				<input type="text" name="no_po" class="form-control" value="<?php echo $ps->no_po ?>">
			</div>

			<button type="submit" class="btn btn-primary">Simpan
			</button>
		</form>

	<?php endforeach; ?>
</div>