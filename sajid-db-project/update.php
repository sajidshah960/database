
<html>

<head>
<title>Database Updation</title>
</head>







<?php   

   $db_sid = 
   "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = sajidshah960)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = Sajid)
    )
  )";            
  
   $db_user = "scott";  
   $db_pass = "1234";   
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; } 
   else 
      { die('Could not connect to Oracle: '); 
		}
///////////////////////////////////main code ///////////////////////////////////		

if($_GET['studentid'])
{
	
	$studentid=$_GET['studentid'];

	$q="update student set name='".$_GET['name']."',dob='".$_GET['dob']."',gender='".$_GET['gender']."',class='".$_GET['class']."',section='".$_GET['section']."' where studentid=".$_GET['studentid'];
	 echo $q;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $q2 = "select * from student where studentid = ".$studentid."";
	 $query_id2 = oci_parse($con, $q2); 		
	 $r2 = oci_execute($query_id2); 
}
	 
	 echo "<hr>";
	 echo "<br>";
	 echo "<hr>";

	 $row = oci_fetch_array($query_id2) ;
	 
	$studentid = $row["STUDENTID"];
	$name = $row["NAME"];
	$dob = $row["DOB"];
	$gender = $row["GENDER"];
	$class = $row["CLASS"];
	$section = $row["SECTION"];
	
		
	 
?>

<style>

.header{
background-color: #008000;
color: white;
padding: 1%;
text-align:center;
}
</style>

<header class="header">
    <h1>UPDATE FORM<br><h4>Aviation School</h4></h1>
</header>

<body>
<hr>
<form action="" method="get">
			<table border="2" align="center">
			<tr>
				<td width="200" align="left"> Enter Student ID:</td>
				<td width="200"><input type="text" name="studentid" value=""></td>
			</tr>
			
			</tr>
			<tr align="middle">
            <td colspan="2"><input type="submit" value="SEARCH"></td>
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
				<td width="200" align="left">STUDENT-ID</td>
				<td width="200"><input type="text" name="studentid" value="<?php echo $studentid ?>" readonly></td>
			</tr>
			<tr>
				<td width="200" align="left">NAME</td>
				<td width="200"><input type="text" name="name" value="<?php echo $name ?>"></td>
			</tr>	
			<tr>
				<td width="200" align="left">GENDER</td>
				<td width="200"><input type="text" name="gender" value="<?php echo $gender ?>"></td>
			</tr>
			<tr>
				<td width="200" align="left">DATE OF BIRTH</td>
				<td width="200"><input type="text" name="dob" value="<?php echo $dob ?>"></td>
            </tr>
			<tr>
				<td width="200" align="left">CLASS</td>
				<td width="200"><input type="text" name="class" value="<?php echo $class ?>"></td>
			</tr>
			<tr>
				<td width="200" align="left">SECTION</td>
				<td width="200"><input type="text" name="section" value="<?php echo $section ?>"></td>
            </tr>
			<tr align="middle">
            <td colspan="2"><input type="submit" value="UPDATE"></td>
        </tr>
			</table>
</form>



</body>
</html>
