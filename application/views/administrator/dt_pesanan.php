<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Pesanan
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php echo anchor('administrator/dt_pesanan/tambah_pesanan', '<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus fa-sm"></i> Tambah Pesanan</button>') ?>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO</th>
			<th>Tanggal Pesan</th>
			<th>Tanggal Kirim</th>
			<th>Nama Perusahaan</th>
			<th>Nama Produk</th>
			<th>Keterangan</th>
			<th>Jumlah</th>
			<th>No. PO</th>
			<th colspan="2">AKSI</th>
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
				<td><?php echo $ps->jumlah ?></td>
				<td><?php echo $ps->no_po ?></td>
				<td width="20px"><?php echo anchor('administrator/dt_pesanan/update/' . $ps->id_pesanan, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')  ?></td>
				<td width="20px"><?php echo anchor('administrator/dt_pesanan/delete/' . $ps->id_pesanan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')  ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>