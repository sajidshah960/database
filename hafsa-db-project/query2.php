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
        	
		$jobnum=$_POST["jobmenu"];
	  
	    $sql_select="select COUNT(RCLASS), r.rclass CLASS,s.gender GENDER from registration r,student s where (r.rollno=s.rollno) AND (r.rclass='".$jobnum."') group by r.rclass,s.gender";

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
    <h1>HAMAREY BACHCHEY<BR>CLASSES-STUDENT COUNT FORM</h1>
	</header>
	
    <p align="center">Please Search by Class ID.</p>
    <hr>
   <form action="query2.php" method="post">
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

<h2 align="middle">List of students information</h2>
<table align="center">
<tr align="center">
<th>StdCount</th>
<th>Class</th>
<th>Gender</th>

</tr>
<tr ALIGN="CENTER">
<?while($row = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['COUNT(RCLASS)']; ?></td>
		<td align="center"><?php echo $row['CLASS']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
		
		
	 <?php } ?>
	 </tr>
	 


</table>
</body>
</html>


