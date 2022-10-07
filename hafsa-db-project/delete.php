<html>
<head>
<title>Deletion from Database</title>
</head>

<style>

.header{
background-color: #DB7093;
color: white;
padding: 1%;
text-align:center;
}
</style>
<header class="header">
    <h1>HAMAREY BACHCHEY<BR>DELETE FORM<h1>
	</header>
<body>
<hr>
<form action="delete.php" method="get">
			<table border="2" align="center">
			<tr>
				<td width="200" align="left"> Enter Student ID:</td>
				<td width="200"><input type="text" name="rollNo" value=""></td>
			</tr>
			
			</tr>
			<tr align="middle">
            <td colspan="2"><input type="submit" value="Delete the record"></td>
        </tr>
		</table>
		</form>
</body>

<?php  


   $db_sid = 
   "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-1LQO6C5)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = orcl)))";           
  
   $db_user = "scott";   
   $db_pass = "1234";    
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful.<br>"; } 
   else 
      { die('Could not connect to Oracle: '); } 
  
     // Delete Data from Employee Table
	 
	 $q1="DELETE FROM registration_history WHERE rollno ='".$_GET['rollNo']."'";
	 $query_id1 = oci_parse($con, $q1); 		
	 $r1 = oci_execute($query_id1);
	 
	 $q2="DELETE FROM registration WHERE rollno ='".$_GET['rollNo']."'";
	 $query_id2 = oci_parse($con, $q2); 		
	 $r2 = oci_execute($query_id2);
	 
	 $q3="DELETE FROM student WHERE rollno ='".$_GET['rollNo']."'";
	 $query_id3 = oci_parse($con, $q3); 		
	 $r3 = oci_execute($query_id3);
	 
	 echo "<hr>";
	 

?>

</html>