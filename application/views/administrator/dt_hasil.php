<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Hasil Produksi
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php echo anchor('administrator/dt_hasil/tambah_hasil','<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus fa-sm"></i> Tambah hasil</button>') ?>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Tanggal Selesai</th>
			<th>Reject</th>
			<th colspan="2">AKSI</th>
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
				<td width="20px"><?php echo anchor('administrator/dt_hasil/update/' . $hs->id_hasil, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')  ?></td>
				<td width="20px"><?php echo anchor('administrator/dt_hasil/delete/' . $hs->id_hasil, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')  ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>