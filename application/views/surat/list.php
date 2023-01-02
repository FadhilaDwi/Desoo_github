<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/upload/image/sliderhome/surat.png);">
		<h2 class="l-text2 t-center">
			<?php echo $title ?>
		</h2>
		<p class="m-text13 t-center">
			<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
		</p>
	</section>

	<!-- content page -->
	<section class="blog bgwhite p-t-80 p-b-60">
<!-- <div class="col-md-3">
	<div class="input-group">
		<input type="text" name="nama_penduduk" class="form-control" placeholder="Nama lengkap"  readonly>
		<button type="button" class="btn btn-primary">
			<i class="fa fa-search"></i>
		</button>
	</div>
	<br>
</div> -->
		<div class="container">
			<?php echo form_open_multipart(base_url('Surat')) ?>
			<div class="row">
				<div class="col-6 col-md-3 p-b-30 m-l-r-auto input-group">
					<input type="text" name="cari" class="form-control border" placeholder="Cari Nama Surat" >
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
			<?php echo form_close() ?>
			<div class="row">
				<?php if (count($surat) > 0): ?>
					<?php foreach($surat as $surat) { ?>
						<div class="col-6 col-md-3 p-b-30 m-l-r-auto ">
							<!-- Block3 -->
							<a href="<?php echo base_url('surat/detail/'.$surat->slug_surat) ?>" class="card text-center">
								<img src="<?php echo base_url() ?>assets/upload/image/letter.png" href="<?php echo base_url() ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><?php echo $surat->nama_surat ?></h5>
									<p class="card-text"><?php echo $surat->keterangan ?></p>
								</div>
							</a>
						</div>
					<?php } ?>
				<?php else: ?>
					<div class="col-6 col-md-3 p-b-30 m-l-r-auto">
						<p class="alert alert-success">
							<i class="fa fa-warning">
							</i> Pencarian Tidak ditemukan
						</p>
					</div>
				<?php endif; ?>
			</div>
			<div class="row">
				<div class="col-6 col-md-3 p-b-30">
					<?php echo $pagin ?>
				</div>
			</div>
		</div>

	</section>
