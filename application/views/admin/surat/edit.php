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
echo form_open_multipart(base_url('admin/surat/edit/' .$surat->slug_surat),' class="form_horizontal"');
?>
<div class="form-group row">
   <label class="col-md-2 col-form-label">Nama surat</label>
   <div class="col-md-8">
    <input type="text" name="nama_surat" class="form-control" placeholder="Nama surat" value="<?php echo $surat->nama_surat ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kode surat</label>
   <div class="col-md-8">
    <input type="text" name="kode_surat" class="form-control" placeholder="Kode surat" value="<?php echo $surat->kode_surat ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kode lokasi</label>
   <div class="col-md-8">
    <input type="text" name="kode_lokasi" class="form-control" placeholder="Kode lokasi" value="<?php echo $surat->kode_lokasi ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Keterangan surat</label>
   <div class="col-md-8">
    <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $surat->keterangan ?></textarea>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Status surat</label>
   <div class="col-md-8">
    <select name="status_surat" class="form-control">
      <option value="Tampilkan">Tampilkan</option>
      <option value="Arsipkan" <?php if($surat->status_surat=="Draft") {echo "selected";} ?>>Arsipkan</option>
    </select>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label"></label>
   <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
    	<i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset">
    	<i class="fa fa-time"></i> Reset
    </button>
  </div>
</div>
<?php echo form_close(); ?>