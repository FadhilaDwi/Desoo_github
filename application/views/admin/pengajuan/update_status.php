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
echo form_open_multipart(base_url('admin/pengajuan/update_status/' .$pengajuan->id_pengajuan),' class="form_horizontal"');
?>

<div class="form-group row">
   <label class="col-md-2 col-form-label">Status Pengajuan</label>
   <div class="col-md-8">
    <select name="status" class="form-control">
	  	<option value="Menunggu">Menunggu</option>
		<option value="Diproses" <?php if($pengajuan->status=="Diproses") {echo "selected";} ?>>Diproses</option>
		<option value="Selesai" <?php if($pengajuan->status=="Selesai") {echo "selected";} ?>>Selesai</option>
	</select>
  </div>
</div>

<div class="form-group row">
   <label class="col-md-2 col-form-label"></label>
   <div class="col-md-5">
    <button class="btn btn-success" name="submit" type="submit">
    	<i class="fa fa-retweet"></i> Update Status Pengajuan
    </button>
  </div>
</div>

<table class=" table table-bordered">
	<thead>
		<tr class="bg badge-success text-center">
			<th class="text-center">Nama Penduduk</th>
			<th class="text-center">Surat</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Status</th>
		</tr>
	</thead>
	<tbody>
		<tr >
			<td><?php echo $pengajuan->nama_penduduk ?>
				<br><small class="text-secondary">
					NIK : <?php echo $pengajuan->nik ?>
				</small>
				<br><small class="text-secondary">
					No.HP : <?php echo $pengajuan->no_hp ?>
				</small>
			</td>
			<td class="text-center"><?php echo $pengajuan->surat ?></td>
			<td class="text-center"><?php echo date('d-m-Y',strtotime($pengajuan->waktu_post)) ?></td>
			<td class="text-center"><?php echo $pengajuan->status ?></td>
		</tr>
	</tbody>
</table>

<?php echo form_close(); ?>