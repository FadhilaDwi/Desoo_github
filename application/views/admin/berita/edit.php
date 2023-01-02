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
echo form_open_multipart(base_url('admin/berita/edit/' .$berita->id_berita),' class="form_horizontal"');
?>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Judul Berita</label>
   <div class="col-md-8">
    <input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul_berita ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kategori Berita</label>
   <div class="col-md-8">
    <input type="text" name="kategori_berita" class="form-control" placeholder="Kategori Berita" value="<?php echo $berita->kategori_berita ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Isi Berita</label>
   <div class="col-md-8">
    <textarea name="isi_berita" class="form-control" placeholder="Isi Berita" id="editor"><?php echo $berita->isi_berita ?></textarea>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Gambar Berita</label>
   <div class="col-md-8">
    <input type="file" name="gambar_berita" class="form-control" placeholder="Gambar Berita" value="<?php echo $berita->gambar_berita ?>">
    Logo lama: <br> <img src="<?php echo base_url('assets/upload/image/gambar_berita/'.$berita->gambar_berita) ?>" class="img img-responsive img-thumbnail" width="200">
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Status berita</label>
   <div class="col-md-8">
    <select name="status_berita" class="form-control">
      <option value="Tampilkan">Tampilkan</option>
      <option value="Arsipkan" <?php if($berita->status_berita=="Draft") {echo "selected";} ?>>Arsipkan</option>
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