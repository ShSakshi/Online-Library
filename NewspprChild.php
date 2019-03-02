<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$cbnm=$dt=$name=$id=$city="";
	$dt=date("y-m-d");

	$tbname=str_replace(" ","_",$name).'Tb';	
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
	
	
		
	if(isset($_POST['sbinsert']))
	{
		$name=$_POST['cbnm'];
		$tbname=str_replace(" ","_",$name).'Tb';	
		$pdfNM=$_FILES['pdffile']['name'];
		$pdfTmpNM=$_FILES['pdffile']['tmp_name'];
		$city=$_POST['cbcity'];
		echo $tbname;
	$rs=mysqli_query($con,"select count(*) from " .$tbname );
		$c=0; 
		while($row=mysqli_fetch_array($rs))
			$c=$row[0];
			
		$c=$c+1;
		$id=str_replace("-","_",$dt).$city.$c;
		
		if(is_uploaded_file($pdfTmpNM))
		{
			if(!file_exists('NewspprPdfs'))
				mkdir("NewspprPdfs");
			
		$pdfNM="NewspprPdfs/".$pdfNM;
		if(file_exists($pdfNM))
		{ 
				echo "already existed...";
				return;
		}
		
		move_uploaded_file($pdfTmpNM,$pdfNM);
		
		mysqli_query($con,"insert into  ".$tbname."(News_id,city, Today_date, Pdf) values('$id', '$city', '$dt', '$pdfNM')") or die(mysql_error());
		}
		else 
			echo "can't be uploaded....";
	
	}

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
 <table>
 	<tr>
		<td>Name of Newspaper: </td>
        <td><select name="cbnm">
        		<option>Select Name: </option>
                <?php
			
				$con=mysqli_connect("localhost","root","") or die(mysql_error());
				mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
				mysqli_query($con,"use LibraryDb") or die(mysql_error());
				
					$rs=mysqli_query($con,"select name from NewspprTb") or die(mysql_error());
						while($row=mysqli_fetch_array($rs))
						{
							$name=$row[0];
					echo "<option value='$name' ";
					
				
					if($name==$cbnm)
						echo "selected='selected' "; 
						echo ">$name</option>";
						}
				
				mysqli_close($con);
			?></select></td>
    </tr>
    <tr>
    	<td>City Id: </td>
        <td><input type="text" disabled="disabled" name="txid" value="<?php echo $id; ?>" /></td>
    </tr>
    <tr>
    	<td>City: </td>
        <td><select name="cbcity">
        	<option>Delhi</option>
            <option>Mumbai</option>
            <option>Kolkate</option>
            <option>Chennai</option>
            <option>Jaipur</option>
            <option>Chandigardh</option>
            </select>
        </td>
     </tr> 
    <tr>
    	<td>Today Date: </td>
        <td><input type="date"  name="txdt" value="<?php echo $dt; ?>" /></td>
	</tr>
    <tr>
    	<td><input type="file" name="pdffile" /></td>
    </tr>
    <tr>
    	<td><input type="submit" value="Insert" name="sbinsert" /></td>
       	<td><input type="reset" value="Cancel" name="sbcancel" /></td>
     </tr>
    
  </table>
</form>
</body>
</html>