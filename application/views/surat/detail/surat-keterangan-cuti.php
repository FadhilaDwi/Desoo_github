<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Surat -->
				<h1><?php echo $title ?></h1><br>
				<h5><?php echo $surat->keterangan ?></h5><br><br>
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
					echo form_open(base_url('surat/detail/'.$surat->slug_surat), 'class="leave-comment"'); 
					?>
					<h5 class="font-weight-bold mb-2"><?php echo $penduduk->nama_penduduk ?></h5>
					<h5>NIK : <?php echo $penduduk->nik ?></h5><br><br>
					<table class="table">
						<tbody>
							<tr>
								<th>No. HP Aktif</th>
								<td><input type="text" name="no_hp" class="form-control" placeholder="Nomor HP Aktif" required>
									<p class="font-weight-light text-success">*Contoh : 085123456789</p>
								</td>
							</tr>
							<tr>
								<th>Lama Cuti</th>
								<td><input type="text" name="var1" class="form-control" placeholder="Lama Cuti" required>
									<p class="font-weight-light text-success">*Contoh : 1 Hari</p>
								</td>
							</tr>
							<tr>
								<th>Tanggal</th>
								<td><input type="date" name="var2" class="form-control" placeholder="Tanggal" required>
									<p class="font-weight-light text-success">*Contoh : 18/11/2021</p>
								</td>
							</tr>
							<tr>
								<th>Penyebab Cuti</th>
								<td><input type="text" name="var3" class="form-control" placeholder="Penyebab Cuti" required>
									<p class="font-weight-light text-success">*Contoh : Kepentingan Keluarga</p>
								</td>
							</tr>
							<tr>
								<th>Tempat Bekerja</th>
								<td><input type="text" name="var4" class="form-control" placeholder="Kegunaan Surat" required>
									<p class="font-weight-light text-success">*Contoh : PT. KOBIN KERAMIK INDUSTRI </p>
								</td>
							</tr>
							<tr>
								<th>Alamat Tempat Bekerja</th>
								<td><input type="text" name="var5" class="form-control" placeholder="Alamat Tempat Bekerja" required>
									<p class="font-weight-light text-success">*Contoh : Ngoro Industri Persada Blok O No 5, 6, 7</p>
								</td>
							</tr>
						</tbody>
					</table>
					<p class="font-weight-bold font-italic text-danger">&emsp;Perhatian, apakah data telah diisi dengan benar?</p><br>
					<button class="btn btn-success btn-lg" type="submit"><i class="fa fa-send"></i> Ajukan Surat</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>