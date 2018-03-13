<?php
include("../conn.php");
 session_start();
if(empty($_SESSION)){
	header("Location: ../index.php");
}  
?>

 
			<?php
		 			 
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=DataFinger.xls");
 
// Tampilkan isi table
			# fungsi ubah tanggal 
						/** function rubah_tanggal($tgl)
						 {
						 $exp = explode('-',$tgl);
						 if(count($exp) == 3)
						 {
						 $tgl = $exp[2].'-'.$exp[1].'-'.$exp[0];
						 }
						 return $tgl;
						 }
			 $plantname = $_GET['toxls'];
			 $date1	= rubah_tanggal($_GET['date1']);
			 $date2	= rubah_tanggal($_GET['date2']);**/
							 
			$sqlshow = mysqli_query($koneksi, "SELECT * FROM absen ORDER BY id_absen ASC
																  
												"); 
										
		
			?>
	  
 
	<h3>Data finger print karyawan PT. KVS GROUP</h3>
	  
	<!-- <table>
	
			<tr>
			 <td width="0px">Plant :</td>  <td><?php //echo $plantname ?></td> 
			 <td width="0px">From : <?php //echo date("d-m-Y",strtotime($_GET['date1'])) ?></td>  
			 <td width="0px">Until : <?php //echo date("d-m-Y",strtotime($_GET['date2'])) ?></td> 
			 
		 </tr>
	</table>-->	
    <table>
	
			<tr>
			
			 <td width="0px">Tanggal : <?php echo date("d-m-Y") ?></td>  
			 
			 
		 </tr>
	</table>	
		 
<table bordered="1">  
	<thead bgcolor="eeeeee" align="center">
	<tr bgcolor="eeeeee" >
	<th>id_absen</th>
	<th>Nama</th>
	<th>Tanggal</th>
	<th>Jam Kerja</th>
	<th>Scan Masuk</th>
	<th>Scan Keluar</th>
	<th>Terlambat</th>
	<th>Absent</th>
	<th>Pulang Cepat</th>
	<th>Jml Kehadiran</th>
	<th>Depertement</th>
	<th>ket</th>
	<th>remaks_izin</th>
	<th>remaks_duty</th>
	</tr>
	</thead>
	<tbody>
	</tbody>
	</div>
	</div>
	</div>
	<?php
		//if (isset($_POST['show'])) {
		$rowshow = mysqli_fetch_assoc($sqlshow);
		$nomor=0;
		while($rowshow = mysqli_fetch_assoc($sqlshow)){					 
			$nomor++;
			echo '<tr>';
			//echo '<td>'.$nomor.'</td>';
			echo '<td>'.$rowshow['id_absen'].'</td>';
			echo '<td>'.$rowshow['nama'].'</td>';
			echo '<td>'.$rowshow['tanggal'].'</td>';
			echo '<td>'.$rowshow['jam_kerja'].'</td>';
			echo '<td>'.$rowshow['scanMasuk'].'</td>';
			echo '<td>'.$rowshow['scanPulang'].'</td>';
			echo '<td>'.$rowshow['terlambat'].'</td>';
			echo '<td>'.$rowshow['absent'].'</td>';
			echo '<td>'.$rowshow['pulangCepat'].'</td>';
			echo '<td>'.$rowshow['jmlKehadiran'].'</td>';
			echo '<td>'.$rowshow['dept'].'</td>';
			echo '<td>'.$rowshow['ket'].'</td>';
			echo '<td>'.$rowshow['remaks_izin'].'</td>';
			echo '<td>'.$rowshow['remaks_duty'].'</td>';
			echo '</tr>';
		}				
	?>
</table>   
  
 
   