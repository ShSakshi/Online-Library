<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$txt="";

if(isset($_POST['sbsearch']))
	{
		$category1=$_POST['category1'];
		$feild=$_POST['category2'];
		$search=$_POST['txsearch'];

		$tbname=str_replace("-","_",$category1).'Tb';
		
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
	
	$rs=mysqli_query($con,"select CoverPic, name from ".$tbname." where ".$feild."='$search'") or die(mysql_error());	
	echo "<table border='1'>";
	while($row=mysqli_fetch_array($rs))
		
	{
			$imageNM="admin/".$row[0];
			//echo $imageNM;
			$name=$row[1];
		
			echo "<tr><td><img src='".$imageNM."' align='center' style='width:300px; height:300px'/></td></tr>";
			echo "<tr><td>". $name."</td></tr>";
	}
			echo "</table>";
	
	}
?>



</body>
</html>