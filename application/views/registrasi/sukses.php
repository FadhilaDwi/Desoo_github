<section class="bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="pos-relative">
			<div class="bgwhite">
				<h3 class="m-text4"><?php echo $title ?></h3><hr>
				<div class="clearfix"></div>

				<br>

				<?php if($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				}
				?>

				<p class="alert alert-success">Registrasi telah dilakukan. Silahkan 
					<a href=" <?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login di sini 
					</a> Sekarang anda juga bisa melanjutkan <a href=" <?php echo base_url('belanja/checkout') ?>" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i> Check Out 
					</a>
				</p>
			</div>
		</div>
	</div>
</section>