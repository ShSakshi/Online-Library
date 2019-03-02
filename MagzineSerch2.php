<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$nm=$_GET['nm'];
	
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());

		$tbname=str_replace(" ","_",$nm).'Tb';
		
	$rs1=mysqli_query($con,"select coverPic from ".$tbname) or die(mysql_error());
		echo "<table border='1'>";
	
	while($row=mysqli_fetch_array($rs1))
	{
			$imageNM=$row[0];
			echo $imageNM;
			
		
			echo "<tr><td><img src='admin/".$imageNM."' align='center' style='width:300px; height:300px'/></td></tr>";
			echo "<tr><td>". $nm."</td></tr>";
	}
			echo "</table>";
			
	
?>
</body>
</html>