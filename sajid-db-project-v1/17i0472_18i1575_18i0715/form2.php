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
       
		if($_POST['classid'])
		{		
		$classid=$_POST['classid'];
	  
	    $q1="select class,section,COUNT(STUDENTID),gender from student where class=".$classid." GROUP BY SECTION,GENDER,class";

			$query_id1 = oci_parse($con, $q1);
        	$r1 = oci_execute($query_id1);
		}
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
    <h1>STUDENT COUNT FORM<br><h4>Aviation School</h4></h1>
	</header>
	
    
    <hr>
   <form action="form2.php" method="post">
    <table border="01" align="center">
        
		
		<tr align="middle">
            <td colspan="2">Search Information</td>
        </tr>
        
		<tr>
						<td>Search:</td>
				<td><input type="text" name="classid" placeholder="Enter Class ID"/></td>
						
        </tr>	 		
		<tr align="middle">
            <td colspan="2"><input type="submit" name="show_dowpdown_value" value="search"></td>
        </tr>
	</table>
</form>

<hr  />
<br  />

<table align="center">
<tr align="center">
	<th>Class</th>
	<th>Section</th>
	<th>Gender</th>
	<th>Student-Count</th>
</tr>

<?while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
	{ ?>
		<tr ALIGN="CENTER">
		<td align="center"><?php echo $row['CLASS']; ?> </td>
		<td align="center"><?php echo $row['SECTION']; ?> </td>
		<td align="center"><?php echo $row['GENDER']; ?> </td>
		<td align="center"><?php echo $row['COUNT(STUDENTID)'];?></td>
		
	<?php } ?>
	 </tr>
</table>


</body>
</html>


