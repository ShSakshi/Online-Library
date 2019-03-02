<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	
	$name=$id=$type=$category=$publisher=$page=$cost="";
	
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
	
	mysqli_query($con,"create table if not exists MagazineTb(Mag_id varchar(255), name varchar(255),type varchar(255), category varchar(255), publisher varchar(255), NoOfPages int,cost varchar(255),primary key(Mag_id))") or die(mysql_error());
	
		$rs=mysqli_query($con,"select count(*) from MagazineTb ");
		$c=0; 
		while($row=mysqli_fetch_array($rs))
			$c=$row[0];
			
		$c=$c+1;
		$id='Mg'.$c;
	
	
	if(isset($_POST['sbinsert']))
	{
		$id=$_POST['txid'];
		$name=$_POST['txnm'];
		$type=$_POST['type'];
		$category=$_POST['category'];
		$publisher=$_POST['txpub'];
		$page=$_POST['txpg'];
		$cost=$_POST['txcost'];
		
		
		mysqli_query($con,"insert into MagazineTb(Mag_id, name, type, category, publisher, NoOfPages, cost) values('$id','$name','$type','$category','$publisher',$page, '$cost')") or die(mysql_error());

		$tbname=str_replace(" ","_",$name).'Tb';
			echo $tbname;
		if($type=="Weekly")
		{
			$field='From_Date date,To_date date';
			
			
		}
		else if($type=="Monthly")
		{
			$field='Month varchar(15)';
		}
		
		else if($type=="Yearly")
		{
			$field='Year int';
		}

		echo $field;
	
		mysqli_query($con,"create table if not exists ".$tbname."(coverPic varchar(255),".$field.", pdf varchar(255) )") or die(mysql_error());
	
	
	}

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Magazine Id:</td>
      <td><input type="text"  name="txid"  value="<?php echo $id; ?>"/></td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><input type="text"  name="txnm"  value="<?php echo $name; ?>"/></td>
    </tr>
    <tr>
      <td>Type:</td>
      <td><input type="radio" name="type" value="Weekly"/>
        Weekly</td>
      <td><input type="radio" name="type" value="Monthly"/>
        Monthly</td>
      <td><input type="radio" name="type" value="Yearly"/>
        Yearly</td>
     </tr>
     <tr>
      <td>Category</td>
      <td><select name="category" >
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
             </td>
     </tr>
     <tr>
	    <td>Publisher</td>
        <td><input type="text" name="txpub"  value="<?php echo $publisher; ?>" /></td>
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