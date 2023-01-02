	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/upload/image/sliderhome/pemdes.png);">
		<h2 class="l-text2 t-center">
			<?php echo $pemdes->nama_pemdes ?>
		</h2>
		<p class="m-text13 t-center">
			<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
		</p>
	</section>

	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="<?php echo base_url('assets/upload/image/gambar_pemdes/'.$pemdes->gambar_pemdes) ?>" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<p class="p-b-28">
						<?php echo $pemdes->isi_pemdes ?>
					</p>
				</div>
			</div>
		</div>
	</section>