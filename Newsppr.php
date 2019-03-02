<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	
	$name=$lang=$page=$cost="";
	
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
	
	mysqli_query($con,"create table if not exists NewspprTb(Logo varchar(255), name varchar(255), Language varchar(255), NoOfPages int, cost varchar(255))") or die(mysql_error());	
	
	if(isset($_POST['sbinsert']))
	{
		//$id=$_POST['txid'];
		$name=$_POST['txnm'];
		$lang=$_POST['lang'];
		$page=$_POST['txpg'];
		$cost=$_POST['txcost'];
		
		$imageNM=$_FILES['imagefile']['name'];
		$imageTmpNM=$_FILES['imagefile']['tmp_name'];

		
		if(is_uploaded_file($imageTmpNM))
		{
			if(!file_exists('Newspaper'))
				mkdir("Newspaper");
			
			$imageNM="Newspaper/".$imageNM;
			if(file_exists($imageNM))
			{
				echo "already existed...";
				return;
			}
			
			move_uploaded_file($imageTmpNM,$imageNM);
	
		
		
		mysqli_query($con,"insert into NewspprTb(logo,name,Language,NoOfPages,cost) values('$imageNM' ,'$name','$lang',$page, '$cost')") or die(mysql_error());


		$tbname=str_replace(" ","_",$name).'Tb';
		
		mysqli_query($con,"create table if not exists ".$tbname."(News_id varchar(255), city varchar(255), Today_date date, Pdf varchar(255), primary key(News_id))") or die(mysql_error());
	}
		else 
			echo "can't be uploaded....";
	
	}

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
  <table>
  <tr>
  		<td><input type="file" name="imagefile" /></td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><input type="text"  name="txnm"  value="<?php echo $name; ?>"/></td>
    </tr>
    <tr>
      <td>Language:</td>
      <td><select name="lang" >
            	<option>Select Language</option>
                 <option>English</option>
                 <option>Hindi</option>
            	<option>Punjabi</option>
                <option>Gujarati</option>
                <option>Kannada</option>
                <option>Malayalam</option>
                <option>Marathi</option>
             </select>
       </td>
     </tr>
     <tr>
     	<td>No Of Pages</td>
        <td><input type="text" name="txpg" value="<?php echo $page; ?>" /></td>
     </tr>
     <tr>
     	<td>Cost:</td>
        <td><input type="text" name="txcost" value="<?php echo $cost; ?>" /></td>
     </tr>
      <tr>
         	<td><input type="submit" value="Insert" name="sbinsert" /></td>
       		<td><input type="reset" value="Cancel" name="sbcancel" /></td>
     </tr>
    
  </table>
</form>
</body>
</html>