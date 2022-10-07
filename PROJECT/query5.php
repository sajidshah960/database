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
        	
		$jobnum=$_POST["jobmenu"];  
	    $sql_select="select DISTINCT s.sname STUDENT,r.rclass CLASS,g.gname GUARDIAN
from father f, mother m,student s,registration r,guardian g
where((s.motherid=m.motherid) and (s.fatherid=f.fatherid))
and (s.rollno=r.rollno)
and (s.gid=g.gid)
and(m.motherid= '".$jobnum."' or f.fatherid= '".$jobnum."')" ;

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
    <h1>HAMAREY BACHCHEY<BR>PARENT INFORMATION FORM</h1>
	</header>
	
    <p align="center">Please Search by Parent ID.</p>
    <hr>
   <form action="query5.php" method="post">
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

<h2 align="middle">List of all information</h2>
<table align="center">
<tr align="center">
<th>Student</th>
<th>Class</th>
<th>Guardian</th>


</tr>
<tr ALIGN="CENTER">


<?php while($row = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { ?>
		<td align="center"><?php echo $row['STUDENT']; ?></td>
		<td align="center"><?php echo $row['CLASS']; ?> </td>
		<td align="center"><?php echo $row['GUARDIAN']; ?> </td>	
	 <?php } ?>

	 </tr>
</table>
</body>
</html>


