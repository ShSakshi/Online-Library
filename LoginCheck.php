<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	
	require("database.php");
		
	if(isset($_POST['sbsubmit']))
	{
		$id=$_POST['txid'];
		$pass=$_POST['txpass'];
		
		$rs=mysqli_query($con,"select count(*) from SignUpTb where signup_id='$id' and password='$pass'")or die(mysql_error());
		$c=0;
		while($row=mysqli_fetch_array($rs))
			$c=$row[0];
		
		if($c!=0)
		{
			
			$rs=mysqli_query($con,"select name from SignUpTb where SignUp_id='$id' and password='$pass'")or die(mysql_error());				
			while($row=mysqli_fetch_array($rs))
				$name=$row[0];
				
			$_SESSION['user']=$name;
			echo"<script>window.open('MainPage.php')</script>";
		}
		else
			echo"<script>alert('wrong username or password...');</script>";
}

		
?>
</body>
</html>