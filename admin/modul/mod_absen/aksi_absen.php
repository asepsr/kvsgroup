<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "
		<link href='style.css' rel='stylesheet' type='text/css'>
		<center>Untuk mengakses modul, Anda harus login <br>
		<a href=../../index.php><b>LOGIN</b></a></center>
	";
} else {
	include "../../../config/koneksi.php";
	include "../../../config/fungsi_seo.php";
	include "../../../config/fungsi_thumb.php";

	$module	= $_GET['module'];
	$act	= $_GET['act'];
	
	
	// 0=null , 1=cuti , 2=izin , 3=sakit , 4=alpha , 5=cuti nikah , 6=duty
	if ($module=='absen' AND $act=='null'){
		mysql_query("UPDATE absen SET ket	= '0' WHERE id_absen = '$_GET[id]'");
		header('location:../../media.php?module='.$module);		
	}
	if ($module=='absen' AND $act=='cuti'){
		mysql_query("UPDATE absen SET ket	= '1' WHERE id_absen = '$_GET[id]'");
		header('location:../../media.php?module='.$module);		
	}
	if ($module=='absen' AND $act=='izin'){
		mysql_query("UPDATE absen SET ket	= '2' , remaks_izin = '$_POST[remaks_izin]' WHERE id_absen = '$_GET[id]'");
		header('location:../../media.php?module='.$module);		
	}
	if ($module=='absen' AND $act=='sakit'){
		mysql_query("UPDATE absen SET ket	= '3' WHERE id_absen = '$_GET[id]'");
		header('location:../../media.php?module='.$module);		
	}
	if ($module=='absen' AND $act=='alpha'){
		mysql_query("UPDATE absen SET ket	= '4' WHERE id_absen = '$_GET[id]'");
		header('location:../../media.php?module='.$module);		
	}
	if ($module=='absen' AND $act=='cuti_nikah'){
		mysql_query("UPDATE absen SET ket	= '5' WHERE id_absen = '$_GET[id]'");
		header('location:../../media.php?module='.$module);		
	}
	if ($module=='absen' AND $act=='duty'){
		mysql_query("UPDATE absen SET ket	= '6' , remaks_duty = '$_POST[remaks_duty]' WHERE id_absen = '$_GET[id]'");
		header('location:../../media.php?module='.$module);		
	}

	if ($module=='absen' AND $act=='hapus_semua_data'){
		mysql_query("DELETE FROM absen WHERE id_absen!=''");
		header('location:../../media.php?module='.$module);
	}
	
}
?>
