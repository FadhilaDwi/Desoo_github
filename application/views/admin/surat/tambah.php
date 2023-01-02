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
echo form_open_multipart(base_url('admin/surat/tambah'),' class="form_horizontal"');
?>
<div class="form-group row">
   <label class="col-md-2 col-form-label">Nama Surat</label>
   <div class="col-md-8">
    <input type="text" name="nama_surat" class="form-control" placeholder="Nama Surat" value="<?php echo set_value('nama_surat') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kode Surat</label>
   <div class="col-md-8">
    <input type="text" name="kode_surat" class="form-control" placeholder="Kode Surat" value="<?php echo set_value('kode_surat') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kode Lokasi</label>
   <div class="col-md-8">
    <input type="text" name="kode_lokasi" class="form-control" placeholder="Kode Lokasi" value="<?php echo set_value('kode_lokasi') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Keterangan Surat</label>
   <div class="col-md-8">
    <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo set_value('keterangan') ?></textarea>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Status Surat</label>
   <div class="col-md-8">
    <select name="status_surat" class="form-control">
      <option value="Tampilkan">Tampilkan</option>
      <option value="Arsipkan">Arsipkan</option>
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