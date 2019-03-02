<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>
	function Special(val)
	{
		Category();
		fillCat(val);
	}
		
	function Category()
	{
		if(document.getElementsByName('type').item(0).checked==true)
		{
			document.getElementById('Clas').style.visibility="hidden";
			document.getElementById('Cat').style.visibility="visible";
		}
		else if(document.getElementsByName('type').item(1).checked==true)
		{
			document.getElementById('Cat').style.visibility="hidden";
			document.getElementById('Clas').style.visibility="hidden";

		}
		else if(document.getElementsByName('type').item(2).checked==true)
		{
			document.getElementById('Cat').style.visibility="hidden";
			document.getElementById('Clas').style.visibility="hidden";
		}
		else if(document.getElementsByName('type').item(3).checked==true)
		{
			document.getElementById('Clas').style.visibility="visible";
			document.getElementById('Cat').style.visibility="visible";
		}
		
		else if(document.getElementsByName('type').item(4).checked==true)
		{
			document.getElementById('Clas').style.visibility="hidden";
			document.getElementById('Cat').style.visibility="visible";
		}
		else if(document.getElementsByName('type').item(5).checked==true)
		{
			document.getElementById('Clas').style.visibility="hidden";
			document.getElementById('Cat').style.visibility="visible";
		}
	}

var Novels=Array();
Novels[0]="Friction";
Novels[1]="Horror";
Novels[2]="Romance";
Novels[3]="Mystery";
Novels[4]="Thriller";
Novels[5]="Crime";
Novels[6]="Drama";


var Sports=Array();
Sports[0]="Cricket";
Sports[1]="BasketBall";
Sports[2]="Football";
Sports[3]="Hockey";
Sports[4]="Badmiton";
Sports[5]="Tennis";
Sports[6]="VoleyBall";

var Technology=Array();
Technology[0]="Artifical Inteligent";
Technology[1]="Big Data";
Technology[2]="Robotics";
Technology[3]="Nanotechnology";
Technology[4]="Genetics";

var Academics=Array();
Academics[0]="Science";
Academics[1]="Maths";
Academics[2]="English";
Academics[3]="Hindi";
Academics[4]="GK";

	function fillCat(val)
	{
		//alert(eval(val));
		var cb=document.getElementById('cbcat');
		cb.innerHTML='<option value="">Select Category</option>';
		for(var i=0;i<eval(val).length;i++)
		{
			cb.innerHTML+='<option value="'+eval(val)[i]+'">'+eval(val)[i]+'</option>'	;
		}
	
		
	}
</script>
</head>	

<body>

<?php
	$id=$name=$pg=$author=$publisher=$rate=$mode=$cost="";
	
	$con=mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_query($con,"create database if not exists LibraryDb") or die(mysql_error());
	mysqli_query($con,"use LibraryDb") or die(mysql_error());
	
	if(isset($_POST['type']))
	{
	
		$mode=$_POST['type'];
	
		
			$tbname=str_replace("-","_",$mode).'Tb';
//			echo $tbname;
		
		if($mode=="Novels"||$mode=="Technology"||$mode=="Sports")
		{
			mysqli_query($con,"create table if not exists ".$tbname."(Book_id varchar(255) ,  CoverPic varchar(255), name varchar(255), category varchar(255), author varchar(255),publisher varchar(255), rating int, cost varchar(255), Pdf varchar(255), NoPages int, primary key(Book_id))") or die(mysql_error());
		}
		
		else if($mode=="Science-fi"||$mode=="Humour")
		{
			mysqli_query($con,"create table if not exists ".$tbname."(Book_id varchar(255), CoverPic varchar(255), name varchar(255),author varchar(255),publisher varchar(255), rating int, cost varchar(255), Pdf varchar(255), NoPages int, primary key(Book_id))") or die(mysql_error());	
		}
		
		else if($mode="Academics")
		{
			mysqli_query($con,"create table if not exists ".$tbname."(Book_id varchar(255), CoverPic varchar(255), name varchar(255),category varchar(255), class varchar(255), author varchar(255),publisher varchar(255), rating int, cost varchar(255), Pdf varchar(255), NoPages int, primary key(Book_id))") or die(mysql_error());
		}
	}
	 if(isset($_POST['sbinsert']))
	{
			$mode=$_POST['type'];
				echo $mode;
		//	$id=$_POST['txid'];
			$name=$_POST['txnm'];
			$author=$_POST['txaut'];
			$publisher=$_POST['txpub'];
			//$rate=0;//$_POST['txrate'];
			$cost=$_POST['txcost'];
			$category=$_POST['cbcat'];
			$clas=$_POST['cbclas'];
			$pg=$_POST['txpg'];
			
			$tbname=str_replace("-","_",$mode).'Tb';
					echo $tbname;
		//$mode=$_POST['type'];
	
		
		//	$tbname=str_replace("-","_",$mode).'Tb';



		$rs=mysqli_query($con,"select count(*) from " .$tbname );
		$c=0; 
		while($row=mysqli_fetch_array($rs))
			$c=$row[0];
			
		$c=$c+1;
		$id=$mode."".$c;
			echo "$c";
			echo "$id";
		
		
		$imageNM=$_FILES['imagefile']['name'];
		$imageTmpNM=$_FILES['imagefile']['tmp_name'];
		//$imageNM=$_FILES['x']['name'];
		
		$pdfNM=$_FILES['pdffile']['name'];
		$pdfTmpNM=$_FILES['pdffile']['tmp_name'];
		
		if(is_uploaded_file($imageTmpNM)&& is_uploaded_file($pdfTmpNM))
		{
			if(!file_exists($mode))
				mkdir($mode);
			
		$imageNM=$mode."/".$imageNM;
		if(file_exists($imageNM))
		{
				echo "already existed...";
				return;
		}
		
		move_uploaded_file($imageTmpNM,$imageNM);
		
			if(!file_exists($mode.'Pdfs'))
				mkdir($mode."Pdfs");
			
		$pdfNM=$mode."Pdfs/".$pdfNM;
		if(file_exists($pdfNM))
		{
				echo "already existed...";
				return;
		}
		
		move_uploaded_file($pdfTmpNM,$pdfNM);
		
		$rs1=mysqli_query($con,"select rate from BookReviewTb");
		while($row=mysqli_fetch_array($rs1))
			$rate=$row[0];
		
		if($mode=="Novels"||$mode=="Technology"||$mode=="Sports")
		{
			
			mysqli_query($con,"insert into ".$tbname."(Book_id, CoverPic, name,category, author, publisher, rating, cost,Pdf, NoPages) values('$id','$imageNM','$name', '$category','$author', '$publisher', $rate, '$cost','$pdfNM',$pg)") or die(mysql_error());
		}
			else if($mode=="Science-fi"||$mode=="Humour")
		{
						mysqli_query($con,"insert into ".$tbname."(Book_id, CoverPic, name, author, publisher, rating, cost, Pdf, NoPages) values('$id','$imageNM','$name','$author','$publisher',$rate, '$cost', '$pdfNM', $pg)") or die(mysql_error());
		}
		else if($mode="Academics")
		{
			mysqli_query($con,"insert into ".$tbname."(Book_id, CoverPic, name, category, class, author, publisher, rating, cost, Pdf, NoPages) values('$id','$imageNM','$name','$category', '$clas','$author','$publisher',$rate, '$cost', '$pdfNM', $pg)") or die(mysql_error());	
		}
		}
	
		else 
			echo "can't be uploaded....";
	
	
	}
