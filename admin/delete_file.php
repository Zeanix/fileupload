<?php
include 'includes/connect.php';
if(isset($_GET['file_id']))
{
	
	$file_id = $_GET['file_id'];
	
	$sql ="SELECT * FROM files WHERE file_id=$file_id";
	$result = mysqli_query ($conn, $sql) or die(mysql_error());
	$row = mysqli_fetch_assoc ($result);
	
	unlink("img/" . $row['file_navn']);
	
	$sql1 = "DELETE FROM files WHERE file_id=$file_id";
	$result1 = mysqli_query ($conn, $sql1) or die(mysql_error());
}
header("Location: main.php");
exit;