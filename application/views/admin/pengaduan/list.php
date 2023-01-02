
<?php
//notifikasi
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	// echo '</div>';
}elseif ($this->session->flashdata('gagal')) {
	echo '<p class="alert alert-danger">';
	echo $this->session->flashdata('gagal');
}
?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr class="bg badge-success text-center">
			<th>NO</th>
			<th>NAMA PENDUDUK</th>
			<th>TANGGAL</th>
			<th>ADUAN</th>
			<th>STATUS</th>
			<th>OPSI</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($pengaduan as $value): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td>
					<div class="row">
						<div class="col text-left">
							<?php echo $value->nama_penduduk ?>
						</div>
						<div class="col text-right">
							<a href="<?php echo base_url('assets/upload/image/gambar_bukti_pengaduan/'.$value->bukti); ?>" class="btn btn-sm btn-info" name="button" data-toggle="tooltip" data-placement="top" title="Lihat Bukti"><i class="fa fa-image"></i></i></a>
						</div>
					</div>
					</td>
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
				<?php if ($value->status_pengaduan == '1'): ?>
					Dalam Antrian
				<?php endif; ?>
				<?php if ($value->status_pengaduan == '2'): ?>
					Permintaan diproses
				<?php endif; ?>
				<?php if ($value->status_pengaduan == '3'): ?>
					Selesai Ditinjau
				<?php endif; ?>
			</td>
				<td>
					<?php if ($value->status_pengaduan == '1'): ?>
						<a href="<?php echo base_url('admin/Pengaduan/update_status_pengaduan/'.$value->idpengaduan.'/2'); ?>" class="btn btn-sm btn-warning" name="button" data-toggle="tooltip" data-placement="top" title="Tekan Untuk Proses"><i class="fa fa-check"></i></a>
					<?php endif; ?>
					<?php if ($value->status_pengaduan == '2'): ?>
						<a href="<?php echo base_url('admin/Pengaduan/update_status_pengaduan/'.$value->idpengaduan.'/3'); ?>" class="btn btn-sm btn-info" name="button" data-toggle="tooltip" data-placement="top" title="Tekan Untuk Selesai"><i class="fa fa-check"></i></a>
					<?php endif; ?>
					<?php if ($value->status_pengaduan == '3'): ?>
						Selesai
				<?php endif; ?>
				</td>
		</tr>
	<?php endforeach; ?>
</tbody>
</table>
