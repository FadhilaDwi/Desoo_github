<p>
	<a href="<?php echo base_url('admin/surat/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<?php
//notifikasi
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	// echo '</div>';
}
?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr class="bg badge-success text-center">
			<th>NO</th>
			<th>NAMA</th>
			<th>KETERANGAN</th>
			<th>KODE SURAT</th>
			<th>KODE LOKASI</th>
			<th>STATUS</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($surat as $surat) { ?>
		<tr>
			<td>
            <div class="btn-group">
              <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>*
              </button>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item bg-info" href="<?php echo base_url('admin/surat/edit/'.$surat->slug_surat) ?>">Edit Data</a>
                <a class="dropdown-item bg-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/surat/delete/'.$surat->id_surat) ?>">Delete Data</a>
              </div>
            </div>
            </td>
			<td><?php echo $surat->nama_surat ?></td>
			<td><?php echo $surat->keterangan ?></td>
			<td><?php echo $surat->kode_surat ?></td>
			<td><?php echo $surat->kode_lokasi ?></td>
			<td><?php echo $surat->status_surat ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
