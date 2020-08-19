<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Rencana Produksi
	</div>

	<?php echo $this->session->flashdata('pesan') ?>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO</th>
			<th>Id Pesanan</th>
			<th>Waktu</th>
			<th>Waktu</th>
			<th>Aliran Waktu</th>
			<th>Due Date</th>
			<th>Keterlambatan</th>
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
			</tr>
		<?php endforeach; ?>
	</table>
</div>