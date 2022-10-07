<html>

<head>
<title>Database Insertion </title>
</head>

<body>
<form method="get">
<h2>Employee data</h2>

			<table border="2">
			<tr>
				<td width="200" align="left">Employee#</td>
				<td width="200"><input type="text" name="empNo" value=""></td>
			</tr>
			<tr>
				<td width="200" align="left">Employee Name</td>
				<td width="200"><input type="text" name="empName" value=""></td>
			</tr>	
			<tr>
				<td width="200" align="left">Job Title</td>
				<td width="200"><input type="text" name="job" value=""></td>
			</tr>
			<tr>
				<td width="200" align="left">Manager ID</td>
				<td width="200"><input type="text" name="mgr" value=""></td>
            </tr>
			<tr>
				<td width="200" align="left">Hire Date</td>
				<td width="200"><input type="text" name="hireDate" value=""></td>
			</tr>
			<tr>
				<td width="200" align="left">Salary</td>
				<td width="200"><input type="text" name="sal" value=""></td>
			</tr>
			<tr>
				<td width="200" align="left">Commission</td>
				<td width="200"><input type="text" name="comm" value=""></td>
			</tr>
			<tr>
				<td width="200" align="left">Department No</td>
				<td width="200"><input type="text" name="deptNo" value=""></td>
			</tr>
		
		
		<tr align="middle">
            <td colspan="2"><input type="submit" value="submit"></td>
        </tr>
	</table>
</form>
</body>
</html>

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
  
	$Name=$_GET['empName'];
	$Empno=$_GET['empNo'];
	$Job=$_GET['job'];
	$Hiredate=$_GET['hireDate'];
	$Mgr=$_GET['mgr'];
	$Commission=$_GET['comm'];
	$Salary=$_GET['sal'];
	$Deptno=$_GET['deptNo'];
	$q="insert into emp values(".$Empno.",'".$Name."','".$Job."',".$Mgr.",TO_DATE('".$Hiredate."','yyyy/mm/dd'),".$Salary.",".$Commission.",".$Deptno.")";
	$query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 

	 // Selected the Inserted Record and shows on the webpage 
	 if($r)
	 {
		 echo "Record inserted";
	 }
	 else
	 {
		 echo "Record not inserted!<br>";
		 $e = oci_error($query_id);  
		 echo $e['message'];
	 }
?>

