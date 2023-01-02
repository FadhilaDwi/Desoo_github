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
echo form_open_multipart(base_url('admin/pemdes/tambah'),' class="form_horizontal"');
?>
<div class="form-group row">
   <label class="col-md-2 col-form-label">Nama Pemdes</label>
   <div class="col-md-8">
    <input type="text" name="nama_pemdes" class="form-control" placeholder="Nama Pemdes" value="<?php echo set_value('nama_pemdes') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Isi Pemdes</label>
   <div class="col-md-8">
    <textarea name="isi_pemdes" class="form-control" placeholder="Isi Pemdes" id="editor"><?php echo set_value('isi_pemdes') ?></textarea>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Gambar Pemdes</label>
   <div class="col-md-8">
    <input type="file" name="gambar_pemdes" class="form-control" placeholder="Gambar Pemdes" value="<?php echo set_value('gambar_pemdes') ?>" required >
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