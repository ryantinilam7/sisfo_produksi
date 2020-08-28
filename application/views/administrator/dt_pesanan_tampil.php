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
			<th>Status</th>
			<?php if ($this->session->userdata('level')=="Manajer Produksi") {
				echo "<th>Aksi</th>";
			}?>
			
		</tr>

		<?php
		$no = 1;
		foreach ($dt_pesanan as $ps) :
			if ($ps->status_verivikasi=='1') {
				$button = "tolak";
				$icon = "btn-danger";
				$status = "Diterima";
			} else {
				$button = "Terima";
				$icon = "btn-success";
				$status = "Ditolak";
			}
		?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $ps->tgl_pesan ?></td>
				<td><?php echo $ps->tgl_kirim ?></td>
				<td><?php echo $ps->nama_perusahaan ?></td>
				<td><?php echo $ps->produk ?></td>
				<td><?php echo $ps->keterangan ?></td>
				<td><?php echo $ps->no_po ?></td>
				<td><?php echo ($ps->status_verivikasi=='1') ? "Diterima" : "Ditolak" ; ?></td>
				<?php if ($this->session->userdata('level')=="Manajer Produksi") {?>
					<td><?php echo anchor('administrator/dt_pesanan/update_status_pesanan/' . $ps->id_pesanan.'/' . $ps->status_verivikasi, '<div class="btn '.$icon.' btn-sm">'.$button.'</div>')  ?></td>
				<?php }?>
			</tr>
		<?php endforeach; ?>
	</table>
</div>