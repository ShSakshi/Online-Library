<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="menu.css">
    <link href="Basic.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="lib/icn.png" />

<title>Untitled Document</title>
</head>

<body>
<div>
			<img src="lib/icn.png" />
        	<img src="lib/mk.png" alt="">
        <nav>
           
            <div  class="shadowblockmenu">
            <ul >
            	<li> <a href="MainPage.php">Home</a>
                <li><a href="MainPage.php #about">About us</a></li>
                <li><a href="MainPage.php #contact">Feedback</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">SignUp</a></li>
                <li><a href="Books.php">Books</a></li>
                <li><a href="Magazine.php">Magazines</a></li>
                <li><a href="Journal.php">Journals</a></li>
                <li><a href="Newspaper.php">Newspapper</a></li>
                  
                    </div>
                </div>
            </ul>
            </div>
        </nav> 
<?php
if(!isset($_POST['sbshow']))
{
	$name=$_GET['newsnm'];
	$_SESSION['newsnm']=$name;
}
//echo $name;
	$cbdate=$cbcity="";
		
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
	
	if(isset($_POST['sbshow']))
	{
		$cbcity=$_POST['cbcity'];
		$cbdate=$_POST['cbdate'];
		
		$name=$_SESSION['newsnm'];			
		$tbname=str_replace(" ","_",$name).'Tb';
		/*echo $tbname;
				echo $name;
				echo $cbcity;
				echo $cbdate;*/
		$rs=mysqli_query($con,"select Logo, NoOfPages, cost from NewspprTb where name='$name' ");
		while($row=mysqli_fetch_array($rs))
		{
			$logo=$row[0];
			$pg=$row[1];
			$cost=$row[2];
		}
		$rs1=mysqli_query($con," select News_id, Pdf from ".$tbname." where ".$tbname.".city='$cbcity' and ".$tbname.".Today_date='$cbdate' ")or die(mysql_error());
		while($row=mysqli_fetch_array($rs1))
		{
			$id=$row[0];
			$pdf=$row[1];
		}
		echo "<table border='1'>";
	//	while($row=mysqli_fetch_array($rs))
		{
			$imageNM="admin/".$logo;
			//echo $imageNM;
			echo "<tr><td><a href=''><img src='".$imageNM."' align='center' style='width:300px; height:300px'/></a></tr>";
			echo "<tr><td> Newsppr Id: ".$id."</td></tr>";		
			echo "<tr><td>Name: ".$name."</td></tr>";		
			echo "<tr><td>City: ".$cbcity."</td></tr>";		
			echo "<tr><td>Date: ".$cbdate."</td></tr>";	
			echo "<tr><td>No Of Pages: ".$pg."</td>";
			echo "<tr><td>Cost: ".$cost."</td></tr>";			
			echo"<tr><td>View Pdf: <input type='submit' name='Pdf' onclick='pdf()'/></td></tr>";
			$pdfNM="admin/".$pdf;
			echo $imageNM;
			echo" <tr><td><iframe src='".$pdfNM."' style='width:400px; height:400px'></iframe></td></tr>";
			
			echo"<tr><td>Reviews: <input type='submit' name='Add Review' onclick='review()'/></td></tr>";
		}
		echo "</table>";
		

	}

		mysqli_query($con,"create table if not exists NewspprReviewTb(id int auto_increment, title varchar(255), comment varchar(255), rate int, primary key(id))") or die(mysql_error());
			
			
		if(isset($_POST['sbsave']))
		{
			$title=$_POST['txtitle'];
			$cmnt=$_POST['txcmnt'];
			
			if(isset($_POST['st1']))
				$c=1;
			
			else if(isset($_POST['st2']))
				$c=2;
				
			else if(isset($_POST['st3']))
				$c=3;
				
			else if(isset($_POST['st4']))
				$c=4;
			
			else if(isset($_POST['st5']))
				$c=5;
			
			
			mysqli_query($con,"insert into NewspprReviewTb(title,commnet,rate) values('$title', '$cmnt', $c) ") or die(mysql_error());

		}

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	<table>
    	<tr>
        	<td>City:</td>
	        <td><select  name="cbcity"><option>Select City</option>
            <?php
			
			//$name=$_GET['newsnm'];
				$con=mysqli_connect("localhost","root","") or die(mysql_error());
				mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
				mysqli_query($con,"use LibraryDb") or die(mysql_error());
				
				$name=$_SESSION['newsnm'];	
				$tbname=str_replace(" ","_",$name).'Tb';
				$rs=mysqli_query($con,"select city from ". $tbname) or die(mysql_error());
				
			while($row=mysqli_fetch_array($rs))
			{
					$city=$row[0];
				echo "<option value='$city' ";
				
				
				if($city==$cbcity)
					echo "selected='selected' "; 
				echo ">$city</option>";
			}
			mysqli_close($con);
			?></select></td>
        </tr>
        <tr>
        	<td>Date:</td>
	        <td><select  name="cbdate"><option>Select Date</option>
            <?php
			
			//$name=$_GET['newsnm'];
				$con=mysqli_connect("localhost","root","") or die(mysql_error());
				mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
				mysqli_query($con,"use LibraryDb") or die(mysql_error());
				
					
				$tbname=str_replace(" ","_",$name).'Tb';
				$rs=mysqli_query($con,"select Today_date from ". $tbname) or die(mysql_error());
				
			while($row=mysqli_fetch_array($rs))
			{
					$date=$row[0];
				echo "<option value='$date' ";
				
				
				if($date==$cbdate)
					echo "selected='selected' "; 
				echo ">$date</option>";
			}
			mysqli_close($con);
			?></select></td>
        </tr>
        <tr>
        	<td><input type="submit" value="Show" name="sbshow" /></td>
        </tr>
    </table>
 </form>
</body>
</html>