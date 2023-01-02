<p>
	<a href="<?php echo base_url('admin/penduduk/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
	<a href="<?php echo base_url('admin/penduduk/export') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-file-export"></i> Export Excel
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
			<th>ACTION</th>
			<th>NAMA</th>
			<th>NIK</th>
			<th>TEMPAT TGL LAHIR</th>
			<th>JENIS KELAMIN</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($penduduk as $penduduk) { ?>
		<tr>
			<td>
	      <div class="btn-group">
	        <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
	          <span class="sr-only">Toggle Dropdown</span>*
	        </button>
	        <div class="dropdown-menu" role="menu">
	        	<a class="dropdown-item bg-warning" href="<?php echo base_url('admin/penduduk/berkas/'.$penduduk->id_penduduk) ?>">Upload Berkas</a>
	          <a class="dropdown-item bg-info" href="<?php echo base_url('admin/penduduk/edit/'.$penduduk->id_penduduk) ?>">Edit Data</a>
	          <a class="dropdown-item bg-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/penduduk/delete/'.$penduduk->id_penduduk) ?>">Delete Data</a>
	        </div>
	      </div>
      </td>
			<td><?php echo $penduduk->nama_penduduk ?></td>
			<td><?php echo $penduduk->nik ?></td>
			<td><?php echo $penduduk->tempat_lahir ?>, <?php echo $penduduk->tanggal_lahir ?></td>
			<td><?php echo $penduduk->jenis_kelamin ?></td>
		</tr>
		<?php 
	      }
	   	?>
	</tbody>
</table>