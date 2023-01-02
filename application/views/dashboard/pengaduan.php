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
				<button type="button" name="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Buat Pengaduan
				</button>
				<div >
					<br>
				</div>
				<?php
				//notifikasi
				if($this->session->flashdata('sukses')){
					echo '<p class="alert alert-success flash">';
					echo $this->session->flashdata('sukses');
					// echo '</div>';
				}elseif($this->session->flashdata('gagal')){
					echo '<p class="alert alert-danger flash">';
					echo $this->session->flashdata('gagal');
				}
				?>
				<?php if ($pengaduan): ?>
					<!-- jika ada transaksi tampilkan tabel -->
					<br>
					<table id="example1" class="table text-center table-bordered" >
						<thead>
							<tr class="text-center bg bg-success ">
								<th class="text-center">No</th>
								<th class="text-center">Tanggal</th>
								<th class="text-center">Pesan</th>
								<th class="text-center">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($pengaduan as $value): ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td>
										<div class="row">
											<div class="col text-left">
												<?php echo date('d-m-Y',strtotime($value->tanggal_pengaduan)) ?>
											</div>
											<div class="col text-right">
												<?php echo date('H:i:s',strtotime($value->tanggal_pengaduan)) ?>
											</div>
										</div>
									</td>
									<td><?php echo $value->isi_pengaduan; ?></td>
									<td>
										<?php if ( $value->status_pengaduan ): ?>
											<button type="button" name="button" class="btn btn-sm
											<?php if ($value->status_pengaduan == '1'): ?>
												<?php $pesan = 'Dalam Antrian' ?>
												btn-warning
											<?php endif; ?>

											<?php if ($value->status_pengaduan == '2'): ?>
												<?php $pesan = 'Proses' ?>
												btn-info
											<?php endif; ?>

											<?php if ($value->status_pengaduan == '3'): ?>
												<?php $pesan = 'Aduan Selesai ditinjau' ?>
												btn-success
											<?php endif; ?>">
											<?php echo $pesan ?>
										</button>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php else: ?>
				<div >
					<br>
				</div>
				<p class="alert alert-success">
					<i class="fa fa-warning">
					</i> Belum ada data pengajuan
				</p>
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Buat Pengaduan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo form_open_multipart(base_url('Pengaduan')); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleFormControlFile1">Bukti</label>
					<input class="form-control-file" id="exampleFormControlFile1" type="file" name="gambar_bukti_pengaduan" required>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Deskripsi</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" required></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
</section>
