<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Penjadwalan
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php if ($dt_jadwal == null) {
		echo "Silahkan pilih jadwal berdasarkan SPT atau EDD pada link ini <br> ";  
		echo anchor('administrator/dt_hasil/dt_hasil_tampil_mproduksi','<button class="btn btn-sm btn-primary mb-3"> Hasil Perencanaan</button>');
	} else { ?>
	<a href="<?php echo base_url('administrator/dt_jadwal/print/'.$id)?>" target="_blank" ><button class="btn btn-sm btn-primary mb-3"><i class="fa fa-file fa-sm"></i> cetak pdf</button></a>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>NO SPK</th>
			<th>Tanggal SPK</th>
			<th>Tanggal Kirim</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
		</tr>

		<?php
		$no=1;
		foreach ($dt_jadwal as $jd): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo date('Y-m-d')?></td>
				<td><?php echo $jd->tgl_kirim ?></td>
				<td><?php echo $jd->produk ?></td>
				<td><?php echo $jd->jumlah ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
		<?php } ?>
</div>