
<!-- Statistik -->
	<section class="blog bgwhite p-t-60 p-b-60">
		<div class="container">
			<div class="sec-title p-b-15">
				<h3 class="m-text5 t-center">
					Statistik Desa
				</h3>
			</div>
			<h5 class="m-text26 t-center p-b-35">
				Statistik Kependudukan Desa Tahun 2021 <br>
				Jumlah Penduduk: <b><?php echo $total_penduduk ?></b> Jiwa <br>
				Laki - Laki: <b><?php echo $total_laki ?></b> Jiwa | 
				Perempuan: <b><?php echo $total_perempuan ?></b> Jiwa <br>
				</h5><br>
				<div id="jenisKelamin" style="width:100%; height:500px;"></div>
			<div class="row justify-content-center">
				<div class="btn-addcart-product-detail size12 trans-0-4 m-t-10">
					<a href="<?php echo base_url('statistik') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Statistik Lainnya</a>
				</div>
			</div>
		</div>
	</section>

<!-- Gender Visual -->
<script>
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
	var data = google.visualization.arrayToDataTable([
				['Jenis Kelamin', 'Jumlah'],
				['Laki - Laki',<?php echo $total_laki ?>],
				['Perempuan', <?php echo $total_perempuan ?>],
				]);

	var options = {
		is3D:true
		};

	var chart = new google.visualization.PieChart(document.getElementById('jenisKelamin'));
		chart.draw(data, options);
		}
</script>
