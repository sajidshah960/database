<html> 
<body>

<style>
.header{
background-color: #DB7093;
color: white;
padding: 1%;
text-align:center;
}
</style>

<head>
<header class="header">
    <h1>HAMAREY BACHCHEY<BR>STUDENT REGISTERATION FORM</h1>
	
	</header>
</head>
<body>
<table align="center" border="1 px">
<tr>
<h3 align="center">Courses</h3>
</tr>
<tr>
<th>Course 1</th>
<th>Course 2</th>
<th>Course 3</th>
<th>Course 4</th>
<th>Course 5</th>
<th>Course 6</th>
<th>Course 7</th>
<th>Course 8</th>
<th>Course 9</th>
<th>Course 10</th>

</tr>
<tr>
<th>Pillars of Islam</th>
<th>Brief History of Muslims</th>
<th>Philosophy of Iqbal</th>
<th>Art and Craft</th>
<th>Sociology</th>
<th>Geography</th>
<th>Enviroment Science</th>
<th>Pakistan Studies</th>
<th>Political Science</th>
<th> Basic Mathematics</th>
</tr>
<tr>
<th>IL-01</th>
<th>IL-02</th>
<th>SS-05</th>
<th>SS-09</th>
<th>HM-02</th>
<th>HM-05</th>
<th>HM-09</th>
<th>PK-01</th>
<th>PK-05</th>
<th>MM-02</th>
</tr>
<tr>
</table>
<form method="get">
<table>

<h3>Student Information</h3>

<tr>
<td>Name: </td>
<td><input type="text" name="SName" maxlength="30"/> (max 30 characters a-z and A-Z)</td></tr>

<tr align="middle">
<td>Date of Birth: </td>
<td><input type="text" name="SDOB" maxlength="30"/> (yyyy-mm-dd)</td></tr>
<tr>
<td> Address:</td></tr>
<tr>
<td>House:</td><td><input type="text" name="SHouse" maxlength="30"/></td></tr>
<tr>
<td>City:</td><td><input type="text" name="SCity" maxlength="30"/></td></tr>
<tr>
<td>Street:</td><td><input type="text" name="SStreet" maxlength="30"/></td></tr>

<tr>
<td>Gender:</td><td><input type="text" name="SGender" maxlength="1"/>  (M/F)</td></tr>
</table>

<hr>

<table>
<h3>Parents Information</h3>
<tr>
<td> Mother Name: </td>
<td><input type="text" name="MName" maxlength="30"/><td></tr>
<tr>
<td>Mother Contact: </td>
<td><input type="text" name="MContact" maxlength="10"/></td></tr>
<tr>
<td> Mother CNIC: </td>
<td><input type="text" name="MCNIC" maxlength="30"/><td></tr>
<tr>
<td>Mother Email: </td>
<td><input type="text" name="MEmail" maxlength="30"/></td></tr>
<tr>
<td> Father Name: </td>
<td><input type="text" name="FName" maxlength="30"/><td></tr>
<tr>
<td>Father Contact: </td>
<td><input type="text" name="FContact" maxlength="10"/></td></tr>
<tr>
<td> Father CNIC: </td>
<td><input type="text" name="FCNIC" maxlength="30"/><td></tr>
<tr>
<td>Father Email: </td>
<td><input type="text" name="FEmail" maxlength="30"/></td></tr>
</table>

<hr>

<table>
<h3 >Guardian Information</h3>
<tr>
<td> Guardian Name:</td>
<td><input type="text" name="GName" maxlength="30"/><td></tr>
<tr>
<td>Guardian Contact:</td>
<td><input type="text" name="GContact" maxlength="10"/></td></tr>
<tr>
<td>Guardian CNIC:</td>
<td><input type="text" name="GCNIC" maxlength="30"/><td></tr>
<tr>
<td> Relation: </td>
<td><input type="text" name="GRelation" maxlength="10"/><td></tr>
<tr>
<td> Status: </td>
<td><input type="text" name="GStatus" maxlength="15"/>  (Pregnant/Handicapped)<td></tr>
<tr>
<td>Gender:</td><td><input type="text" name="GGender" maxlength="1"/>  (F/M)</td></tr>
</table>
<hr>
    <table>
        <h3>Course Registration</h3>
		<tr>
<td> Class: </td>
<td><input type="text" name="class" maxlength="10"/><td></tr>
<tr>
<td> Section: </td>
<td><input type="text" name="section" maxlength="15"/><td></tr>
			
