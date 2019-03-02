<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="LibMainCss.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="menu.css">
    <link href="Basic.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="lib/icn.png" />

<style>
li{
	list-style:none;
}
#header {
    width:100%;
    height: 700px;
    background-image:url(lib/big.jpg);
	background-attachment:fixed;
	background-size: auto;
    z-index: -1;
    color: black;
	float:left;
	margin-right:100%;
}

</style>

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
                <li><a href="#about">About us</a></li>
                <li><a href="#contact">Feedback</a></li>
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

        <div id="header" style="margin-bottom:4%">
      	  
	<div id="span1">ONLINE BOOK LIBRARY
        <br />
        Powerful Component Of Digital Library
        </div>
		
		
        </div>
    

<?php 

	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());

		$rs1=mysqli_query($con,"select Logo, name from NewspprTb")  or die(mysql_error());
		echo "<h1 style=' margin-left:5%'>Newspapers:</h1>";
		echo "<table cellspacing='12'  border='1' style='margin-left:5%'>";
		//echo "";
		$i=0;
		
		while($row=mysqli_fetch_array($rs1))
		{
			if($i==0)
				echo "<tr>";
			$imageNM="admin/".$row[0];
			$newsnm=$row[1];
			//echo $imageNM;
			echo "<td><li><a href='SingleNewspprInfo.php?newsnm=$newsnm'><img src='".$imageNM."' style='width:200px; height:200px'/></a></li>";
			echo "<li><h1>".$newsnm."</h1></li>";		
			$i++;
			if($i==6)
			{
				$i=0;
				echo " </tr>";

			}
		}
		echo "</tr></table>";


?>

</body>
</html>