<p>
	<a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-success btn-lg">
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
    <table class="table table-bordered" id="example1">
		<thead>
			<tr class="bg badge-success text-center">
				<th>NO</th>
				<th>JUDUL</th>
				<th>KATEGORI</th>
				<th>GAMBAR</th>
				<th>STATUS</th>
				<th>WAKTU</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($berita as $berita) { ?>
			<tr>
				<td>
          <div class="btn-group">
            <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span class="sr-only">Toggle Dropdown</span><?php echo $no ?>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item bg-info" href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>">Edit Data</a>
              <a class="dropdown-item bg-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/berita/delete/'.$berita->id_berita) ?>">Delete Data</a>
            </div>
          </div>
        </td>
				<td><?php echo $berita->judul_berita ?></td>
				<td><?php echo $berita->kategori_berita ?></td>
				<td>
					<img src="<?php echo base_url('assets/upload/image/gambar_berita/'.$berita->gambar_berita) ?>" class="img img-responsive img thumbnail" width="60">
				</td>
				<td><?php echo $berita->status_berita ?></td>
				<td><?php echo $berita->waktu_post ?></td>
			</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
  </div>
</div>