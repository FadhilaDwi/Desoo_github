<div class="row">
  <div class="col-lg-6 col-md-6 col-12">
    <div class="info-box shadow">
      <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Nomor Urut Surat Selanjutnya</span>
        <span class="info-box-number">xxx / <mark><ins><?php echo $nomor_surat->nomor ?></ins></mark> / xxx-xxx.x / xxxx</span>
      </div>
      	<a href="<?php echo base_url('admin/pengajuan/nomor_surat') ?>" class="btn btn-app">
	      <i class="fas fa-edit"></i> Edit
	    </a>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>

<!-- pengajuan PENGAJUAN SURAT -->
<table class=" table table-bordered" id="example1">
	<thead>
		<tr class="bg badge-success text-center">
			<th class="text-center">No</th>
			<th class="text-center">Nama Penduduk</th>
			<th class="text-center">Surat</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($pengajuan as $pengajuan) { ?>
			<tr>
				<td class="text-center">
		      <div class="btn-group">
		        <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
		          <span class="sr-only">Toggle Dropdown</span><?php echo $i ?>
		        </button>
		        <div class="dropdown-menu" role="menu">
		        	<a class="dropdown-item bg-warning" href ="<?php echo base_url('admin/pengajuan/update_status/'.$pengajuan->id_pengajuan) ?>">Update Status</a>
		          <a class="dropdown-item bg-info" href ="<?php echo base_url('admin/pengajuan/cetak/'.$pengajuan->id_pengajuan) ?>">Cetak</a>
		          <a class="dropdown-item bg-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/pengajuan/delete/'.$pengajuan->id_pengajuan) ?>">Delete Data</a>
		        </div>
		      </div>
	      </td>
				<td><?php echo $pengajuan->nama_penduduk ?>
					<br><small class="text-secondary">
						NIK : <?php echo $pengajuan->nik ?>
					</small>
					<br><small class="text-secondary">
						No.HP : <?php echo $pengajuan->no_hp ?>
					</small>
				</td>
				<td class="text-center"><?php echo $pengajuan->surat ?>
					<br><small class="text-secondary">
						Nomor : <?php echo $pengajuan->nomor_pengajuan ?>
					</small>
				</td>
				<td class="text-center"><?php echo date('d-m-Y',strtotime($pengajuan->waktu_post)) ?></td>
				<td class="text-center"><?php echo $pengajuan->status ?></td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>