<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>

	function type()
	{
		if(document.getElementsByName('type').item(0).checked==true)
		{
			document.getElementsByClassName('type1').item(0).style="visible";
			document.getElementsByClassName('type1').item(1).style="visible";
			document.getElementById('type2').style="hidden";
			document.getElementById('type3').style="hidden";
		}
		else if(document.getElementsByName('type').item(1).checked==true)
		{
			document.getElementsByClassName('type1').item(0).style="hidden";
			document.getElementsByClassName('type1').item(1).style="hidden";
			document.getElementById('type2').style="visible";
			document.getElementById('type3').style="hidden";
		}
		else if(document.getElementsByName('type').item(2).checked==true)
		{
			document.getElementsByClassName('type1').item(0).style="hidden";
			document.getElementsByClassName('type1').item(1).style="hidden";
			document.getElementById('type2').style="hidden";
			document.getElementById('type3').style="visible";
		}	
	}

</script>
</head>

<body>
<?php
	$type=$frmdt=$todt=$month=$year="";
	
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
	
	
	if(isset($_POST['sbinsert']))
	{
	
	$imageNM=$_FILES['imagefile']['name'];
	$imageTmpNM=$_FILES['imagefile']['tmp_name'];
	
	$pdfNM=$_FILES['pdffile']['name'];
		$pdfTmpNM=$_FILES['pdffile']['tmp_name'];
	
	$name=$_POST['cbnm'];
		
	$tbname=str_replace(" ","_",$name).'Tb';	
	
	if(is_uploaded_file($imageTmpNM)&&is_uploaded_file($pdfTmpNM))
	{
		if(!file_exists('Journals'))
			mkdir("Journals");
			
		$imageNM="Journals/".$imageNM;
		
		if(file_exists($imageNM))
		{
				echo "already existed...";
				return;
		}
		
		move_uploaded_file($imageTmpNM,$imageNM);
		
			if(!file_exists('JournalPdfs'))
				mkdir("JournalPdfs");
			
		$pdfNM="JournalPdfs/".$pdfNM;
		if(file_exists($pdfNM))
		{
				echo "already existed...";
				return;
		}
		
		move_uploaded_file($pdfTmpNM,$pdfNM);
		
		if($type=="Weekly")
		{
			$field='From_Date date,To_date date';
			$field2='$_POST['+"txfrmdt"+'], $_POST['+"txtodt"+']';
			
		}
		else if($type=="Monthly")
		{
			$field='Month varchar(15)';
			$field2='$_POST['+"txmnt"+']';
		}
		
		else if($type=="Yearly")
		{
			$field='Year int';
			$field2='$_POST['+"txyr"+']';
		}

		
		mysqli_query($con,"insert into  ".$tbname."(coverPic,".$field.", pdf ) values('$imageNm', '$field2' , '$pdfNM') ") or die(mysql_error());
	
		}
	
	else 
		echo "can't be uploaded....";
	}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
 <table>
 	<tr>
        	<td>Type:</td>
				<td><input type="radio" name="type" value="Weekly" onclick="type()" />Weekly</td>
				<td><input type="radio" name="type" value="Monthly" onclick="type()"/>Monthly</td>
                <td><input type="radio" name="type" value="Yearly" onclick="type()"/>Yearly</td>
    </tr>
    <tr>
    	<td>Name of Journal: </td>
        <td><select name="cbnm">
        		<option>Select Name: </option>
                <?php
			
				$con=mysqli_connect("localhost","root","") or die(mysql_error());
				mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
				mysqli_query($con,"use LibraryDb") or die(mysql_error());
				
				if(isset($_POST['type']))
				{
					$type=$_POST['type'];
					$rs=mysqli_query($con,"select name from JournalTb where type= $type") or die(mysql_error());
						while($row=mysqli_fetch_array($rs))
						{
							$name=$row[0];
					echo "<option value=$name ";
					
				
					if($name==$cbnm)
						echo "selected='selected' "; 
						echo ">$name</option>";
						}
				}
				mysqli_close($con);
			?></select></td>
        </tr>
    <tr>
    	<td><input type="file" name="imagefile" /></td>
	</tr>
    <tr class="type1">
    	<td>From Date: </td>
        <td><input type="date" name="txfrmdt" value="<?php echo $frmdt; ?>" /></td>
    </tr>
    <tr class="type1">
        <td>To Date: </td>
        <td><input type="date" name="txtodt" value="<?php echo $todt; ?>" /></td>
    </tr>
    <tr id="type2">
    	<td>Month: </td>
        <td><input type="text" name="txmnt" value="<?php echo $month; ?>"  /></td>
    </tr>
    <tr id="type3">
    	<td>Year: </td>
        <td><input type="text" name="txyr" value="<?php echo $year; ?>"  /></td>
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