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
        
			$jobnum=strtoupper($_POST["jobmenu"]);

            $sql_select1="select s.name SNAME,s.studentid SID,s.gender SGENDER,s.dob SDOB,f.address ADDRESS,f.name FNAME,f.phone FPHONE,m.name MNAME,m.phone MPHONE,g.name GNAME from student s,parent m,parent f,guardian g where (s.studentid=".$jobnum." and s.f_cnic=f.cnic and s.m_cnic=m.cnic and s.g_cnic=g.cnic)";

			$query_id1 = oci_parse($con, $sql_select1);
        	$runselect1 = oci_execute($query_id1);
	  
			$sql_select2="select s.name SIBLINGS from student s,student s1 where s1.studentid=".$jobnum." and s.f_cnic=s1.f_cnic and s.studentid!=s1.studentid";

			$query_id2 = oci_parse($con, $sql_select2);
        	$runselect2 = oci_execute($query_id2);
		
	 
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
    <h1>HAMAREY BACHCHEY<BR>STUDENT INFORMATION FORM</h1>
	</header>
	
    <p align="center">Please Search by Student ID.</p>
    <hr>
   <form action="form4.php" method="post">
    <table border="01" align="center">
        
		
		<tr align="middle">
            <th colspan="2">Search Information</th>
        </tr>
        
		<tr>
						<td>Search:</td>
				<td><input type="text" name="jobmenu" placeholder="Enter Student ID"/></td>
						
        </tr>	 		
		<tr align="middle">
            <td colspan="2"><input type="submit" name="show_dowpdown_value" value="submit"></td>
        </tr>
	</table>
</form>

<hr  />
<br  />

<h2 align="middle">Student Information</h2>
<table align="center">
<tr align="center">
<th>Name</th>
<th>ID</th>
<th>Gender</th>
<th>DOB</th>
<th>Address</th>
<th>Father Name</th>
<th>Father Phone#</th>
<th>Mother Name</th>
<th>Mother Phone#</th>
<th>Guardian Name</th>
<th>Sibling</th>

</tr>
<tr ALIGN="CENTER">
<?while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['SNAME']; ?></td>
		<td align="center"><?php echo $row['SID']; ?> </td>
		<td align="center"><?php echo $row['SGENDER']; ?> </td>
		<td align="center"><?php echo $row['SDOB']; ?></td>
		<td align="center"><?php echo $row['ADDRESS']; ?></td>
		<td align="center"><?php echo $row['FNAME']; ?> </td>
		<td align="center"><?php echo $row['FPHONE']; ?> </td>
		<td align="center"><?php echo $row['MNAME']; ?> </td>
		<td align="center"><?php echo $row['MPHONE']; ?> </td>
		<td align="center"><?php echo $row['GNAME']; ?> </td>
		
		<?while($row = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS)) 
			{ ?>
					<td align="center"><?php echo $row['SIBLINGS']; ?> </td>
			<?php } ?>
			
		
<?php } ?>
	
	 


</table>
</body>
</html>


