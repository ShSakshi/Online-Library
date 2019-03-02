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

<title>Untitled Document</title>
</head>

<body>
<?php
	$txt="";
	/*$category1=$_POST['category1'];
	$feild=$_POST['category2'];
	$search=$_POST['txt'];*/
?>

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
                    <div class="search-container">
    				<form name="frm1" action="MagzineSerch.php"  method="post" enctype="multipart/form-data">
                    	<select name="category1" >
         				   	<option>Select Category</option>
       				        <option>Health N Fittness</option>
     				        <option>Sports</option>
   					        <option>Art</option>
         				    <option>Fashion</option>
         				    <option>Wildlife</option>
      				        <option>Food N Drink</option>
             			    <option>Political</option>
         			        <option>Music</option>
              			    <option>Gadgets</option>
		              </select>
                      
                      <select name="category2" >
         				   	<option>Select Category</option>
       				        <option>Type</option>
     				        <option>Publisher</option>
		              </select>
             
			    	  <input type="text" placeholder="Search.." name="txsearch" value="<?php echo $txt; ?>">
					      <button type="submit" name="sbsearch" ><img src="lib/search1.jpg" width="25px" height="25px" /></button>
				    </form>
  </div> 
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

	$rs1=mysqli_query($con,"select name, type from MagazineTb");
	while($row=mysqli_fetch_array($rs1))
	{
		$name=$row[0];
		$type=$row[1];

		if($type=="Weekly")
		{
			$field='From_Date ,To_date';
			
			
		}
		else if($type=="Monthly")
		{
			$field='Month';
		}
		
		else if($type=="Yearly")
		{
			$field='Year';
		}

		
		$tbname=str_replace(" ","_",$name).'Tb';
		
	$rs=mysqli_query($con,"select coverPic,".$field." from ".$tbname);
	
	echo "<h1 style=' margin-left:5%'>".$name.": </h1>";
		echo "<table cellspacing='12'  border='1' style='margin-left:5%; margin-bottom:5%'>";
		//echo "";
		$i=0;
		
		while($row=mysqli_fetch_array($rs))
		{
			if($i==0)
				echo "<tr>";
			$imageNM="admin/".$row[0];
			//echo $imageNM;
			echo "<td><li><a href='SingleMagazineInfo.php'><img src='".$imageNM."' style='width:200px; height:200px'/></a></li>";
			echo "<li> ".$field.": ".$row[1]."</li></td>";
			$i++;
			if($i==6)
			{
				$i=0;
				echo " </tr>";

			}
		}
		echo "</tr></table>";

	}
		
?>
</body>
</html>