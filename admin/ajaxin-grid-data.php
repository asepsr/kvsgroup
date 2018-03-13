<?php
include "koneksi.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	    
	0 => 'nama', 
    1 => 'tanggal', 
    2 => 'jam_kerja', 
	3 => 'scanMasuk',
	4 => 'scanPulang',
    5 => 'terlambat',
    6 => 'absent',
    7 => 'pulangCepat',
    8 => 'jmlKehadiran',
    9 => 'dept',
    10 => 'ket'
);

// getting total number records without any search
$sql = "SELECT id_absen, nama, tanggal, jam_kerja, scanMasuk, scanPulang, terlambat, absent, pulangCepat, jmlKehadiran, dept, ket, remaks_izin, remaks_duty ";
$sql.=" FROM absen";
$query=mysqli_query($conn, $sql) or die("ajaxin-grid-data.php: get Absen");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id_absen, nama, tanggal, jam_kerja, scanMasuk, scanPulang, terlambat, absent, pulangCepat, jmlKehadiran, dept, ket, remaks_izin, remaks_duty ";
	$sql.=" FROM absen";
	$sql.=" WHERE id_absen LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nama LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tanggal LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jam_kerja LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR dept LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-data.php: get Absen");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-data.php: get Absen"); // again run query with limit
	
} else {	

	$sql = "SELECT id_absen, nama, tanggal, jam_kerja, scanMasuk, scanPulang, terlambat, absent, pulangCepat, jmlKehadiran, dept, ket, remaks_izin, remaks_duty ";
	$sql.=" FROM absen";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get Absen");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

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
    $nestedData[] = '<td>
						<center>
						<td>
						<a href="aksi_absen.php?module=absen&act=alpha&id='.$row['id_absen'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-danger"> Alfa </i> </a>
						<a href="aksi_absen.php?module=absen&act=sakit&id='.$row['id_absen'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-success"> Sakit</i> </a>
						<a href="aksi_absen.php?module=absen&act=izin&id='.$row['id_absen'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> Izin </i> </a>
						<a href="aksi_absen.php?module=absen&act=cuti&id='.$row['id_absen'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-success"> Cuti </i> </a>
						<a href="aksi_absen.php?module=absen&act=duty&id='.$row['id_absen'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> On Duty </i> </a>
						<a href="aksi_absen.php?module=absen&act=null&id='.$row['id_absen'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> Null </i> </a>
						<br></br>
					</td>';		
	
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
