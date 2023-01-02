<?php 
//notifikasi
if($this->session->flashdata('sukses')){
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  // echo '</div>';
}
?>

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
echo form_open_multipart(base_url('admin/konfigurasi'),' class="form_horizontal"');
?>
<div class="form-group row">
   <label class="col-md-2 col-form-label">Nama Desa</label>
   <div class="col-md-8">
    <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Tagline</label>
   <div class="col-md-8">
    <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Email</label>
   <div class="col-md-8">
    <input type="emial" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Website</label>
   <div class="col-md-8">
    <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $konfigurasi->website ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Nama Kepala Desa</label>
   <div class="col-md-8">
    <input type="text" name="nama_kades" class="form-control" placeholder="Nama Kepala Desa" value="<?php echo $konfigurasi->nama_kades ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kecamatan</label>
   <div class="col-md-8">
    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?php echo $konfigurasi->kecamatan ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kabupaten</label>
   <div class="col-md-8">
    <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten" value="<?php echo $konfigurasi->kabupaten ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kode Pos</label>
   <div class="col-md-8">
    <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" value="<?php echo $konfigurasi->kode_pos ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Telepon</label>
   <div class="col-md-8">
    <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Alamat Office</label>
   <div class="col-md-8">
    <textarea name="alamat" class="form-control" placeholder="Alamat Office"><?php echo $konfigurasi->alamat ?></textarea>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Keyword (Untuk SEO Google)</label>
   <div class="col-md-8">
    <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)"><?php echo $konfigurasi->keywords ?></textarea>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kode Metatext</label>
   <div class="col-md-8">
    <textarea name="metatext" class="form-control" placeholder="Metatext"><?php echo $konfigurasi->metatext ?></textarea>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Deskripsi Desa</label>
   <div class="col-md-8">
    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"><?php echo $konfigurasi->deskripsi ?></textarea>
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