?>

<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	<table>
    	<tr>
        	<td>Type:</td>
				<td><input type="radio" name="type" value="Novels"  onclick="Special(this.value)" />Novels</td>
				<td><input type="radio" name="type" value="Science-fi" onclick="Special(this.value)"/>Science-fi</td>
                
                <td><input type="radio" name="type" value="Humour" onclick="Special(this.value)"/>Humour</td>
                
				<td><input id="Acad" type="radio" name="type" value="Academics" onclick="Special(this.value)" />Academics</td>
                
                <td><input type="radio" name="type" value="Technology"  onclick="Special(this.value)"/>Technology</td>
				<td><input type="radio" name="type" value="Sports"  onclick="Special(this.value)"/>Sports</td>
        </tr>
    	<tr>
        	<td>Book Id:</td>
	        <td><input type="text" disabled="disabled"  name="txid"  value="<?php echo $id; ?>"/></td>
        </tr>
        <tr>
        	<td><input type="file" name="imagefile" /></td>
        </tr>
        <tr>
        	<td>Book Name:</td>
            <td><input type="text"  name="txnm"  value="<?php echo $name; ?>"/></td>
        </tr>
        <tr>
        	<td>Author: </td>
        	<td><input type="text"  name="txaut"  value="<?php echo $author; ?>"/></td>
         </tr>
         <tr>
         	<td>Publisher: </td>
            <td><input type="text" name="txpub"  value="<?php echo $publisher; ?>" /></td>
         </tr>
         <tr id="Cat" style="visibility:visible">
         	<td>Category: </td>
            <td><select name="cbcat" id="cbcat" >
            	<option>Select Category</option>
              </select>
             </td>
         </tr>
         <tr id="Clas" style="visibility:hidden">
         	<td>Class:</td>
            <td><select name="cbclas">
            	<option>Select Category</option>
                 <option>8</option>
                 <option>9</option>
            	<option>10</option>
                <option>11</option>
                <option>12</option>
                <option>Btech</option>
                <option>BCA</option>
                <option>Barch</option>
                <option>BSc</option>
                <option>BA</option>
                <option>Mtech</option>
                <option>MCA</option>
                <option>March</option>
   				<option>MSc</option>
                <option>MA</option>
                <option>Phd</option>
              </select>
             </td>
         </tr>
         <tr>
         	<td>Ratings: </td>
            <td><input type="text" name="txrate"  value="<?php echo $rate; ?>" /></td>
             
         </tr>
         <tr>
         	<td>Cost: </td>
            <td><input type="text" name="txcost"  value="<?php echo $cost; ?>" /></td>
         </tr>
         <tr>
         	<td><input type="file" name="pdffile" /></td>
         </tr>
         <tr>
         	<td>No of Pages:</td>
            <td><input type="text" name="txpg" value="<?php echo $pg; ?>" /></td>
         </tr>
         <tr>
         	<td><input type="submit" value="Insert" name="sbinsert" /></td>
       		<td><input type="reset" value="Cancel" name="sbcancel" /></td>
         </tr>
     </table>
     
</form>
		
</body>
</html>