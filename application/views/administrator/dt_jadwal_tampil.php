<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Penjadwalan
	</div>

	<?php echo $this->session->flashdata('pesan') ?>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO SPK</th>
			<th>Tanggal SPK</th>
			<th>Tanggal Kirim</th>
			<th>Id Pesanan</th>
			<th>Jumlah</th>
		</tr>

		<?php
		$no=1;
		foreach ($dt_jadwal as $jd): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $jd->tgl_spk ?></td>
				<td><?php echo $jd->tgl_kirim ?></td>
				<td><?php echo $jd->produk ?></td>
				<td><?php echo $jd->jumlah ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>