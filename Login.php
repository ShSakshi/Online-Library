
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="LibMainCss.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="menu.css">
    <link href="Basic.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="lib/icn.png" />

<title>Untitled Document</title>
<style>

	 table{
		 margin-top:7%;
		 	border:outset 8px #666666;
	border-radius:10%;
	text-align:center;
	background-color:#69C; 
	box-shadow:12px 12px 12px #666666;
		float:center;
    	margin-left: 30%;
		color:#FFF;
		width:40%;
		height:400px;
	 }
	 </style>
</head>

<body>
<?php

$id=$pass="";
require("common.php");
//if($_SESSION['user']=="")
if(!isset($_SESSION['user']))
{
	echo "<script>alert('First Login your Account'); unlog(); </script>";
	
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
                <li><a id="books" href="Books.php" >Books</a></li>
                <li><a id="magazine" href="Magazine.php">Magazines</a></li>
                <li><a  id="journal" href="Journal.php">Journals</a></li>
                <li><a  id="newspaper" href="Newspaper.php">Newspapper</a></li>
                <li><input id="out" type="submit" name="sblogout" value="" /></li>
             </ul>     
           </div>
         </nav> 


        <div id="header">
    
      	  
	
<form action="LoginCheck.php" method="POST">
<table>
  	<caption style="color:#FFF; margin-top:2%">Sign Up Form: </caption>
 	 <tr id="user" class="lbtxt">
 	     <td>User Id:</td>
    	  <td><input type="text"  name="txid"  value="<?php echo $id; ?>"/></td>
    </tr>
    <tr class="lbtxt">
          <td>Password:</td>
         <td><input type="password" name="txpass"  value="<?php echo $pass;?>"  /></td>
   </tr>
   <tr>
        <td><input class="button" type="submit" value="Submit" name="sbsubmit" /></td>
        <td><input class="button" style="margin-left:-1%" type="submit" value="Cancel" onclick="window.close()" /></td>
  	</tr>
    <tr>
        <td colspan="2">
            <a href="SignUp.php"><img src="lib/bty.png" width="50%" height="50%"/></a></td>
    </tr>

</table>
        </form>
  </div>
</div>

</body>
</html>