<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/upload/image/sliderhome/statistik.png);">
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
			<div class="row justify-content-center">
				<h5 class="m-text26 t-center p-b-35">
				Statistik Kependudukan Desa Tahun 2021 <br>
				Jumlah Penduduk: <b><?php echo $total_penduduk ?></b> Jiwa <br>
				</h5>
			</div>

			<div class="row">
				<div class="col-12 col-lg-6">
					<div id="jenisKelamin" style="width:100%; height:400px;"></div>
				</div>
				<div class="col-12 col-lg-6">
					<div id="Pendidikan" style="width:100%; height:400px;"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-6">
					<div id="Agama" style="width:100%; height:400px;"></div>
				</div>
				<div class="col-12 col-lg-6">
					<div id="statusKawin" style="width:100%; height:400px;"></div>
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
		title:'Jenis Kelamin',
		is3D:true
		};

	var chart = new google.visualization.PieChart(document.getElementById('jenisKelamin'));
		chart.draw(data, options);
		}
</script>

<!-- Status Kawin Visual -->
<script>
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
	var data = google.visualization.arrayToDataTable([
				['Status Kawin', 'Jumlah'],
				['Belum Kawin',<?php echo $total_belumkawin ?>],
				['Kawin', <?php echo $total_kawin ?>],
				['Cerai Hidup', <?php echo $total_ceraihidup ?>],
				['Cerai Mati', <?php echo $total_ceraimati ?>]
				]);

	var options = {
		title:'Status Kawin',
		is3D:true
		};

	var chart = new google.visualization.PieChart(document.getElementById('statusKawin'));
		chart.draw(data, options);
		}
</script>

<!-- Pendidikan Visual -->
<script>
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
	var data = google.visualization.arrayToDataTable([
				['Pendidikan', 'Jumlah'],
				['Belum / Tidak Sekolah',<?php echo $total_belumsekolah ?>],
				['Belum Tamat SD', <?php echo $total_belumtamatsd ?>],
				['Tamat SD/Sederajat', <?php echo $total_tamatsd ?>],
				['SLTP/Sederajat', <?php echo $total_sltp ?>],
				['SLTA/Sederajat', <?php echo $total_slta ?>],
				['Diploma I/II', <?php echo $total_d12 ?>],
				['Diploma III/Akademi', <?php echo $total_d3 ?>],
				['Diploma IV/S1', <?php echo $total_s1 ?>],
				['S2', <?php echo $total_s2 ?>],
				]);

	var options = {
		title:'Pendidikan',
		is3D:true
		};

	var chart = new google.visualization.BarChart(document.getElementById('Pendidikan'));
		chart.draw(data, options);
		}
</script>

<!-- Status agama -->
<script>
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
	var data = google.visualization.arrayToDataTable([
				['Agama', 'Jumlah'],
				['Islam',<?php echo $total_islam ?>],
				['Budha', <?php echo $total_budha ?>],
				['Khatolik', <?php echo $total_khatolik ?>],
				]);

	var options = {
		title:'Agama',
		is3D:true
		};

	var chart = new google.visualization.ColumnChart(document.getElementById('Agama'));
		chart.draw(data, options);
		}
</script>
