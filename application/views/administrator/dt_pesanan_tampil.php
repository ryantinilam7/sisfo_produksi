<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Pesanan
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO</th>
			<th>Tanggal Pesan</th>
			<th>Tanggal Kirim</th>
			<th>Nama Perusahaan</th>
			<th>Nama Produk</th>
			<th>Keterangan</th>
			<th>No. PO</th>
		</tr>

		<?php
		$no = 1;
		foreach ($dt_pesanan as $ps) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $ps->tgl_pesan ?></td>
				<td><?php echo $ps->tgl_kirim ?></td>
				<td><?php echo $ps->nama_perusahaan ?></td>
				<td><?php echo $ps->produk ?></td>
				<td><?php echo $ps->keterangan ?></td>
				<td><?php echo $ps->no_po ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>