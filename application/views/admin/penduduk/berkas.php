<?php 
//error upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open_multipart(base_url('admin/penduduk/berkas/'.$penduduk->id_penduduk),' class="form_horizontal"');
?>
<div class="form-group row">
   <label class="col-md-2 col-form-label">Jenis Berkas</label>
   <div class="col-md-8">
    <select name="jenis_berkas" class="form-control">
    	<option value="Scan KK">Scan KK</option>
    	<option value="Surat Pengantar">Surat Pengantar</option>
    </select>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Unggah Berkas</label>
   <div class="col-md-4">
    <input type="file" name="berkas" class="form-control" placeholder="Berkas Penduduk" value="<?php echo set_value('berkas') ?>" required >
  </div>
  <div class="col-md-4">
  	<button class="btn btn-success btn-md" name="submit" type="submit">
    	<i class="fa fa-save"></i> Simpan & Unggah Berkas
    </button>
    <button class="btn btn-info btn-md" name="reset" type="reset">
    	<i class="fa fa-time"></i> Reset
    </button>
  </div>
</div>

<?php echo form_close(); ?>

<?php 
//notifikasi
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>NO</th>
			<th>BERKAS</th>
			<th>JENIS</th>
			<th>WAKTU UPLOAD</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/scan_ktp/'.$penduduk->scan_ktp) ?>" class="img img-responsive img thumbnail" width="60">
			</td>
			<td>Scan KTP</td>
			<td><?php echo $penduduk->waktu_update ?></td>
			<td></td>
		</tr>
		<?php $no=2; foreach ($berkas as $berkas) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/berkas/'.$berkas->berkas) ?>" class="img img-responsive img thumbnail" width="60">
			</td>
			<td><?php echo $berkas->jenis_berkas ?></td>
			<td><?php echo $berkas->waktu_update ?></td>
			<td>
				<a href="<?php echo base_url('admin/penduduk/delete_berkas/'.$penduduk->id_penduduk.'/'.$berkas->id_berkas) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus berkas ini?')">
					<i class="fa fa-trash"></i> Hapus
				</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>