
<html>

<head>
<title>Database connection </title>
</head>
	<hr>
	<h1 align="center" style="color:purple;">DISPLAYING HAMARAY BACHAY</h1>
	<hr>
	<div style="background-image: url('/images/bg.png');  background-position: center;   background-blend-mode: screen;">

<body>

<?php 

     $db_sid = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-1LQO6C5)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = orcl)))";            
	 $db_user = "scott";   
     $db_pass = "1234";    
     $con = oci_connect($db_user,$db_pass,$db_sid); 
	 $q = "select * from student";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id);  
	 echo"<hr>"; 
	 while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { 
		
		$image= $row['PHOTO']; 
		?>
		<p align="center"> 
		<?php

		print"<img src=/images/$image width=\"150px\" height=\"200px\"\/>";
		echo "<br><br>";
		echo "NAME : ".$row['SNAME']."--------GENDER : ".$row['GENDER']."--------DOB : ".$row['DOB']."-------AGE : ".$row['AGE']."-------ADDRESS : ".$row['HOUSE']." ".$row['STREET']." ".$row['CITY'];
		
		?>
		</p>
		
		<?php
		echo "<hr>";
	 }
?>

</body>
</html>
