<html> 
<body>
<?php 
// example 2.1 ..creating a database connection 
$db_sid = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-1LQO6C5)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = orcl)))"; 
  
$db_user = "scott";
$db_pass = "1234"; 
 
$con = oci_connect($db_user,$db_pass,$db_sid);
 if($con) 
{ 
	echo "connection successful.";
} 
else 
{ 
	die('Could not connect:');
} 
 ///////////////////////////////////////////////////////////
        
	

	
	$q1 = "select DISTINCT s.rollno,s.sname,s.age,s.gender from student s,registration r where s.rollno=r.rollno and (s.age>=3 and s.age<5)";
	$query_id1 = oci_parse($con, $q1); 		
	$r1 = oci_execute($query_id1);

$q2 = "select DISTINCT s.rollno,s.sname,s.age,s.gender from student s,registration r where s.rollno=r.rollno and (s.age>=5 and s.age<7)";
	$query_id2 = oci_parse($con, $q2); 		
	$r2 = oci_execute($query_id2);

$q3 = "select DISTINCT s.rollno,s.sname,s.age,s.gender from student s,registration r where s.rollno=r.rollno and (s.age>=7 and s.age<9)";
	$query_id3= oci_parse($con, $q3); 		
	$r3 = oci_execute($query_id3);

$q4 = "select DISTINCT s.rollno,s.sname,s.age,s.gender from student s,registration r where s.rollno=r.rollno and (s.age>=9 and s.age<11)";
	$query_id4 = oci_parse($con, $q4); 		
	$r4 = oci_execute($query_id4);

$q5 = "select DISTINCT s.rollno,s.sname,s.age,s.gender from student s,registration r where s.rollno=r.rollno and (s.age>=11 and s.age<13)";
	$query_id5 = oci_parse($con, $q5); 		
	$r5 = oci_execute($query_id5);

    $q6 = "select DISTINCT s.rollno,s.sname,s.age,s.gender from student s,registration r where s.rollno=r.rollno and (s.age>=13 and s.age<15)";
	$query_id6 = oci_parse($con, $q6); 		
	$r6 = oci_execute($query_id6);	
	///////////////////////////////////////
	
	
		$jobnum=strtoupper($_POST["jobmenu"]);

      $sql_select="select * from student where (ROLLNO= '".$jobnum."')";

			$query_id7 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id7);
			

	 
?>
<style>

table,tr,th,td{
border:1px solid black;
border-collapse:collapse;
align=middle;

}

.header{
background-color: #DB7093;
color: white;
padding: 1%;
text-align:center;
}


</style>
<header class="header">
    <h1>HAMAREY BACHCHEY<BR>STUDENT PER CLASS FORM</h1>
	</header>
    <p align="center">Please Search by Student ID.</p>
	<a href="admission.php"><button  type="submit" value="ADD+" align="center">ADD+</button></a>
	
    <hr>
	<br>

<form action="query1.php" method="post">
    <table border="01" align="center">
        
		
		<tr align="middle">
            <td colspan="2">Search Information</td>
        </tr>
        
		<tr>
						<td>Search:</td>
				<td><input type="text" name="jobmenu" placeholder="enter ID"/></td>
						
        </tr>	 		
		<tr align="middle">
            <td colspan="2"><input type="submit" name="show_dowpdown_value" value="submit"></td>
        </tr>
	</table>
</form>

<hr  />
<br  />

<table align="center">
<tr>
<h3 align="center">Search Result</h3>
</tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age(yrs)</th>
<th>Gender</th>
<th>Update</th>
<th>Delete</th>
</tr>
<tr>
<?while($row = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
				<td align="center"><?php echo $row['ROLLNO']; ?></td>
		<td align="center"><?php echo $row['SNAME']; ?> </td>
		<td align="center"><?php echo $row['AGE']; ?></td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
		<td><a href="update.php">UPDATE</a></td>
<td><a href="delete.php">DELETE</a></td>
	 <?php } ?>
	 </table>
	 

<h2 align="center">Listing All Students</h2>


<table align="center">
<tr>
<h3 align="center">Class 1A</h3>
</tr>

<tr>
<th>ID</th>
<th>Name</th>
<th>Age(yrs)</th>
<th>Gender</th>
<th>Update</th>
<th>Delete</th>

</tr>

<tr>

<?php while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['ROLLNO']; ?></td>
		<td align="center"><?php echo $row['SNAME']; ?> </td>
		<td align="center"><?php echo $row['AGE']; ?></td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
		<td><a href="update.php">UPDATE</a></td>
<td><a href="delete.php">DELETE</a></td>

<?php }?>

</table>






<table align="center">
<tr>
<h3 align="center">Class 2A</h3>
</tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age(yrs)</th>
<th>Gender</th>
<th>Update</th>
<th>Delete</th>
</tr>
<tr>

<?php while($row = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['ROLLNO']; ?></td>
		<td align="center"><?php echo $row['SNAME']; ?> </td>
		<td align="center"><?php echo $row['AGE']; ?></td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
<td><a href="update.php">UPDATE</a></td>
<td><a href="delete.php">DELETE</a></td>
<?php }?>
</table>

<table align="center">
<tr>
<h3 align="center">Class 3A</h3>
</tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age(yrs)</th>
<th>Gender</th>
<th>Update</th>
<th>Delete</th>
</tr>
<tr>
<?php while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['ROLLNO']; ?></td>
		<td align="center"><?php echo $row['SNAME']; ?> </td>
		<td align="center"><?php echo $row['AGE']; ?></td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
		<td><a href="update.php">UPDATE</a></td>
<td><a href="delete.php">DELETE</a></td>
<?php }?>
</table>

<table align="center">
<tr>
<h3 align="center">Class 4A</h3>
</tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age(yrs)</th>
<th>Gender</th>
<th>Update</th>
<th>Delete</th>
</tr>
<tr>
<?php while($row = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['ROLLNO']; ?></td>
		<td align="center"><?php echo $row['SNAME']; ?> </td>
		<td align="center"><?php echo $row['AGE']; ?></td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
		<td><a href="update.php">UPDATE</a></td>
<td><a href="delete.php">DELETE</a></td>
<?php }?>
</table>

<table align="center">
<tr>
<h3 align="center">Class 5A</h3>
</tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age(yrs)</th>
<th>Gender</th>
<th>Update</th>
<th>Delete</th>
</tr>
<tr>
<?php while($row = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['ROLLNO']; ?></td>
		<td align="center"><?php echo $row['SNAME']; ?> </td>
		<td align="center"><?php echo $row['AGE']; ?></td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
		<td><a href="update.php">UPDATE</a></td>
<td><a href="delete.php">DELETE</a></td>
<?php }?>
</table>

<table align="center">
<tr>
<h3 align="center">Class 6A</h3>
</tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age(yrs)</th>
<th>Gender</th>
<th>Update</th>
<th>Delete</th>
</tr>
<tr>
<?php while($row = oci_fetch_array($query_id6, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['ROLLNO']; ?></td>
		<td align="center"><?php echo $row['SNAME']; ?> </td>
		<td align="center"><?php echo $row['AGE']; ?></td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
<td><a href="update.php">UPDATE</a></td>
<td><a href="delete.php">DELETE</a></td>
<?php }?>
</table>



	 
</body>
</html>