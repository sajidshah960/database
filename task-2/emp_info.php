
<head>
<title>Lab 12 Task 3 </title>
</head>


<?php  // creating a database connection 
$db_sid = "(DESCRIPTION =
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
      { echo "Oracle Connection Successful."; 
		} 
   else 
		{ 
			die('Could not connect to Oracle: '); 
		} 
	  
	  //////////////MAIN CODE/////////////////
	  
		$deptnum=$_POST["deptmenu"];
		$jobnum=strtoupper($_POST["jobmenu"]);

      $sql_select="select * from emp where deptno=$deptnum and job= '".$jobnum."' " ;

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
			echo "<br>";

	 while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { 
		echo $row['EMPNO']."  ".$row['DEPTNO']."  ".$row['ENAME']."  ".$row['SAL']."  ".$row['MGR']."  ".$row['JOB']."  ".$row['HIREDATE']."  ".$row['COMM']."<br>"; 
	 } 
?>

