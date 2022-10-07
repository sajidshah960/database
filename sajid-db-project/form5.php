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
        	
		$jobnum=$_POST["jobmenu"];  
	    $q1="select s.name SNAME,s.studentid SID,s.gender SGENDER,s.dob SDOB,s.class CLASS,
		f.address ADDRESS,f.name FNAME,f.phone FPHONE,m.name MNAME,m.phone MPHONE,g.name GNAME
		from student s,parent m,parent f,guardian g where 
		((s.f_cnic=".$jobnum." or s.m_cnic=".$jobnum.")and s.f_cnic=f.cnic and s.m_cnic=m.cnic and s.g_cnic=g.cnic)";

			$query_id1 = oci_parse($con, $q1);
        	$r1 = oci_execute($query_id1);	 
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
    <h1>HAMAREY BACHCHEY<BR>PARENT INFORMATION FORM</h1>
	</header>
	
    <p align="center">Please Search by Parent ID.</p>
    <hr>
	
   <form action="form5.php" method="post">
    <table border="01" align="center">
        
		
		<tr align="middle">
            <td colspan="2">Search Information</td>
        </tr>
        
		<tr>
						<td>Search:</td>
				<td><input type="text" name="jobmenu" placeholder="Enter Parent CNIC"/></td>
						
        </tr>	 		
		<tr align="middle">
            <td colspan="2"><input type="submit" name="show_dowpdown_value" value="submit"></td>
        </tr>
	</table>
</form>

<hr  />
<br  />

<h2 align="middle">List of all information</h2>

<table align="center">
<tr align="center">
	<th>Name</th>
	<th>ID</th>
	<th>Gender</th>
	<th>DOB</th>
	<th>Class</th>
	<th>Address</th>
	<th>Father Name</th>
	<th>Father Phone#</th>
	<th>Mother Name</th>
	<th>Mother Phone#</th>
	<th>Guardian Name</th>
</tr>


<?php while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['SNAME']; ?></td>
		<td align="center"><?php echo $row['SID']; ?> </td>
		<td align="center"><?php echo $row['SGENDER']; ?> </td>
		<td align="center"><?php echo $row['SDOB']; ?></td>
		<td align="center"><?php echo $row['CLASS']; ?></td>
		<td align="center"><?php echo $row['ADDRESS']; ?></td>
		<td align="center"><?php echo $row['FNAME']; ?> </td>
		<td align="center"><?php echo $row['FPHONE']; ?> </td>
		<td align="center"><?php echo $row['MNAME']; ?> </td>
		<td align="center"><?php echo $row['MPHONE']; ?> </td>
		<td align="center"><?php echo $row['GNAME']; ?> </td>	
	 <?php } ?>

	 </tr>
</table>
</body>
</html>


