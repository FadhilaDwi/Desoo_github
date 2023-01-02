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
								<th>Nama Penduduk Yang Meninggal</th>
								<td><input type="text" name="var1" class="form-control" placeholder="Nama Penduduk Yang Meninggal" required>
									<p class="font-weight-light text-success">*Contoh : Suyatno</p>
								</td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td><select class="form-select" name="var2" aria-label="Default select example" placeholder="Jenis Kelamin" required>
									  <option value="Laki-laki">Laki-laki</option>
									  <option value="Perempuan">Perempuan</option>
									</select>
									<p class="font-weight-light text-success">*Contoh : Laki-laki</p>
								</td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><input type="text" name="var3" class="form-control" placeholder="Alamat" required>
									<p class="font-weight-light text-success">*Contoh : Dusun Manduro RT 15 RW 03 Desa Manduro Manggung Gajah Kecamatan Ngoro Kabupaten Mojokerto</p>
								</td>
							</tr>
							<tr>
								<th>Umur</th>
								<td><input type="text" name="var4" class="form-control" placeholder="Umur" required>
									<p class="font-weight-light text-success">*Contoh : 51 Tahun</p>
								</td>
							</tr>
							<tr>
								<th>Pukul</th>
								<td><input type="time" name="var5" class="form-control" placeholder="Pukul" required>
									<p class="font-weight-light text-success">*Contoh : 13:00</p>
								</td>
							</tr>
							<tr>
								<th>Tanggal</th>
								<td><input type="date" name="var6" class="form-control" placeholder="Tanggal" required>
									<p class="font-weight-light text-success">*Contoh : 18/11/2021</p>
								</td>
							</tr>
							<tr>
								<th>Tempat</th>
								<td><input type="text" name="var7" class="form-control" placeholder="Tempat" required>
									<p class="font-weight-light text-success">*Contoh : Rumah</p>
								</td>
							</tr>
							<tr>
								<th>Penyebab Meninggal</th>
								<td><input type="text" name="var8" class="form-control" placeholder="Penyebab Meninggal" required>
									<p class="font-weight-light text-success">*Contoh : Sakit</p>
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