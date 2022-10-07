<html>
<head>
<title>Deleteion from Database</title>
</head>

<body>
<hr>
<form action="" method="get">
			<table border="2">
			<tr>
				<td width="200" align="left"> Enter Employee Number:</td>
				<td width="200"><input type="text" name="empNo" value=""></td>
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
  
     // Delete Data from Employee Table
	 
	 $q="DELETE FROM emp WHERE empno =".$_GET['empNo'];
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id);
	 
		if($r)
		{
			echo " Record of the Employee <b><i>".$_GET['empNo']."</i></b> is Deleted";
		}
	 echo "<hr>";
	 

?>

</html>