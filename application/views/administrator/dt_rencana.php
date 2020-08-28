<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Rencana Produksi
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php echo anchor('administrator/dt_rencana/tambah_rencana','<button class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus fa-sm"></i> Tambah Rencana Produksi</button>') ?>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Waktu</th>
			<th>Aliran Waktu</th>
			<th>Due Date</th>
			<th>Keterlambatan</th>
			<th colspan="2">AKSI</th>
		</tr>

		<?php
		$no=1;
		$a_waktu = 0;
		foreach ($dt_rencana as $rc): 
		$a_waktu = $a_waktu+$rc->waktu;
		$date1=date_create($rc->tgl_kirim);
		$date2=date_create($rc->tgl_pesan);
		$due_date=date_diff($date1,$date2)->format("%d");
		$keterlambatan = $a_waktu - $due_date;
		if ($keterlambatan<0) {
			$t_keterlambatan = 0;
		} else {
			$t_keterlambatan = $keterlambatan;
		}
		?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $rc->produk ?></td>
				<td><?php echo $rc->waktu ?></td>
				<td><?php echo $a_waktu ?></td>
				<td><?php echo $rc->due_date?></td>
				<td><?php echo $t_keterlambatan?></td>
				<td width="20px"><?php echo anchor('administrator/dt_rencana/update/' . $rc->id_rencana, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')  ?></td>
				<td width="20px"><?php echo anchor('administrator/dt_rencana/delete/' . $rc->id_rencana, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')  ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</div>