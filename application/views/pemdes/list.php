<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/upload/image/sliderhome/pemdes.png);">
		<h2 class="l-text2 t-center">
			<?php echo $title ?>
		</h2>
		<p class="m-text13 t-center">
			<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
		</p>
	</section>

	<!-- content page -->
	<section class="blog bgwhite p-t-80 p-b-60">
		<div class="container">
			<div class="row">
				<?php foreach($pemdes as $pemdes) { ?>
					<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
			
						<div class="card">
							<a href="<?php echo base_url('pemdes/detail/'.$pemdes->id_pemdes) ?>">
								<img src="<?php echo base_url('assets/upload/image/gambar_pemdes/'.$pemdes->gambar_pemdes) ?>" class="card-img-top" alt="...">
								<div class="card-body text-center">
								  <h5 class="card-title"><?php echo $pemdes->nama_pemdes ?></h5>
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>