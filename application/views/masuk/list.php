<section class="bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="pos-relative">
			<div class="bgwhite">
				<h3 class="m-text4"><?php echo $title ?></h3><hr>
				<div class="clearfix"></div>

				<br>

				<div class="col-md-12">
						<?php 
						//display error
						echo validation_errors('<div class="alert alert-warning">','</div>');

						//display notifikasi error login
						if($this->session->flashdata('warning')) {
							echo '<div class="alert alert-warning">';
							echo $this->session->flashdata('warning');
							echo '</div>';
						}

						if($this->session->flashdata('sukses')) {
							echo '<div class="alert alert-success">';
							echo $this->session->flashdata('sukses');
							echo '</div>';
						}

						//form open
						echo form_open(base_url('masuk'), 'class="leave-comment"'); 
						?>
						<table class="table">
							<tbody>
								<tr>
									<th width="20%">NIK</th>
									<td><input type="text" name="nik" class="form-control" placeholder="NIK" value="<?php echo set_value('nik') ?>" required></td>
								</tr>
								<tr>
									<th>Password</th>
									<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"></i> Login</button>
										<button class="btn btn-default btn-lg" type="reset"><i class="fa fa-times"></i> Riset</button>
									</td>
								</tr>
							</tbody>
						</table>
					<?php echo form_close(); ?>
				</div>

				
			</div>
		</div>
	</div>
</section>