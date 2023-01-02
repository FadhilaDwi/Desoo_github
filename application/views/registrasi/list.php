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

				<p class="alert alert-success">Sudah Memiliki akun? Silahkan 
					<a href=" <?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login di sini 
					</a>
				</p>

				<div class="col-md-12">
						<?php 
						//display error
						echo validation_errors('<div class="alert alert-warning">','</div>');

						//form open
						echo form_open(base_url('registrasi'), 'class="leave-comment"'); 
						?>
						<table class="table">
							<tbody>
								<tr>
									<th>Nama</th>
									<td><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama_pelanggan') ?>" required></td>
								</tr>
								<tr>
									<th>Email</th>
									<td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></td>
								</tr>
								<tr>
									<th>Password</th>
									<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
								</tr>
								<tr>
									<th>Telepon</th>
									<td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required></td>
								</tr>
								<tr>
									<th>Alamat</th>
									<td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea></td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"></i> Submit</button>
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