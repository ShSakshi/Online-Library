
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#out{
	background-image:url(lib/out.jpg);
	background-size:cover;
	float:right;
	width:40px;
	height:40px;
	cursor:pointer;	
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

</style>
</head>

<body>
       <script>
       	function unlog()
		{
			document.getElementById('books').href="";
			document.getElementById('journal').href="";
			document.getElementById('magazine').href="";
			document.getElementById('newspaper').href="";
		}
		
		function logg()
		{
			document.getElementById('books').href="Books.php";
			document.getElementById('journal').href="Journal.php";
			document.getElementById('magazine').href="Magazine.php";
			document.getElementById('newspaper').href="Newspaper.php";
		}
       </script>
       

</body>
</html>