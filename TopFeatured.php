<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="LibMainCss.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="menu.css">
    <link href="Basic.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="lib/icn.png" />

<title>Untitled Document</title>
</head>

<body>
<?php 

	require("common.php");
	
?>

        <div id="header" style="margin-bottom:4%">
      	  
	<div id="span1">ONLINE BOOK LIBRARY
        <br />
        Powerful Component Of Digital Library
        </div>
		
		

    

<?php 
	require("database.php");
	
$rs1=mysqli_query($con,"select CoverPic, name, author, publisher from NovelsTb where ratting=3 ")  or die(mysql_error());
		echo "<h1 style=' margin-left:5%; margin-top:18%'>Novels:</h1>";
		echo "<table cellspacing='12'  border='1' style='margin-left:5%'>";
		$i=0;
		while($row=mysqli_fetch_array($rs1))
		{
			if($i==0)
				echo "<tr>";
			$imageNM="admin/".$row[0];
			echo "<td><li><a href='SingleNovelInfo.php?imgnm=$imageNM'><img src='".$imageNM."' style='width:200px; height:200px'/></a></li>";
			echo "<li><cite>".$row[1]."</cite> by ".$row[2]."</li>";		
			echo "<li>Publisher: ".$row[3]."</li></td>";
			$i++;
			if($i==6)
			{
				$i=0;
				echo " </tr>";
			}
		}
		echo "</tr></table>";

$rs1=mysqli_query($con,"select CoverPic, name, author, publisher from Science_fiTb Limit 5")  or die(mysql_error());
		echo "<h1 style=' margin-left:5%'>Science-fi:</h1>";
		echo "<table cellspacing='12'  border='1' style='margin-left:5%'>";
		$i=0;
		while($row=mysqli_fetch_array($rs1))
		{
			if($i==0)
				echo "<tr>";
			$imageNM="admin/".$row[0];
			echo "<td><li><a href='SingleSciInfo.php?imgSnm=$imageNM'><img src='".$imageNM."' style='width:200px; height:200px'/></a></li>";
			echo "<li><cite>".$row[1]."</cite> by ".$row[2]."</li>";		
			echo "<li>Publisher: ".$row[3]."</li></td>";
			$i++;
			if($i==6)
			{
				$i=0;
				echo " </tr>";
			}
		}
		echo "</tr></table>";

$rs1=mysqli_query($con,"select CoverPic, name, author, publisher from HumourTb Limit 5")  or die(mysql_error());
		echo "<h1 style=' margin-left:5%'>Humour :</h1>";
		echo "<table cellspacing='12'  border='1' style='margin-left:5%'>";
		$i=0;
		while($row=mysqli_fetch_array($rs1))
		{
			if($i==0)
				echo "<tr>";
			$imageNM="admin/".$row[0];
			echo "<td><li><a href='SingleHumInfo.php?imgHnm=$imageNM'><img src='".$imageNM."' style='width:200px; height:200px'/></a></li>";
			echo "<li><cite>".$row[1]."</cite> by ".$row[2]."</li>";		
			echo "<li>Publisher: ".$row[3]."</li></td>";
			$i++;
			if($i==6)
			{
				$i=0;
				echo " </tr>";
			}
		}
		echo "</tr></table>";

$rs1=mysqli_query($con,"select CoverPic, name, author, publisher from AcademicsTb Limit 5")  or die(mysql_error());
		echo "<h1 style=' margin-left:5%'>Academics:</h1>";
		echo "<table cellspacing='12'  border='1' style='margin-left:5%'>";
		$i=0;
		while($row=mysqli_fetch_array($rs1))
		{
			if($i==0)
				echo "<tr>";
			$imageNM="admin/".$row[0];
			echo "<td><li><a href='SingleAcadInfo.php?imgAnm=$imageNM'><img src='".$imageNM."' style='width:200px; height:200px'/></a></li>";
			echo "<li><cite>".$row[1]."</cite> by ".$row[2]."</li>";		
			echo "<li>Publisher: ".$row[3]."</li></td>";
			$i++;
			if($i==6)
			{
				$i=0;
				echo " </tr>";
			}
		}
		echo "</tr></table>";
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	<!--<input type="submit" name="sbsubmit" value="submit" />-->
  
</form>
</body>
</html>
</body>
</html>