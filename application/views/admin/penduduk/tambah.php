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
echo form_open_multipart(base_url('admin/penduduk/tambah'),' class="form_horizontal"');
?>
<div class="form-group row">
   <label class="col-md-2 col-form-label">Nama Penduduk</label>
   <div class="col-md-8">
    <input type="text" name="nama_penduduk" class="form-control" placeholder="Nama Penduduk" value="<?php echo set_value('nama_penduduk') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">NIK</label>
   <div class="col-md-8">
    <input type="text" name="nik" class="form-control" placeholder="NIK" value="<?php echo set_value('nik') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Password</label>
   <div class="col-md-8">
    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">No KK</label>
   <div class="col-md-8">
    <input type="text" name="no_kk" class="form-control" placeholder="No KK" value="<?php echo set_value('no_kk') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Tempat Lahir</label>
   <div class="col-md-8">
    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Tanggal Lahir</label>
   <div class="col-md-8">
    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo set_value('tanggal_lahir') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Jenis Kelamin</label>
   <div class="col-md-8">
    <select name="jenis_kelamin" class="form-control">
    	<option value="Laki-laki">Laki-laki</option>
    	<option value="Perempuan">Perempuan</option>
    </select>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Agama</label>
   <div class="col-md-8">
    <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?php echo set_value('agama') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Status Perkawinan</label>
   <div class="col-md-8">
    <input type="text" name="status_perkawinan" class="form-control" placeholder="Status Perkawinan" value="<?php echo set_value('status_perkawinan') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Pekerjaan</label>
   <div class="col-md-8">
    <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?php echo set_value('pekerjaan') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Kewarganegaraan</label>
   <div class="col-md-8">
    <select name="kewarganegaraan" class="form-control">
    	<option value="WNI">WNI</option>
    	<option value="WNA">WNA</option>
    </select>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Alamat</label>
   <div class="col-md-8">
    <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Pendidikan Terakhir</label>
   <div class="col-md-8">
    <select name="pendidikan" class="form-control">
      <option value="TIDAK/BELUM SEKOLAH">TIDAK/BELUM SEKOLAH</option>
      <option value="BELUM TAMAT SD/SEDERAJAT">BELUM TAMAT SD/SEDERAJAT</option>
      <option value="TAMAT SD/SEDERAJAT">TAMAT SD/SEDERAJAT</option>
      <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
      <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
      <option value="DIPLOMA I/II">DIPLOMA I/II</option>
      <option value="AKADEMI/DIPLOMA III/S.MUDA">AKADEMI/DIPLOMA III/S.MUDA</option>
      <option value="DIPLOMA IV/STRATA I">DIPLOMA IV/STRATA I</option>
      <option value="STRATA II">STRATA II</option>
      <option value="STRATA III">STRATA III</option>
    </select>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Penerima Bantuan</label>
   <div class="col-md-8">
    <select name="penerima_bantuan" class="form-control">
      <option value="Tidak">Tidak</option>
      <option value="PKH">PKH</option>
      <option value="BLT">BLT</option>
    </select>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Upload Scan KTP</label>
   <div class="col-md-8">
     <input type="file" name="scan_ktp" class="form-control" placeholder="Upload Scan KTP" >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label"></label>
   <div class="col-md-8">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
    	<i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset">
    	<i class="fa fa-time"></i> Reset
    </button>
  </div>
</div>
<?php echo form_close(); ?>