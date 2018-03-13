<?php
include "koneksi.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	    
	0 => 'id_absen',
    1 => 'nama', 
    2 => 'tanggal', 
    3 => 'jam_kerja', 
	4 => 'scanMasuk',
	5 => 'scanPulang',
    6 => 'terlambat',
    7 => 'absent',
    8 => 'pulangCepat',
    9 => 'jmlKehadiran',
    10 => 'dept',
    11 => 'ket',
    12 => 'remaks_izin',
    13 => 'remaks_duty'
);

// getting total number records without any search
$sql = "SELECT id_absen, nama, tanggal, jam_kerja, scanMasuk, scanPulang, terlambat, absent, pulangCepat, jmlKehadiran, dept, ket, remaks_izin, remaks_duty ";
$sql.=" FROM absen";
$query=mysqli_query($conn, $sql) or die("ajax-grid-record.php: get Absen");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id_absen"];
	$nestedData[] = $row["nama"];
    $nestedData[] = $row["tanggal"];
    $nestedData[] = $row["jam_kerja"];
    $nestedData[] = $row["scanMasuk"];
	$nestedData[] = $row["scanPulang"];
	$nestedData[] = $row["terlambat"];
    $nestedData[] = $row["absent"];
    $nestedData[] = $row["pulangCepat"];
    $nestedData[] = $row["jmlKehadiran"];
    $nestedData[] = $row["dept"];
    $nestedData[] = $row["ket"];
    $nestedData[] = $row["remaks_izin"];
    $nestedData[] = $row["remaks_duty"];
    $nestedData[] = '<td><center>
                     <a href="detail-member.php?id='.$row['nik'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-search"></i> </a>
                     <a href="edit-member.php?id='.$row['nik'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="member.php?aksi=delete&id='.$row['nik'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
	                 </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
