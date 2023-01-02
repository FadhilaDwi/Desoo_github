<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<?php include('menu.php') ?>
				</div>
			</div>

			<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
				<!-- Product -->
				<h1><?php echo $title ?></h1><br>
				<h5>Berikut adalah riwayat pengajuan anda</h5><br>

				<?php
				//jika ada transaksi tampilkan tabel
				if($pengajuan) { ?>

					<table id="example1" class="text text-center table table-bordered">
						<thead>
							<tr class="text-center bg bg-success ">
								<th class="text-center">No</th>
								<th class="text-center">Surat</th>
								<th class="text-center">Tanggal</th>
								<th class="text-center">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($pengajuan as $pengajuan) { ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $pengajuan->surat ?></td>
								<td><?php echo date('d-m-Y',strtotime($pengajuan->waktu_update)) ?></td>
								<td><?php echo $pengajuan->status ?></td>
							</tr>
							<?php $i++; } ?>
						</tbody>
					</table>

				<?php } else { ?>
					<p class="alert alert-success">
						<i class="fa fa-warning"></i> Belum ada data pengajuan
					</p>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
