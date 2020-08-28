<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Data Rencana Produksi
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<div class="row">
		<div class="col-6">
			<h2>TABEL SPT</h2>
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<th>NO</th>
					<th>Nama Produk</th>
					<th>Waktu</th>
					<th>Aliran Waktu</th>
					<th>Due Date</th>
					<th>Keterlambatan</th>
				</tr>

				<?php
				$no=1;
				$a_waktu = 0;
				$jml_a_waktu = 0;
				$jml_keterlambatan = 0;
				foreach ($dt_rencana_spt as $rc): 
					$a_waktu = $a_waktu+$rc->waktu;
					$jml_a_waktu += $a_waktu;
					$date1=date_create($rc->tgl_kirim);
					$date2=date_create($rc->tgl_pesan);
					$due_date=date_diff($date1,$date2)->format("%d");
					$keterlambatan = $a_waktu - $due_date;
					if ($keterlambatan<0) {
						$t_keterlambatan = 0;
					} else {
						$t_keterlambatan = $keterlambatan;
					}
					$jml_keterlambatan += $t_keterlambatan;
				?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $rc->produk ?></td>
						<td><?php echo $rc->waktu ?></td>
						<td><?php echo $a_waktu ?></td>
						<td><?php echo $rc->due_date?></td>
						<td><?php echo $t_keterlambatan?></td>
					</tr>
				<?php endforeach; ?>
				<tr class="text-center">
					<th colspan="2">Jumlah </th>
					<th><?php echo $a_waktu ?></th>
					<th><?php echo $jml_a_waktu ?></th>
					<th colspan="2"><?php echo $jml_keterlambatan ?></th>
				</tr>
			</table>
			<h2>Hasil Perhitungan SPT</h2>
			<?php
				$waktu=$jml_a_waktu/count($dt_rencana_spt);
				$utilitas=round($a_waktu/$jml_a_waktu * 100,2).' %';
				$jml_pekerjaan=round($jml_a_waktu/$a_waktu,2);
				$keterlambatan_pekerjaan=round($jml_keterlambatan/count($dt_rencana_spt),1) .' hari';

			?>
			<table class="table table-bordered table-hover">
				<tr>
					<th>Waktu Penyelesaian Rata - Rata</th>
					<td><?php echo $waktu ?></td>
				</tr>
				<tr>
					<th>Utilitasi</th>
					<td><?php echo $utilitas ?></td>
				</tr>
				<tr>
					<th>Jumlah Pekerjaan Rata Rata</th>
					<td><?php echo $jml_pekerjaan ?></td>
				</tr>
				<tr>
					<th>Keterlambatan Pekerjaan Rata Rata</th>
					<td><?php echo $keterlambatan_pekerjaan ?></td>
				</tr>
			</table>
			<?php echo anchor('administrator/dt_jadwal/index/spt','<button class="btn btn-sm btn-primary mb-3">Pilih Jadwal dengan Urutan SPT</button>') ?>
		</div>
		<div class="col-6">
		<h2>TABEL EDD</h2>
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<th>NO</th>
					<th>Nama Produk</th>
					<th>Waktu</th>
					<th>Aliran Waktu</th>
					<th>Due Date</th>
					<th>Keterlambatan</th>
				</tr>

				<?php
				$no=1;
				$a_waktu = 0;
				$jml_a_waktu = 0;
				$jml_keterlambatan = 0;
				foreach ($dt_rencana_edd as $rc): 
				$a_waktu = $a_waktu+$rc->waktu;
				$jml_a_waktu += $a_waktu;
				$date1=date_create($rc->tgl_kirim);
				$date2=date_create($rc->tgl_pesan);
				$due_date=date_diff($date1,$date2)->format("%d");
				$keterlambatan = $a_waktu - $due_date;
				if ($keterlambatan<0) {
					$t_keterlambatan = 0;
				} else {
					$t_keterlambatan = $keterlambatan;
				}
				$jml_keterlambatan += $t_keterlambatan;
				?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $rc->produk ?></td>
						<td><?php echo $rc->waktu ?></td>
						<td><?php echo $a_waktu ?></td>
						<td><?php echo $rc->due_date?></td>
						<td><?php echo $t_keterlambatan?></td>
					</tr>
				<?php endforeach; ?>
				<tr class="text-center">
					<th colspan="2">Jumlah </th>
					<th><?php echo $a_waktu ?></th>
					<th><?php echo $jml_a_waktu ?></th>
					<th colspan="2"><?php echo $jml_keterlambatan ?></th>
				</tr>
			</table>
			<h2>Hasil Perhitungan EDD</h2>
			<?php
				$waktu=$jml_a_waktu/count($dt_rencana_spt);				
				$utilitas=round($a_waktu/$jml_a_waktu * 100,2).' %';
				$jml_pekerjaan=round($jml_a_waktu/$a_waktu,2);
				$keterlambatan_pekerjaan=round($jml_keterlambatan/count($dt_rencana_spt),1) .' hari';

			?>
			<table class="table table-bordered table-hover">
				<tr>
					<th>Waktu Penyelesaian Rata - Rata</th>
					<td><?php echo $waktu ?></td>
				</tr>
				<tr>
					<th>Utilitasi</th>
					<td><?php echo $utilitas ?></td>
				</tr>
				<tr>
					<th>Jumlah Pekerjaan Rata Rata</th>
					<td><?php echo $jml_pekerjaan ?></td>
				</tr>
				<tr>
					<th>Keterlambatan Pekerjaan Rata Rata</th>
					<td><?php echo $keterlambatan_pekerjaan ?></td>
				</tr>
			</table>
			<?php echo anchor('administrator/dt_jadwal/index/edd','<button class="btn btn-sm btn-primary mb-3">Pilih Jadwal dengan Urutan EDD</button>') ?>
		</div>
	</div>

</div>