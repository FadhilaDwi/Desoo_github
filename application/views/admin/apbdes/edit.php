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
echo form_open_multipart(base_url('admin/apbdes/edit/'.$apbdes->id_anggaran),' class="form_horizontal"');
?>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Jenis Anggaran</label>
   <div class="col-md-8">
    <select name="jenis_anggaran" class="form-control" value="<?php echo $apbdes->jenis_anggaran ?>" required>
      <option value="Pendapatan">Pendapatan</option>
      <option value="Belanja">Belanja</option>
    </select>
  </div>
</div>


<div class="form-group row">
   <label class="col-md-2 col-form-label">Bidang Anggaran</label>
   <div class="col-md-8">
    <input type="text" name="bidang" class="form-control" placeholder="Bidang" value="<?php echo $apbdes->bidang ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Sub Bidang</label>
   <div class="col-md-8">
    <input type="text" name="sub_bidang" class="form-control" placeholder="Sub Bidang" value="<?php echo $apbdes->sub_bidang ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Nama Anggaran</label>
   <div class="col-md-8">
    <input type="text" name="nama_anggaran" class="form-control" placeholder="Nama Anggaran" value="<?php echo $apbdes->nama_anggaran ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Nominal</label>
   <div class="col-md-8">
    <input type="text" name="nominal" class="form-control" placeholder="Nominal" value="<?php echo $apbdes->nominal ?>" required decimal>
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