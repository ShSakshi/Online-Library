<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="menu.css">
    <link href="Basic.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="lib/icn.png" />

<title>Untitled Document</title>
<script>
	function review()
	{
		document.getElementById('form1').style.visibility="visible";	
	}
	function star1()
	{

		document.getElementById('st1').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st2').style.backgroundImage="url(lib/starr2.jpg)";
		document.getElementById('st3').style.backgroundImage="url(lib/starr2.jpg)";
		document.getElementById('st4').style.backgroundImage="url(lib/starr2.jpg)";
		document.getElementById('st5').style.backgroundImage="url(lib/starr2.jpg)";
	}
	function star2()
	{
		
		document.getElementById('st1').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st2').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st3').style.backgroundImage="url(lib/starr2.jpg)";
		document.getElementById('st4').style.backgroundImage="url(lib/starr2.jpg)";
		document.getElementById('st5').style.backgroundImage="url(lib/starr2.jpg)";
	}
	function star3()
	{
	
		document.getElementById('st1').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st2').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st3').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st4').style.backgroundImage="url(lib/starr2.jpg)";
		document.getElementById('st5').style.backgroundImage="url(lib/starr2.jpg)";
	}
	function star4()
	{
	
		document.getElementById('st1').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st2').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st3').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st4').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st5').style.backgroundImage="url(lib/starr2.jpg)";
	}
	function star5()
	{
	
		document.getElementById('st1').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st2').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st3').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st4').style.backgroundImage="url(lib/starr1.jpg)";
		document.getElementById('st5').style.backgroundImage="url(lib/starr1.jpg)";
	}
	function pdf()
	{
		document.getElementById('pdf').style.visibility="visible";
	}
</script>
<style>
.star1{
	width:52px;
	height:52px;
	cursor:pointer;
	float:left;
	background-image:url(lib/starr2.jpg);
}
.star1:hover{
	width:52px;
	height:52px;
	cursor:pointer;
}
</style>
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
$imgnm=$_GET['imgAnm'];
$imgnm=substr($imgnm,6);
	$title=$cmnt="";
	
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());

$rs1=mysqli_query($con,"select CoverPic, Book_id, name, author, publisher, category, class, cost, NoPages, Pdf from AcademicsTb where CoverPic='$imgnm'")  or die(mysql_error());
		echo "<table border='1'>";
		while($row=mysqli_fetch_array($rs1))
		{
			$imageNM="admin/".$row[0];
			echo "<tr><td><a href=''><img src='".$imageNM."' align='center' style='width:300px; height:300px'/></a></tr>";
			echo "<tr><td> Book Id: ".$row[1]."</td></tr>";		
			echo "<tr><td>Name: ".$row[2]."</td></tr>";		
			echo "<tr><td>Author: ".$row[3]."</td></tr>";		
			echo "<tr><td>Publisher: ".$row[4]."</td></tr>";	
			echo "<tr><td>Category: ".$row[5]."</td></tr>";			
			echo "<tr><td>Class: ".$row[6]."</td></tr>";
			echo "<tr><td>Cost: ".$row[7]."</td></tr>";		
			echo "<tr><td>No Of Pages: ".$row[8]."</td></tr>";	
			echo"<tr><td>View Pdf: <input type='submit' name='Pdf' onclick='pdf()'/></td></tr>";
			$pdfNM="admin/".$row[9];
			echo" <tr id='pdf' style='visibility:hidden'><td><iframe src='".$pdfNM."' style='width:400px; height:400px'></iframe></td></tr>";
			echo"<tr><td>Reviews: <input type='submit' name='Add Review' value='Review'  onclick='review() '/></td></tr>";
		}
		echo "</table>";
		mysqli_query($con,"create table if not exists BookReviewTb(id int auto_increment, title varchar(255), comment varchar(255), rate int, primary key(id))") or die(mysql_error());
			
			
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
			
			
			mysqli_query($con,"insert into BookReviewTb(title,commnet,rate) values('$title', '$cmnt', $c) ") or die(mysql_error());
		}
?>
<form id="form1" style="margin-bottom:5%; visibility:hidden">
	<table>
    	<tr>
        	<th>Review Box: </th>
        </tr>
        <tr>
        	<td>Title: </td>
            <td><input type="text" name="txtitle" value="<?php echo $title;  ?>" /></td>
        </tr>
        <tr>
        	<td>Comment:</td>
            <td><textarea name="txcmnt"><?php echo $cmnt;  ?></textarea></td>
        </tr>
        <tr>
        	<td>Rating: </td>
            <td><input id="st1" type="button" class="star1" onclick="star1()" name="st1" value=" " />
            <input id="st2" type="button" class="star1" onclick="star2()" name="st2" value=" " />
            <input id="st3" type="button" class="star1" onclick="star3()" name="st3" value=" " />
            <input id="st4" type="button" class="star1" onclick="star4()" name="st4" value=" " />
            <input id="st5" type="button" class="star1" onclick="star5()" name="st5" value=" " /></td>
        </tr>
        <tr>
        	<td><input type="submit" value="Save" name="sbsave"/></td>
            <td><input type="submit" name="Hide" /></td>
        </tr>
    </table>
</form>
<?php

			if(isset($_POST['st1']))
				echo "<script>star1();</script>";
			
			else if(isset($_POST['st2']))
				echo "<script>star2();</script>";
				
			else if(isset($_POST['st3']))
				echo "<script>star3();</script>";
				
			else if(isset($_POST['st4']))
				echo "<script>star4();</script>";
			
			else if(isset($_POST['st5']))
				echo "<script>star5();</script>";
?>
</body>
</html>