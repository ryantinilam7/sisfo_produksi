<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Hasil Tampil
	</div>

	<?php echo $this->session->flashdata('pesan') ?>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO</th>
			<th>Id Pesanan</th>
			<th>No SPK</th>
			<th>Tanggal Selesai</th>
			<th>Reject</th>
		</tr>

		<?php
		$no=1;
		foreach ($dt_hasil as $hs): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $hs->id_pesanan ?></td>
				<td><?php echo $hs->no_spk ?></td>
				<td><?php echo $hs->tgl_selesai ?></td>
				<td><?php echo $hs->reject ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>