<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		    <i class="fas fa-building"></i> Form Update Data Penjadwalan
		</div>

		<?php foreach ($dt_jadwal as $jd) : ?>
	
	<form method="post" action="<?php echo base_url('administrator/dt_jadwal/update_aksi') ?>">
		<div class="form-group">
				<label>Nomor SPK</label>
				<input type="hidden" name="dt_jadwal" value="<?php echo $jd->no_spk ?>">
				<input type="text" name="no_spk" class="form-control" value="<?php echo $jd->no_spk ?>">
		</div>

		<div class="form-group">
				<label>Tanggal SPK</label>
				<input type="text" name="tgl_spk" class="form-control" value="<?php echo $jd->tgl_spk ?>">
			</div>

			<div class="form-group">
				<label>Tanggal Kirim</label>
				<input type="text" name="tgl_kirim" class="form-control" value="<?php echo $jd->tgl_kirim ?>">
			</div>

			<div class="form-group">
				<label>Id Pesanan</label>
				<input type="text" name="id_pesanan" class="form-control" value="<?php echo $jd->id_pesanan ?>">
			</div>

			<div class="form-group">
				<label>Jumlah</label>
				<input type="text" name="jumlah" class="form-control" value="<?php echo $jd->jumlah ?>">
			</div>
			
		<button type="submit" class="btn btn-primary">Simpan
		</button>
	</form>

	<?php endforeach; ?>
</div>