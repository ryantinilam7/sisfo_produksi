<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		    <i class="fas fa-building"></i> Form Input Data Rencana Produksi
		</div>
	
	<form method="post" action="<?php echo base_url('administrator/dt_rencana/tambah_rencana_aksi') ?>">
		<div class="form-group">
			<label>Nama Pesanan</label>
			<select name="id_pesanan" id="id_pesanan" class="form-control">
				<?php 
				$no = 1;
				foreach ($dt_pesanan_diterima as $ps) : ?>
				<option value="<?php echo $ps->id_pesanan ?>"><?php echo $ps->id_pesanan.'. '.$ps->produk ?></option>
				<?php endforeach; ?>
			</select>
			<!-- <input type="text" name="tgl_pesan" placeholder="Masukkan Nama Pesanan" class="form-control"> -->
			<?php echo form_error('id_pesanan','<div class="text-danger small" ml-3>') ?>
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
			<input type="text" name="keterlambatan" placeholder="Masukkan keterlambatan" class="form-control">
			<?php echo form_error('keterlambatan','<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan
		</button>
	</form>
</div>