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
				<h5>Berikut adalah dokumen anda</h5><br>

				<table class="table table-bordered" id="example1">
					<thead>
						<tr>
							<th>NO</th>
							<th>BERKAS</th>
							<th>JENIS</th>
							<th>WAKTU UPLOAD</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>
								<img src="<?php echo base_url('assets/upload/image/scan_ktp/'.$penduduk->scan_ktp) ?>" class="img img-responsive img thumbnail" width="144">
							</td>
							<td>Scan KTP</td>
							<td><?php echo $penduduk->waktu_update ?></td>
						</tr>
						<?php $no=2; foreach ($berkas as $berkas) { ?>
						<tr>
							<td><?php echo $no ?></td>
							<td>
								<img src="<?php echo base_url('assets/upload/image/berkas/'.$berkas->berkas) ?>" class="img img-responsive img thumbnail" width="144">
							</td>
							<td><?php echo $berkas->jenis_berkas ?></td>
							<td><?php echo $berkas->waktu_update ?></td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
