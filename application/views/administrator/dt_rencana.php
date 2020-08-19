<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Rencana Produksi
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php echo anchor('administrator/dt_rencana/tambah_rencana','<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus fa-sm"></i> Tambah Rencana Produksi</button>') ?>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO</th>
			<th>Id Pesanan</th>
			<th>Waktu</th>
			<th>Aliran Waktu</th>
			<th>Due Date</th>
			<th>Keterlambatan</th>
			<th colspan="2">AKSI</th>
		</tr>

		<?php
		$no=1;
		foreach ($dt_rencana as $rc): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $ps->id_pesanan ?></td>
				<td><?php echo $ps->waktu ?></td>
				<td><?php echo $ps->aliran_waktu ?></td>
				<td><?php echo $ps->due_date ?></td>
				<td><?php echo $ps->keterlambatan ?></td>
				<td width="20px"><?php echo anchor('administrator/dt_rencana/update/' . $rc->id_rencana, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')  ?></td>
				<td width="20px"><?php echo anchor('administrator/dt_rencana/delete/' . $rc->id_rencana, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')  ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>