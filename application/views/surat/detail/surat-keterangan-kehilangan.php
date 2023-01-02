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
								<th>Nama Barang</th>
								<td><input type="text" name="var1" class="form-control" placeholder="Nama Barang" required>
									<p class="font-weight-light text-success">*Contoh : Dompet berisi KTP atas nama Syaipul</p>
								</td>
							</tr>
							<tr>
								<th>Perkiraan Tempat Kehilangan</th>
								<td><input type="text" name="var2" class="form-control" placeholder="Perkiraan Tempat Kehilangan" required>
									<p class="font-weight-light text-success">*Contoh : Rumah</p>
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