<html> 
<body>
<?php 
// example 2.1 ..creating a database connection 
$db_sid = "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = sajidshah960 )(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = Sajid)
    )
	)"; 
  
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
        
	

	
	$q1 = "select studentid,name,gender,dob from student  where (class=1) and (section='A')";
	$query_id1 = oci_parse($con, $q1); 		
	$r1 = oci_execute($query_id1);
	
	$q2 = "select studentid,name,gender,dob from student  where (class=1) and (section='B')";
	$query_id2 = oci_parse($con, $q2); 		
	$r2 = oci_execute($query_id2);
	
	$q3 = "select studentid,name,gender,dob from student  where (class=2) and (section='A')";
	$query_id3 = oci_parse($con, $q3); 		
	$r3 = oci_execute($query_id3);
	
	$q4 = "select studentid,name,gender,dob from student  where (class=2) and (section='B')";
	$query_id4 = oci_parse($con, $q4); 		
	$r4 = oci_execute($query_id4);
	
	$q5 = "select studentid,name,gender,dob from student  where (class=3) and (section='A')";
	$query_id5 = oci_parse($con, $q5); 		
	$r5 = oci_execute($query_id5);
	
	$q6 = "select studentid,name,gender,dob from student  where (class=4) and (section='A')";
	$query_id6 = oci_parse($con, $q6); 		
	$r6 = oci_execute($query_id6);
	
	$q7 = "select studentid,name,gender,dob from student  where (class=4) and (section='B')";
	$query_id7 = oci_parse($con, $q7); 		
	$r7 = oci_execute($query_id7);
	
	$q8 = "select studentid,name,gender,dob from student  where (class=4) and (section='C')";
	$query_id8 = oci_parse($con, $q8); 		
	$r8 = oci_execute($query_id8);
	
	$q9 = "select studentid,name,gender,dob from student  where (class=5) and (section='A')";
	$query_id9 = oci_parse($con, $q9); 		
	$r9 = oci_execute($query_id9);
	
	$q10 = "select studentid,name,gender,dob from student  where (class=6) and (section='A')";
	$query_id10 = oci_parse($con, $q10); 		
	$r10 = oci_execute($query_id10);
	
	$q11 = "select studentid,name,gender,dob from student  where (class=6) and (section='B')";
	$query_id11 = oci_parse($con, $q11); 		
	$r11 = oci_execute($query_id11);
	
	$q12 = "select studentid,name,gender,dob from student  where (class=7) and (section='A')";
	$query_id12 = oci_parse($con, $q12); 		
	$r12 = oci_execute($query_id12);
	
	$q13 = "select studentid,name,gender,dob from student  where (class=7) and (section='B')";
	$query_id13 = oci_parse($con, $q13); 		
	$r13 = oci_execute($query_id13);
	
	
	

		$studentid=$_POST["stdid"];

		$sql_select="select * from student where (STUDENTID= '".$studentid."')";

			$query_id14 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id14);

			

	 
?>

<style>
table,tr,th,td{
border:1px solid black;
border-collapse:collapse;
align=middle;

}

.header{
background-color: #008000;
color: white;
padding: 1%;
text-align:center;
}
</style>


<header class="header">
    <h1>STUDENT INFO CLASS FORM<br><h4>Aviation School</h4></h1>
</header>
	<hr>
	
	<a href="registration.php"><button  type="submit" value="ADD" align="middle">ADD+</button></a>
	<a href="update.php"><button  type="submit" value="UPDATE" align="middle">UPDATE</button></a>
	<a href="delete.php"><button  type="submit" value="DELETE" align="middle">DELETE</button></a>
	
    <hr>
	<br>

<form action="form1.php" method="post">
    <table border="01" align="center">
		<tr align="middle">
            <th colspan="2">Search a Student</th>
        </tr>
		<tr>
				<td>Enter ID:</td>
				<td><input type="text" name="stdid" placeholder="Enter Student ID"/></td>			
        </tr>
		<tr align="middle">
            <td colspan="2"><input type="submit" name="show_dowpdown_value" value="search"></td>
        </tr>
	</table>
</form>


<table align="center" border="2 px">

<tr>
	<h3 align="center">Searched Information</h3>
</tr>

<tr>
	<th>StudentID</th>
	<th>Name</th>
	<th>GENDER</th>
	<th>DATE OF BIRTH</th>
</tr>

<?while($row = oci_fetch_array($query_id14, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	 <?php } ?>
</table>
	 
 
<h2 align="center">Students Per Class</h2>
<hr  />


<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 1A</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>
	 

<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 1B</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>

<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 2A</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>

<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 2B</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>

<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 3A</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>


<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 4A</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id6, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>


<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 4B</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>


<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 4C</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id8, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>


<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 5A</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id9, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>



<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 6A</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id10, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>


<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 6B</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id11, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>


<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 7A</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id12, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>


<table align="center" border="2 px">

<tr>
<h3 align="center">CLASS 7B</h3>
</tr>

<tr>
<th>StudentID</th>
<th>Name</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
</tr>

<?php while($row = oci_fetch_array($query_id13, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['STUDENTID']; ?></td>
		<td align="center"><?php echo $row['NAME']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?></td>
		<td align="center"><?php echo $row['DOB']; ?> </td>
	<?php } ?>
	</tr>
</table>

	 
</body>
</html>