<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Books Corner</title>
    <link href="LibMainCss.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="menu.css">
    <link href="Basic.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="lib/icn.png" />
<style>

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
</style>

</head>

<body id="start">
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
                <li>    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" ><input id="out" type="submit" name="sblogout" value="" /></form></li>
             </ul>     
           </div>
         </nav> 

<?php
$msg=$name=$email="";
require("common.php");
//if($_SESSION['user']=="")
if(!isset($_SESSION['user']))
{
	echo "<script>alert('First Login your Account'); unlog(); </script>";
	
}
else
{
	echo "<div id='welDiv' style='font-family:font-family:Courier New, Courier, monospace; font-size:24px; font-variant:small-caps; font-weight:900; color:#F00' >Welcome ".$_SESSION['user'] . "</div>";
	echo "<script>alert(".$_SESSION['user'].");</script><br/><br/><br/>";
	$name=$email=$msg="";
	 
	 echo "<script>logg();</script>";
	require("database.php");
	if(isset($_POST['sbsubmit']))
	{
		$name=$_POST['txnm'];	
		$email=$_POST['txemail'];
		$msg=$_POST['txmsg'];
		
		mysqli_query($con,"insert into FeedbackTb(name,email,comment) values('$name','$email','$msg')") or  die(mysql_error());
		mysqli_close($con);
	}
	
	}
	
	   	if(isset($_POST['sblogout']))
		{
				echo "<script>alert('Logout'); unlog(); </script>";
		//	echo "welcome ".$_SESSION['user'];
			
			session_unset(); //$_SESSION['user']="";
			session_destroy();
			echo "<script>welDiv.innerHTML='';</script>";
			//echo "welcome ".$_SESSION['user'];

		}

?>
    

        <div id="header">
      	  
	<div id="span1">ONLINE BOOK LIBRARY
        <br />
        Powerful Component Of Digital Library
        </div>
		
        </div>
        <div style="width:85%; margin-left:10%">
        	    <a href="TopFeatured.php"><div  class="cl" align="center" style="background-image:url(lib/im.jpg);">
                <h1>Top Featured</h1>
            </div></a>
            <a href="Newspaper.php"><div class="cl" align="center" style="background-image:url(lib/b.jpg)">
               <span><h1>NewsPaper</h1></span>
            </div></a>
            <a href="Magzine.php"><div class="cl" align="center" style="background-image:url(lib/d.jpg)">
                <span><h1>Magzine</h1></span>
            </div></a>
            <br/>
            <a href="LatestRealease.php"><div class="cl"  align="center" style="background-image:url(lib/lib.jpg)">
                <span><h1>Latest Release</h1></span>
            </div></a>
            <a href="Journals.php"><div class="cl" align="center" style=" background-image:url(lib/a.jpg)">
                <span><h1>Journals</h1></span>
            </div></a>
            <a href="Books.php"><div class="cl" align="center" style="background-image:url(lib/f.jpg)">
                <span><h1>Gemes of everytime</h1></span>
            </div></a>
</div>


        <div id="about" style="margin-top:5%">
            <h1 align="center" style="font-style:italic; font-family:'Courier New', Courier, monospace; font-variant:small-caps; font-size:50px; font-weight:800; text-shadow:2px 2px 2px #999999">About us</h1>
                <div class="column">
                    <img src="lib/kn.jpg" />
                </div>
                <div class="column">
                    <div class="vl" style="padding-left: 20px;">
                        <p>This is a Online Library, in which each n everyone will be able to read books according to their interest just only by Loging In. It a wide range collections of books, newspapers, journals, magazines, etc., having a great collection in varities in it. It also give platforms to the user if they want to issue their books on the website by just only Logining In Membership Form. </p>
                    </div>

                </div>
            </div>
    

        <div id="contact" style="margin-top:5%">
            <div >
                <div class="column">
                    <img src="lib/co.jpg"  />
                </div>
                <div class="column">
                    <div class="vl" style="padding-left: 20px;">
                    <div class="vll">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                            <table align="center" ; width="50%" ; height="auto" ; style="margin-top:2%">
                                <caption>
                                    <h2 style=" text-shadow:2px 2px 2px #999999; font-variant:small-caps">Feedback: </h2>
                                </caption>
                                <tbody>
                                    <tr class="lbtxt">
                                        <td>Name:</td>
                                        <td><input type="text" name="txnm" value="<?php echo $name; ?>" /></td>
                                    </tr>
                                    <tr><td><br /></td>
                                    </tr>
                            
                                    <tr class="lbtxt">
                                        <td>Email:</td>
                                        <td><input type="text" name="txemail" value="<?php echo $email; ?>" /></td>
                                    </tr>
                                    <tr><td><br/></td>
                                    </tr>
                                    <tr class="lbtxt">
                                        <td>Message:</td>
                                        <td> <textarea name="txmsg" cols="30" rows="7" ><?php echo $msg;?></textarea></td>
                                    </tr>
                                    <tr><td><br/></td>
                                    </tr>
                                    <tr>
                                        <td><input class="button" type="submit" value="Submit" name="sbsubmit" /></td>
                                        <td><input class="button" type="submit" value="Cancel" name="sbcancel" onclick="" style="margin-left:35%" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

   </div>

</body>

</html>