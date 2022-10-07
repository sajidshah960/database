
<html>

<head>
<title>Database Updation</title>
</head>
<body>
<hr>
<form action="" method="get">
			<table border="2">
			<tr>
				<td width="200" align="left"> Enter Employee Number:</td>
				<td width="200"><input type="text" name="empNO" value=""></td>
			</tr>
			
			</tr>
			<tr align="middle">
            <td colspan="2"><input type="submit" value="Search the record"></td>
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
      { echo "Oracle Connection Successful."; } 
   else 
      { die('Could not connect to Oracle: '); 
		}
///////////////////////////////////main code ///////////////////////////////////		

	 $empNO=$_GET['empNO'];

	$q="update emp set ename='".$_GET['empName']."',job='".$_GET['Job']."',mgr=".$_GET['Mgr'].",hiredate=TO_DATE('".$_GET['hireDate']."','dd/mm/yy'),sal=".$_GET['Sal'].",comm=".$_GET['Comm'].",deptno=".$_GET['deptNo']." where empno=".$_GET['empNo'];
	 echo $q;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $q2 = "select * from emp where empno = ".$empNO;
	 $query_id2 = oci_parse($con, $q2); 		
	 $r2 = oci_execute($query_id2); 
	 
	 
	 echo "<hr>";
	 echo "<br>";
	 echo "<hr>";

	 $row = oci_fetch_array($query_id2) ;
	 
	$empno = $row["EMPNO"];
	$ename = $row["ENAME"];
	$job = $row["JOB"];
	$mgr = $row["MGR"];
	$hiredate = $row["HIREDATE"];
	$sal = $row["SAL"];
	$comm = $row["COMM"];
	$deptno = $row["DEPTNO"];		
	 
?>

<body>
<hr>
<h2>Updated Data of Employee </h2><br>
<form action="" method="get">
			<table border="2">
			<tr>
				<td width="200" align="left">Employee#</td>
				<td width="200"><input type="text" name="empNo" value="<?php echo $empno ?>" readonly></td>
			</tr>
			<tr>
				<td width="200" align="left">Employee Name</td>
				<td width="200"><input type="text" name="empName" value="<?php echo $ename ?>"></td>
			</tr>	
			<tr>
				<td width="200" align="left">Job Title</td>
				<td width="200"><input type="text" name="Job" value="<?php echo $job ?>"></td>
			</tr>
			<tr>
				<td width="200" align="left">Manager ID</td>
				<td width="200"><input type="text" name="Mgr" value="<?php echo $mgr ?>"></td>
            </tr>
			<tr>
				<td width="200" align="left">Hire Date</td>
				<td width="200"><input type="text" name="hireDate" value="<?php echo $hiredate ?>"></td>
			</tr>
			<tr>
				<td width="200" align="left">Salary</td>
				<td width="200"><input type="text" name="Sal" value="<?php echo $sal ?>"></td>
			</tr>
			<tr>
				<td width="200" align="left">Commission</td>
				<td width="200"><input type="text" name="Comm" value="<?php echo $comm ?>"></td>
			</tr>
			<tr>
				<td width="200" align="left">Department No</td>
				<td width="200"><input type="text" name="deptNo" value="<?php echo $deptno ?>"></td>
			</tr>
			<tr align="middle">
            <td colspan="2"><input type="submit" value="Update the record"></td>
        </tr>
			</table>
</form>

</body>
</html>


