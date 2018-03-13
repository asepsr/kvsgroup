<?php
include "../conn.php";
$module	= $_GET['module'];
$act	= $_GET['act'];
	
	
	
	// 0=null , 1=cuti , 2=izin , 3=sakit , 4=alpha , 5=cuti nikah , 6=duty
	if ($module=='absen' AND $act=='null'){
		$query = mysqli_query($koneksi, "UPDATE absen SET ket	= '0' WHERE id_absen = '$_GET[id]'")or die(mysql_error());
		header('location:input_deduction.php');		
		
	}
	if ($module=='absen' AND $act=='cuti'){
		$query = mysqli_query($koneksi, "UPDATE absen SET ket	= '1' WHERE id_absen = '$_GET[id]'")or die(mysql_error());
		header('location:input_deduction.php');		
	}
	if ($module=='absen' AND $act=='izin'){
		$query = mysqli_query($koneksi, "UPDATE absen SET ket	= '2' , remaks_izin = '$_POST[remaks_izin]' WHERE id_absen = '$_GET[id]'")or die(mysql_error());
		header('location:input_deduction.php');		
	}
	if ($module=='absen' AND $act=='sakit'){
		$query = mysqli_query($koneksi, "UPDATE absen SET ket	= '3' WHERE id_absen = '$_GET[id]'")or die(mysql_error());
		header('location:input_deduction.php');		
	}
	if ($module=='absen' AND $act=='alpha'){
		$query = mysqli_query($koneksi, "UPDATE absen SET ket	= '4' WHERE id_absen = '$_GET[id]'")or die(mysql_error());
		header('location:input_deduction.php');		
	}
	if ($module=='absen' AND $act=='cuti_nikah'){
		$query = mysqli_query($koneksi, "UPDATE absen SET ket	= '5' WHERE id_absen = '$_GET[id]'")or die(mysql_error());
		header('location:input_deduction.php');	
	}
	if ($module=='absen' AND $act=='duty'){
		$query = mysqli_query($koneksi, "UPDATE absen SET ket	= '6', remaks_duty = '$_POST[remaks_duty]' WHERE id_absen = '$_GET[id]'")or die(mysql_error());
		header('location:input_deduction.php');	
	}

	if ($module=='absen' AND $act=='hapus_semua_data'){
		mysql_query("DELETE FROM absen WHERE id_absen!=''");
		header('location:../../media.php?module='.$module);
	}
	
?>
