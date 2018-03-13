<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "
		<link href='style.css' rel='stylesheet' type='text/css'>
		<center>Untuk mengakses modul, Anda harus login <br>
		<a href=../../index.php><b>LOGIN</b></a></center>
	";
} else {
	$aksi="modul/mod_absen/aksi_absen.php";
	switch($_GET[act]){
		default:
		?>		
		<div class="page-content">
				<div class="hidden-sm hidden-xs btn-group pull-right">
					<a onclick="javascript:confirmDelete();">
						<button class="btn btn-xs btn-danger"> Hapus Semua Data </button>
					</a>
				</div>	
			<div class="page-header">
				<h1> Data Master Absen </h1>			
			</div>
			<div class="row">
				<div class="col-xs-12">				
					<div class="row">
						<div class="col-xs-12">							
							<table id="example_absen" class="table table-striped table-hover table-responsive">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Tanggal</th>
										<th>Scan Masuk</th>
										<th>Scan Pulang</th>
										<th>Terlambat</th>
										<th>Absent</th>
										<th>Pulang Cepat</th>
										<th>Jml Kehadiran</th>
										<th>Remaks Izin</th>
										<th>Remaks Duty</th>
										<th>Ket</th>
										<th width="200px"> </th>
										<th> </th>
									</tr>
								</thead>
								<tbody>									
									<?php
									$no=1;
									$sql_tampil = "SELECT * FROM absen ORDER BY id_absen DESC";
									$tampil = mysql_query($sql_tampil);
									while ($r=mysql_fetch_array($tampil)){
										if ($r['ket']=='1'){$ket = "<span class='btn-primary' style='padding:5px;'>Cuti</span>";}
										else if ($r['ket']=='2'){$ket = "<span class='btn-pink' style='padding:5px;'>Izin</span>";}
										else if ($r['ket']=='3'){$ket = "<span class='btn-purple' style='padding:5px;'>Sakit</span>";}
										else if ($r['ket']=='4'){$ket = "<span class='btn-danger' style='padding:5px;'>Alpha</span>";}
										else if ($r['ket']=='5'){$ket = "<span class='btn-warning' style='padding:5px;'>CN</span>";}
										else if ($r['ket']=='6'){$ket = "<span class='btn-purple' style='padding:5px;'>Duty</span>";}
										else {$ket = "null";}
									?>
									<tr>
										<td> <?php echo $no; ?> </td>
										<td> <?php echo $r['nama']; ?> </td>
										<td> <?php echo $r['tanggal']; ?> </td>
										<td> <?php echo $r['scanMasuk']; ?> </td>
										<td> <?php echo $r['scanPulang']; ?> </td>
										<td> <?php echo $r['terlambat']; ?> </td>
										<td> <?php echo $r['absent']; ?> </td>
										<td> <?php echo $r['pulangCepat']; ?> </td>
										<td> <?php echo $r['jmlKehadiran']; ?> </td>
										
										<td> <?php echo $r['remaks_izin']; ?> </td>
										<td> <?php echo $r['remaks_duty']; ?> </td>
										<td align="right"> <?php echo $ket; ?> </td>
										
										<td>
											<!-- 0=null , 1=cuti , 2=izin , 3=sakit , 4=alpha , 5=cuti nikah , 6=duty -->
											<form method="POST" action="<?php echo $aksi; ?>?module=absen&act=izin&id=<?php echo $r['id_absen']; ?>" enctype='multipart/form-data'>
												<div class="input-group">
													<input type="text" class="form-control" name="remaks_izin" placeholder="Remaks Izin" />
													<div class="input-group-btn">
														<button type="submit" class="btn btn-pink btn-sm" style="width:50px;">
															Izin
														</button>
													</div>
												</div>
											</form>
											<form method="POST" action="<?php echo $aksi; ?>?module=absen&act=duty&id=<?php echo $r['id_absen']; ?>" enctype='multipart/form-data'>
												<div class="input-group">
													<input type="text" class="form-control" name="remaks_duty" placeholder="Remaks Duty" />
													<div class="input-group-btn">
														<button type="submit" class="btn btn-purple btn-sm" style="width:50px;">
															Duty
														</button>
													</div>
												</div>
											</form>
										</td>	
										<td>
											<!-- 0=null , 1=cuti , 2=izin , 3=sakit , 4=alpha -->
											<?php if ($_SESSION['leveluser']=="admin") { ?>
											<div class="hidden-sm hidden-xs btn-group">
												<a href="<?php echo $aksi; ?>?module=absen&act=null&id=<?php echo $r['id_absen']; ?>">
													<button class="btn btn-xs btn-warning"> Null </button>
												</a>
											</div>
											<?php } ?>
											
											<div class="hidden-sm hidden-xs btn-group">
												<a href="<?php echo $aksi; ?>?module=absen&act=sakit&id=<?php echo $r['id_absen']; ?>">
													<button class="btn btn-xs btn-purple"> Sakit </button>
												</a>
											</div>
											<div class="hidden-sm hidden-xs btn-group">
												<a href="<?php echo $aksi; ?>?module=absen&act=cuti&id=<?php echo $r['id_absen']; ?>">
													<button class="btn btn-xs btn-primary"> Cuti </button>
												</a>
											</div>
											<div class="hidden-sm hidden-xs btn-group">
												<a href="<?php echo $aksi; ?>?module=absen&act=cuti_nikah&id=<?php echo $r['id_absen']; ?>">
													<button class="btn btn-xs btn-warning"> CN </button>
												</a>
											</div>
											<div class="hidden-sm hidden-xs btn-group">
												<a href="<?php echo $aksi; ?>?module=absen&act=alpha&id=<?php echo $r['id_absen']; ?>">
													<button class="btn btn-xs btn-danger"> Alpha </button>
												</a>
											</div>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		break;  
	}
}
?>

<script type="text/javascript"> 
	function confirmDelete() { 
		var status = confirm("Are you sure you want to delete?");   
		if(status) {
			window.location.href='<?php echo $aksi; ?>?module=absen&act=hapus_semua_data';
		}
	} 
</script> 
