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
		 margin-top:4%;
		 	border:outset 8px #666666;
	border-radius:10%;
	text-align:center;
	background-color:#69C; 
	box-shadow:12px 12px 12px #666666;
		float:center;
    	margin-left: 25%;
		color:#FFF;
		width:50%;
		height:400px;
	 }
	 </style>
<script>
	function Choose()
	{
		if(document.getElementsByName('type').item(0).checked==true)
		{
			document.getElementById('member').style.visibility="hidden";
			document.getElementById('user').style.visibility="visible";	
		}
		else if(document.getElementsByName('type').item(1).checked==true)
		{
			document.getElementById('user').style.visibility="hidden";
			document.getElementById('member').style.visibility="visible";
		}
	}

</script>
</head>

<body>
<?php
	require("common.php");
	$name=$id=$password=$email=$phone="";
	
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
		
	if(isset($_POST['type']))
	{
	
		$mode=$_POST['type'];
		
			
			mysqli_query($con,"create table if not exists SignUpTb(Type varchar(255), SignUp_id varchar(255), name varchar(255),password varchar(255), email varchar(255), phone_no varchar(255),primary key(SignUp_id))") or die(mysql_error());
		
	}
	
	
		
	if(isset($_POST['sbinsert']))
	{
		$mode=$_POST['type'];
		$name=$_POST['txnm'];
		$password=$_POST['txpass'];
		$email=$_POST['txemail'];
		$phone=$_POST['txphn'];
		
		if($mode=="User")
		{
			$id=$_POST['txid'];	
		
		}
		else if($mode=="Member")
		{
			$rs=mysqli_query($con,"select count(*) from SignUpTb where type='$mode' ");
			$c=0; 
			while($row=mysqli_fetch_array($rs))
				$c=$row[0];
			
			$c=$c+1;
			$id='Mem'.$c;
		}
			mysqli_query($con,"insert into SignUpTb(type,SignUp_id,name,password ,email ,phone_no ) values('$mode','$id','$name','$password','$email','$phone')") or die(mysql_error());
	
	}
?>
<div>
			<img src="lib/icn.png" />
        	<img src="lib/mk.png" alt="">
        <nav>
           
            <div  class="shadowblockmenu">
            <ul >
            	<li> <a href="MainPage.php">Home</a>
                <li><a href="MainPage.php#about">About us</a></li>
                <li><a href="MainPage.php#contact">Feedback</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="SignUp.php">SignUp</a></li>
                <li><a href="Books.php">Books</a></li>
                <li><a href="Magazine.php">Magazines</a></li>
                <li><a href="Journal.php">Journals</a></li>
                <li><a href="Newspaper.php">Newspapper</a></li>
                  
                    </div>
                </div>
            </ul>
            </div>
        </nav> 

        <div id="header">
    
      	  
	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <table>
  	<caption style="color:#FFF; margin-top:2%">Sign Up Form: </caption>
 	 <tr class="lbtxt">
        <td>Type:</td>
		<td><input type="radio" name="type" value="User" onclick="Choose()"  />User</td>
		<td><input type="radio" name="type" value="Member" onclick="Choose()"/>Member</td>
     </tr>
    <tr id="user" class="lbtxt">
      <td>User Id:</td>
      <td><input type="text"  name="txid"  value="<?php echo $id; ?>"/></td>
    </tr>
    <tr id="member" class="lbtxt">
      <td>Member Id:</td>
      <td><input type="text"  name="txid" disabled="disabled"  value="<?php echo $id; ?>"/></td>
    </tr>
    <tr class="lbtxt">
      <td>Name:</td>
      <td><input type="text"  name="txnm"  value="<?php echo $name; ?>"/></td>
    </tr>
    <tr class="lbtxt">
      <td>Password:</td>
      <td><input type="password"  name="txpass"  value="<?php echo $password; ?>"/></td>
    </tr>
    <tr class="lbtxt">
      <td>Email:</td>
     <td><input type="email"  name="txemail"  value="<?php echo $email; ?>"/></td>
    </tr>
    <tr class="lbtxt">
      <td>Phone No:</td>
      <td><input type="text"  name="txphn"  value="<?php echo $phone; ?>"/></td>
    </tr>
     <tr>
         	<td><input class="button" type="submit" value="Submit" name="sbinsert" /></td>
       		<td><input class="button" type="reset" value="Cancel" name="sbcancel" /></td>
     </tr>
  </table>
</form>
</div>

</body>
</html>