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
echo form_open_multipart(base_url('admin/pengajuan/nomor_surat'),' class="form_horizontal"');
?>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Nomor Urut Surat</label>
   <div class="col-md-8">
    <input type="text" name="nomor" class="form-control" placeholder="Nomor" value="<?php echo $nomor_surat->nomor ?>" required decimal>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label"></label>
   <div class="col-md-5">
    <button class="btn btn-success btn" name="submit" type="submit">
    	<i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-info btn" name="reset" type="reset">
    	<i class="fa fa-time"></i> Reset
    </button>
  </div>
</div>
<?php echo form_close(); ?>