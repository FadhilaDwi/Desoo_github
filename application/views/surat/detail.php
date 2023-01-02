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
					<table class="table">
						<tbody>
							<tr>
								<th>Nama</th>
								<td><input type="text" name="nama_penduduk" class="form-control" placeholder="Nama lengkap" value="<?php echo $penduduk->nama_penduduk ?>"></td>
							</tr>
							<tr>
								<th>NIK</th>
								<td><input type="text" name="nik" class="form-control" placeholder="NIK" value="<?php echo $penduduk->nik ?>"></td>
							</tr>
							<tr>
								<th>No. HP Aktif</th>
								<td><input type="text" name="no_hp" class="form-control" placeholder="Nomor HP Aktif" value="<?php echo $penduduk->no_hp ?>"></td>
							</tr>
							<tr>
								<th>Scan KTP</th>
								<td><img src="<?php echo base_url('assets/upload/image/scan_ktp/'.$penduduk->scan_ktp) ?>" class="img img-responsive img thumbnail" width="360">
								</td>
							</tr>
							<?php foreach ($berkas as $berkas) {?>
							<tr>
								<th><?php echo $berkas->jenis_berkas ?></th>
								<td><img src="<?php echo base_url('assets/upload/image/berkas/'.$berkas->berkas) ?>" class="img img-responsive img thumbnail" width="360">
								</td>
							</tr>
							<?php } ?>							
							<tr>
								<th></th>
								<td>
									<button class="btn btn-success btn-lg" type="submit"><i class="fa fa-send"></i> Ajukan Surat</button>
								</td>
							</tr>
						</tbody>
					</table>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>