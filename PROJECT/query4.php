<html>
<body>

<?php 
// example 2.1 ..creating a database connection 
$db_sid = "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = hafsa)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = hafsa)
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

            $sql_select1="select s2.sname SIBLINGS from student s,student s2 where ((s.fatherid=s2.fatherid and s.rollno!=s2.rollno) OR (s.motherid=s2.motherid and s.rollno!=s2.rollno)) AND s.ROLLNO= '".$jobnum."'";

			$query_id1 = oci_parse($con, $sql_select1);
        	$runselect1 = oci_execute($query_id1);
	  
	    $sql_select="select * from student s,mother m,father f, guardian g where(s.motherid=m.motherid)and(s.fatherid=f.fatherid)and(s.gid=g.gid)and(ROLLNO= '".$jobnum."')";

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
    <h1>HAMAREY BACHCHEY<BR>STUDENT INFORMATION FORM</h1>
	</header>
	
    <p align="center">Please Search by Student ID.</p>
    <hr>
   <form action="query4.php" method="post">
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

<h2 align="middle">List of all students information</h2>
<table align="center">
<tr align="center">
<th>StdName</th>
<th>RollNo</th>
<th>House</th>
<th>Street</th>
<th>City</th>
<th>MotherName</th>
<th>MotherContact</th>
<th>FatherName</th>
<th>FatherContact</th>
<th>GuardianName</th>
<th>Sibling</th>

</tr>
<tr ALIGN="CENTER">
<?while($row = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['SNAME']; ?></td>
		<td align="center"><?php echo $row['ROLLNO']; ?> </td>
		<td align="center"><?php echo $row['HOUSE']; ?> </td>
		<td align="center"><?php echo $row['STREET']; ?> </td>
		<td align="center"><?php echo $row['CITY']; ?> </td>
		<td align="center"><?php echo $row['MNAME']; ?></td>
		<td align="center"><?php echo $row['MPHONE']; ?> </td>
		<td align="center"><?php echo $row['FNAME']; ?> </td>
		<td align="center"><?php echo $row['FPHONE']; ?> </td>
		<td align="center"><?php echo $row['GNAME']; ?> </td>
		<?while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['SIBLINGS']; ?> </td>
			
	 <?php } ?>
		
	 <?php } ?>
	 </tr>
	 


</table>
</body>
</html>


