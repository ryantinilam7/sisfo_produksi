<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		    <i class="fas fa-building"></i> Form Update Data Hasil Produksi
		</div>

		<?php foreach ($dt_hasil as $hs) : ?>
	
	<form method="post" action="<?php echo base_url('administrator/dt_hasil/update_aksi') ?>">
		<div class="form-group">
				<label>Id Pesanan</label>
				<input type="hidden" name="dt_hasil" value="<?php echo $hs->id_pesanan ?>">
				<input type="text" name="id_pesanan" class="form-control" value="<?php echo $hs->id_pesanan ?>">
		</div>

		<div class="form-group">
				<label>No SPK</label>
				<input type="text" name="no_spk" class="form-control" value="<?php echo $hs->no_spk ?>">
			</div>

			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="text" name="tgl_selesai" class="form-control" value="<?php echo $hs->tgl_selesai ?>">
			</div>

			<div class="form-group">
				<label>Reject</label>
				<input type="text" name="reject" class="form-control" value="<?php echo $hs->reject ?>">
			</div>
			
		<button type="submit" class="btn btn-primary">Simpan
		</button>
	</form>

	<?php endforeach; ?>
</div>