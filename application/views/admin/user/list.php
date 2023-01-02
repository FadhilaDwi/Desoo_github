<p>
	<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>NIK</th>
			<th>JABATAN</th>
			<th>LEVEL</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($user as $user) { ?>
		<tr>
			<td>
            <div class="btn-group">
              <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span><?php echo $no ?>
              </button>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item bg-info" href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>">Edit Data</a>
                <a class="dropdown-item bg-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>">Delete Data</a>
              </div>
            </div>
            </td>
			<td><?php echo $user->nama ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->jabatan ?></td>
			<td><?php echo $user->akses_level ?></td>
		</tr>
		<?php
	      $no++; 
	      }
	   	?>
	</tbody>
</table>