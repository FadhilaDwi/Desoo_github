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
				<h1><?php echo $title ?></h1><hr>
				<?php 
					//notifikasi
					if($this->session->flashdata('sukses')) {
						echo '<div class="alert alert-success">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					}

					//display error
					echo validation_errors('<div class="alert alert-warning">','</div>');

					//form open
					echo form_open(base_url('dashboard/profil'), 'class="leave-comment"'); 
					?>
					<table class="table">
						<tbody>
							<tr>
								<th>Nama</th>
								<td><input type="text" name="nama_penduduk" class="form-control" placeholder="Nama lengkap" value="<?php echo $penduduk->nama_penduduk ?>" readonly></td>
							</tr>
							<tr>
								<th>NIK</th>
								<td><input type="text" name="nik" class="form-control" placeholder="NIK" value="<?php echo $penduduk->nik ?>" readonly></td>
							</tr>
							<tr>
								<th>No KK</th>
								<td><input type="text" name="no_kk" class="form-control" placeholder="No KK" value="<?php echo $penduduk->no_kk ?>" readonly></td>
							</tr>
							<tr>
								<th>TTL</th>
								<td><input type="text" name="ttl" class="form-control" placeholder="Tempat, Tanggal Lahir" value="<?php echo $penduduk->tempat_lahir ?>, <?php echo $penduduk->tanggal_lahir ?>" readonly></td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td><input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" value="<?php echo $penduduk->jenis_kelamin ?>" readonly></td>
							</tr>
							<tr>
								<th>Agama</th>
								<td><input type="text" name="agama" class="form-control" placeholder="Agama" value="<?php echo $penduduk->agama ?>" readonly></td>
							</tr>
							<tr>
								<th>Status Perkawinan</th>
								<td><input type="text" name="status_perkawinan" class="form-control" placeholder="Status Perkawinan" value="<?php echo $penduduk->status_perkawinan ?>" readonly></td>
							</tr>
							<tr>
								<th>Pekerjaan</th>
								<td><input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?php echo $penduduk->pekerjaan ?>" readonly></td>
							</tr>
							<tr>
								<th>Kewarganegaraan</th>
								<td><input type="text" name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan" value="<?php echo $penduduk->kewarganegaraan ?>" readonly></td>
							</tr>
							<tr>
								<th>Pendidikan</th>
								<td><input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" value="<?php echo $penduduk->pendidikan ?>" readonly></td>
							</tr>
							<tr>
								<th>Penerima Bantuan</th>
								<td><input type="text" name="penerima_bantuan" class="form-control" placeholder="Penerima Bantuan" value="<?php echo $penduduk->penerima_bantuan ?>" readonly></td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><textarea name="alamat" class="form-control" placeholder="Alamat" readonly><?php echo $penduduk->alamat ?></textarea></td>
							</tr>
							<!-- <tr>
								<td></td>
								<td>
									<button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"></i> Update Profile</button>
									<button class="btn btn-default btn-lg" type="reset"><i class="fa fa-times"></i> Riset</button>
								</td>
							</tr> -->
						</tbody>
					</table>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>