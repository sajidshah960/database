<html>
<head>
	<title>Deletion from Database</title>
</head>

<style>
.header{
background-color: #008000;
color: white;
padding: 1%;
text-align:center;
}
</style>

<header class="header">
    <h1>DELETE FORM<br><h4>Aviation School</h4></h1>
	</header>
<body>
<hr>
<form action="delete.php" method="get">
			<table border="2" align="center">
			<tr>
				<td width="200" align="left"> Enter Student ID:</td>
				<td width="200"><input type="text" name="studentid" value=""></td>
			</tr>
			
			</tr>
			<tr align="middle">
            <td colspan="2"><input type="submit" value="DELETE"></td>
        </tr>
		</table>
		</form>
</body>

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
      { echo "Oracle Connection Successful.<br>"; } 
   else 
      { die('Could not connect to Oracle: '); } 
  
    
	if ($_GET['studentid']){
	
	
	$q1="DELETE FROM sec_history WHERE studentid ='".$_GET['studentid']."'";
	$query_id1 = oci_parse($con, $q1); 		
	$r1 = oci_execute($query_id1);
	
	$q2="DELETE FROM accompany WHERE studentid ='".$_GET['studentid']."'";
	$query_id2 = oci_parse($con, $q2); 		
	$r2 = oci_execute($query_id2);
	
	$q3="DELETE FROM course_history WHERE studentid ='".$_GET['studentid']."'";
	$query_id3 = oci_parse($con, $q3); 		
	$r3 = oci_execute($query_id3);
	
	
	$q4="DELETE FROM photo_record WHERE studentid ='".$_GET['studentid']."'";
	$query_id4 = oci_parse($con, $q4); 		
	$r4 = oci_execute($query_id4);

	
	$q5="DELETE FROM course_reg WHERE studentid ='".$_GET['studentid']."'";
	$query_id5 = oci_parse($con, $q5); 		
	$r5 = oci_execute($query_id5);
	 
	
	$q6="DELETE FROM student WHERE studentid ='".$_GET['studentid']."'";
	$query_id6 = oci_parse($con, $q6); 		
	$r6 = oci_execute($query_id6);
	if($r6){
		echo "Record Deleted if Found.";
	}
	}
	
	
	 

?>

</html>