<tr>
<td> CourseID: </td>
<td><input type="text" name="CourseId" maxlength="10"/><td></tr>
<tr>
<td> Challan NO: </td>
<td><input type="text" name="ChallanNo" maxlength="15"/><td></tr>
<tr>
<td> Fee Paid: </td>
<td><input type="text" name="FeePaid" maxlength="10"/><td></tr>
<td>Discount: </td>
<td><input type="text" name="discount" maxlength="10"/><td></tr>
<tr>
<td> DueFee: </td>
<td><input type="text" name="duefee" maxlength="10"/><td></tr>
        
		</table>
		
<tr>
<td colspan="2" align="centre">
<input type="submit" value="submit">
<input type="Reset" value="Reset">
</td>
</tr>

</form>

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
/////////////////////////main code /////////////////////////////////////////////////////////////

	$sID=rand(1000,9999);
	$mID=rand(700000,799999);
	$fID=rand(100000,199999);
	$gID=rand(600000,699999);
	$srNo=rand(1,9);
	
	$cid=$_GET['CourseId'];
	$rclass=$_GET['class'];
	$sec=$_GET['section'];
	$feepaid=$_GET['FeePaid'];
	$challanNo=$_GET['ChallanNo'];
	$Discount=$_GET['discount'];
	$DueFee=$_GET['duefee'];
	
	
	$sName=$_GET['SName'];
	$sDOB=$_GET['SDOB'];
	$sGender=$_GET['SGender'];
	$sHouse=$_GET['SHouse'];
	$sStreet=$_GET['SStreet'];
	$sCity=$_GET['SCity'];
	
	
	$mName=$_GET['MName'];
	$mContact=$_GET['MContact'];
	$mCNIC=$_GET['MCNIC'];
	$mEmail=$_GET['MEmail'];
	
	$fName=$_GET['FName'];
	$fContact=$_GET['FContact'];
	$fCNIC=$_GET['FCNIC'];
	$fEmail=$_GET['FEmail'];
	
	$gName=$_GET['GName'];
	$gContact=$_GET['GContact'];
	$gCNIC=$_GET['GCNIC'];
	$gGender=$_GET['GGender'];
	$gStatus=$_GET['GStatus'];
	$gRelation=$_GET['GRelation'];
	
	
	
	
	
	$q1="insert into mother values ('".$mID."','".$mCNIC."','".$mName."','".$mContact."','".$mEmail."',sysdate)";
	$query_id1= oci_parse($con, $q1); 		
	$r1 = oci_execute($query_id1); 
	
	
	$q2="insert into father values ('".$fID."','".$fCNIC."','".$fName."','".$fContact."','".$fEmail."',sysdate)";
	$query_id2= oci_parse($con, $q2); 		
	$r2 = oci_execute($query_id2); 
	
	
	$q3="insert into guardian values ('".$gID."','".$gCNIC."','".$gName."','".$gContact."','".$gGender."','".$gStatus."','".$gRelation."')";
	$query_id3= oci_parse($con, $q3); 		
	$r3= oci_execute($query_id3); 
	
	//Insert into Guardian Values ('787822','2712367226','Noureen Abid', '+924444231' ,'F','Handicapped','Aunt');

	
	$q4="insert into student values ('".$sID."','".$mID."','".$fID."','".$gID."','".$sName."','".$sGender."',date '".$sDOB."',extract(year from sysdate)-extract(year from date '".$sDOB."'),'".$sHouse."','".$sStreet."','".$sCity."','p.png',sysdate)";
	$query_id4= oci_parse($con, $q4); 		
	$r4 = oci_execute($query_id4); 
	
	$q5="insert into registration values ('".$sID."','".$cid."','".$srNo."','".$rclass."','".$sec."',sysdate,sysdate,'".$feepaid."','".$Discount."','".$DueFee."','".$challanNo."')";
	$query_id5= oci_parse($con, $q5); 		
	$r5 = oci_execute($query_id5);
	
	
	
	 if($r5)
	 {
		 echo "Record inserted";
	 }
	 else
	 {
		 echo "Record not inserted!<br>";
		 $e = oci_error($query_id5);  
		 echo $e['message'];
	 }
	//Insert into student values ('1709','172217','158912','112299','Maria','F',date '2007-11-19',extract(year from sysdate)-extract(year from date '2007-11-19'),'26/17','Harley Street','RWP','p9.png',sysdate);
	
	

///////////////////////////////////////////////////////////////////////




?> 
</body> 
</html>