<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .headline {
			text-align: center;
			/* font-size: 15px; */
			text-transform: uppercase;
		}
		table tr .surat{
			text-align: center;
			font-size: 15px;
			text-transform: uppercase;
		}
		table tr .text2 {
			text-align: right;
			font-size: 15px;
		}
		table tr .text {
			text-align: center;
			font-size: 15px;
		}
		table tr td {
			vertical-align: top;
			font-size: 15px;
			text-align: justify;
		}
	</style>
</head>
<body>
	<center>
		<table width="675">
			<tr>
				<td><img src="<?php echo base_url('assets/upload/image/logo_surat.png') ?>" width="75"></td>
				<td class="headline">
					<center>
						<font size="6"><b>Pemerintah Kabupaten <?php echo $site->kabupaten ?></b></font><br>
						<font size="6"><b>Kecamatan <?php echo $site->kecamatan ?></b></font><br>
						<font size="6"><b>Desa <?php echo $site->namaweb ?></b></font><br>
						<font size="3"><?php echo $site->alamat ?></font>
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
			<table width="675">
				<tr>
					<td class="surat"><b><u><?php echo $pengajuan->surat ?></u></b><br>Nomer : <?php echo $pengajuan->nomor_pengajuan ?></td>
				</tr>
			</table>
		</table>
		<br>
		<table>
			<tr>
		       <td colspan="2">
			       <font size="4">Yang bertanda tangan di bawah ini:</font>
		       </td>
		    </tr>
		    <tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>

			<tr class="text2">
				<td>Nama</td>
				<td width="525">: <?php echo $site->nama_kades ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td width="525">: Kepala Desa <?php echo $site->namaweb ?></td>
			</tr>

			<tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>
			<tr>
		       <td colspan="2">
			       <font size="4">Menerangkan dengan sebenarnya bahwa:</font>
		       </td>
		    </tr>
		    <tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>

		    <tr class="text2">
				<td>Nama</td>
				<td width="525">: <?php echo $penduduk->nama_penduduk ?></td>
			</tr>
			<tr>
				<td>NIK</td>
				<td width="525">: <?php echo $penduduk->nik ?></td>
			</tr>
			<tr>
				<td>TTL</td>
				<td width="525">: <?php echo $penduduk->tempat_lahir ?>/<?php echo date('d-m-Y',strtotime($penduduk->tanggal_lahir)) ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td width="525">: <?php echo $penduduk->jenis_kelamin ?></td>
			</tr>
			<tr>
				<td>Kewarganegaraan</td>
				<td width="525">: <?php echo $penduduk->kewarganegaraan ?></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td width="525">: <?php echo $penduduk->agama ?></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td width="525">: <?php echo $penduduk->pekerjaan ?></td>
			</tr>
			<tr>
				<td>Pendidikan</td>
				<td width="525">: <?php echo $penduduk->pendidikan ?></td>
			</tr>
			<tr>
				<td>Status Perkawinan</td>
				<td width="525">: <?php echo $penduduk->status_perkawinan ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td width="525">: Dusun <?php echo $penduduk->dusun ?> RT <?php echo $penduduk->rt ?> RW <?php echo $penduduk->rw ?> Desa <?php echo $penduduk->kelurahan ?> Kecamatan <?php echo $penduduk->kecamatan ?> Kabupaten <?php echo $site->kabupaten?></td>
			</tr>
		</table>
		<br>
		<table width="675">
			<tr>
		       <td>
			      	<font size="4"> &emsp; &emsp; Setelah diadakan penelitian dan berdasarkan data yang ada di Desa, hingga saat dikeluarkan Surat Keterangan ini ternyata yang bersangkutan :
					</font>
		       </td><br><br>
		    </tr>
		    <tr>
		       <td>
			      	<font size="4">	1.	Berkelakuan baik. <br>
			      					2.	Tidak pecandu minuman keras. <br>
									3.	Tidak sedang/pernah tersangkut perkara pidana/berurusan dengan yang berwajib/kepolisian.

					</font>
		       </td><br><br>
		    </tr>
		    <tr>
		       <td>
			      	<font size="4"> &emsp; &emsp; <?php echo $pengajuan->surat ?> ini diminta/diberikan kepada yang bersangkutan untuk dipergunakan sebagai <?php echo $pengajuan->var1 ?>.
					</font>
		       </td><br><br>
		    </tr>
			<tr>
		       <td>
			      	<font size="4"> &emsp; &emsp; Demikianlah <?php echo $pengajuan->surat ?> ini kami buat dengan sebenarnya, agar dapat dipergunakan sebagaimana mestinya.
					</font>
		       </td><br><br>
		    </tr>
		</table>
		<br>
		<table width="675">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center"><?php echo $site->kabupaten ?>, <?php echo date('d-m-Y',strtotime($pengajuan->waktu_update)) ?><br>Kepala Desa<br><?php echo $site->namaweb ?><br><br><br><br><b><u><?php echo $site->nama_kades ?></u></b></td>
			</tr>
	     </table>
	</center>
</body>
</html>