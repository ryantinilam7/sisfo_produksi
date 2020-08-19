<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Penjadwalan
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php echo anchor('administrator/dt_jadwal/tambah_jadwal','<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus fa-sm"></i> Tambah Jadwal</button>') ?>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO SPK</th>
			<th>Tanggal SPK</th>
			<th>Tanggal Kirim</th>
			<th>Nama Perusahaan</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th colspan="2">AKSI</th>
		</tr>

		<?php
		$no=1;
		foreach ($dt_jadwal as $jd): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $jd->tgl_spk ?></td>
				<td><?php echo $jd->tgl_kirim ?></td>
				<td><?php echo $jd->id_pesanan ?></td>
				<td><?php echo $jd->jumlah ?></td>
				<td width="20px"><?php echo anchor('administrator/dt_pesanan/update/' . $jd->id_pesanan, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')  ?></td>
				<td width="20px"><?php echo anchor('administrator/dt_pesanan/delete/' . $jd->id_pesanan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')  ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>