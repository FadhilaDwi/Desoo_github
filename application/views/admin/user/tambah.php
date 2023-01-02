<?php 
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/user/tambah'),' class="form_horizontal"');
?>
<div class="form-group row">
   <label class="col-md-2 col-form-label">Nama Pengguna</label>
   <div class="col-md-5">
    <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo set_value('nama') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">NIK</label>
   <div class="col-md-5">
    <input type="text" name="username" class="form-control" placeholder="NIK" value="<?php echo set_value('username') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Jabatan</label>
   <div class="col-md-5">
    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo set_value('jabatan') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Password</label>
   <div class="col-md-5">
    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required >
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Level Hak Akses</label>
   <div class="col-md-5">
    <select name="akses_level" class="form-control">
    	<option value="Admin">Admin</option>
    	<option value="User">User</option>
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