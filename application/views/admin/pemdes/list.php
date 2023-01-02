<p>
	<a href="<?php echo base_url('admin/pemdes/tambah') ?>" class="btn btn-success btn-lg">
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

<div class="row">
  <div class="col-12">
    <table class="table table-bordered text-center" id="example1">
		<thead>
			<tr class="bg badge-success text-center">
				<th>NO</th>
				<th>NAMA PEMDES</th>
				<th>GAMBAR</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($pemdes as $pemdes) { ?>
			<tr>
				<td>
          <div class="btn-group">
            <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span class="sr-only">Toggle Dropdown</span><?php echo $no ?>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item bg-info" href="<?php echo base_url('admin/pemdes/edit/'.$pemdes->id_pemdes) ?>">Edit Data</a>
              <a class="dropdown-item bg-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/pemdes/delete/'.$pemdes->id_pemdes) ?>">Delete Data</a>
            </div>
          </div>
        </td>
				<td><?php echo $pemdes->nama_pemdes ?></td>
				<td>
					<img src="<?php echo base_url('assets/upload/image/gambar_pemdes/'.$pemdes->gambar_pemdes) ?>" class="img img-responsive img thumbnail" width="60">
				</td>
			</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
  </div>
</div>