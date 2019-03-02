 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<h	ead>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="LibMainCss.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="menu.css">
    <link href="Basic.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="lib/icn.png" />

<title>Untitled Document</title>
<style>
li{
	list-style:none;
}
.topnav .search-container {
  float: right;

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

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border:groove 2px #CCC;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }



</style>
</head>

<body>
<?php

$txt="";

if(isset($_POST['sbsearch']))
	{
		$category=$_POST['category'];
		$search=$_POST['txt'];
		
		
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
	
	}
?>
    <div>
			<img src="lib/icn.png" />
        	<img src="lib/mk.png" alt="">
        <nav>
           
            <div  class="shadowblockmenu">
            <ul >
            	<li> <a href="MainPage.php">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#contact">Feedback</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">SignUp</a></li>
                <li><a href="Books.php">Books</a></li>
                <li><a href="Magazine.php">Magazines</a></li>
                <li><a href="Journal.php">Journals</a></li>
                <li><a href="Newspaper.php">Newspapper</a></li>
                 <div class="search-container">
    				<form action="BookSearch.php"  method="post" enctype="multipart/form-data">
                    	<select name="category1" >
         				   	<option>Select Category</option>
       				        <option>Novels</option>
     				        <option>Science-fi</option>
   					        <option>Humour</option>
                            <option>Academics</option>
                            <option>Technology</option>
                            <option>Sports</option>
         				 </select>
                        <select name="category2" >
         				   	<option>Select Category</option>
       				        <option>Author</option>
     				        <option>Publisher</option>
   					        <option>Name</option>
         				 </select>
             
			    	  <input type="text" placeholder="Search.." name="txsearch" value="<?php echo $txt; ?>">
					      <button type="submit" name="sbsearch"><img src="lib/search1.jpg" width="25px" height="25px" /></button>
				    </form>
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


	require("database.php");
	
$rs1=mysqli_query($con,"select CoverPic, name, author, publisher from NovelsTb")  or die(mysql_error());
		echo "<h1 style=' margin-left:5%'>Novels:</h1>";
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

$rs1=mysqli_query($con,"select CoverPic, name, author, publisher from Science_fiTb")  or die(mysql_error());
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

$rs1=mysqli_query($con,"select CoverPic, name, author, publisher from HumourTb")  or die(mysql_error());
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

$rs1=mysqli_query($con,"select CoverPic, name, author, publisher from AcademicsTb")  or die(mysql_error());
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