
<html>

<head>
<title>Database Updation</title>
</head>

<?php   


   $db_sid = 
   "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-1LQO6C5)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = orcl)))";            
  
   $db_user = "scott";  
   $db_pass = "1234";   
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; } 
   else 
      { die('Could not connect to Oracle: '); 
		}
///////////////////////////////////main code ///////////////////////////////////		

	 $rollNO=$_GET['rollNO'];

	$q="update student set sname='".$_GET['SName']."',age='".$_GET['Age']."',gender='".$_GET['Gender']."' where rollno=".$_GET['rollNo'];
	 echo $q;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $q2 = "select * from student where rollno = ".$rollNO;
	 $query_id2 = oci_parse($con, $q2); 		
	 $r2 = oci_execute($query_id2); 
	 
	 
	 echo "<hr>";
	 echo "<br>";
	 echo "<hr>";

	 $row = oci_fetch_array($query_id2) ;
	 
	$rollno = $row["ROLLNO"];
	$sname = $row["SNAME"];
	$age = $row["AGE"];
	$gender = $row["GENDER"];
		
	 
?>
<style>

.header{
background-color: #DB7093;
color: white;
padding: 1%;
text-align:center;
}
</style>
<header class="header">
    <h1>HAMAREY BACHCHEY<BR>UPDATE FORM<h1>
	</header>

<body>
<hr>
<form action="" method="get">
			<table border="2" align="center">
			<tr>
				<td width="200" align="left"> Enter Student ID:</td>
				<td width="200"><input type="text" name="rollNO" value=""></td>
			</tr>
			
			</tr>
			<tr align="middle">
            <td colspan="2"><input type="submit" value="Search the record"></td>
        </tr>
		</table>
		</form>
</body>

<body>
<hr>
<h2 align="center">Updated Data of Student </h2><br>
<form action="" method="get">
			<table border="2" align="center">
			<tr>
				<td width="200" align="left">RollNo#</td>
				<td width="200"><input type="text" name="rollNo" value="<?php echo $rollno ?>" readonly></td>
			</tr>
			<tr>
				<td width="200" align="left">Name</td>
				<td width="200"><input type="text" name="SName" value="<?php echo $sname ?>"></td>
			</tr>	
			<tr>
				<td width="200" align="left">Age</td>
				<td width="200"><input type="text" name="Age" value="<?php echo $age ?>"></td>
			</tr>
			<tr>
				<td width="200" align="left">Gender</td>
				<td width="200"><input type="text" name="Gender" value="<?php echo $gender ?>"></td>
            </tr>
			
			<tr align="middle">
            <td colspan="2"><input type="submit" value="Update the record"></td>
        </tr>
			</table>
</form>

</body>
</html>


