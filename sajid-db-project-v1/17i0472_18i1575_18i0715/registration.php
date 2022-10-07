<html> 
<body>

<style>
.header{
background-color: #008000;
color: white;
padding: 1%;
text-align:center;
}
</style>

<head>
<header class="header">
    <h1>STUDENT REGISTERATION FORM<br><h4>Aviation School</h4></h1>
	
	</header>
</head>

<form method="get">
<table>

	<h3>Student Information</h3>

	<tr>
		<td>NAME: </td>
		<td><input type="text" name="sname" maxlength="30"/></td>
	</tr>
	<tr>
		<td>DOB: </td>
		<td><input type="text" name="sdob" maxlength="10"/>(DD-MM-YYYY)</td>
	</tr>
	<tr>
		<td>GENDER:</td><td><input type="text" name="sgender" maxlength="1"/></td>
	</tr>

</table>

<hr>

<table>
<h3>Parents Information</h3>
<tr>
<td>FATHER-CNIC: </td>
<td><input type="text" name="fcnic" maxlength="13"/><td></tr>
<tr>
<td>FATHER-NAME: </td>
<td><input type="text" name="fname" maxlength="30"/></td></tr>
<tr>
<td>FATHER-PHONE: </td>
<td><input type="text" name="fphone" maxlength="11"/><td></tr>
<tr>
<td>FATHER-STATUS: </td>
<td><input type="text" name="fstatus" maxlength="5"/>(DEAD or ALIVE)</td></tr>
<tr>
<td>FATHER-EMAIL: </td>
<td><input type="text" name="femail" maxlength="30"/><td></tr>
<tr>
<td>FATHER-ADDRESS: </td>
<td><input type="text" name="faddress" maxlength="40"/></td></tr>
<tr>
<td>MOHTER-CNIC: </td>
<td><input type="text" name="mcnic" maxlength="13"/><td></tr>
<tr>
<td>MOTHER-NAME: </td>
<td><input type="text" name="mname" maxlength="30"/></td></tr>
<tr>
<td>MOTHER-PHONE: </td>
<td><input type="text" name="mphone" maxlength="11"/><td></tr>
<tr>
<td>MOTHER-STATUS: </td>
<td><input type="text" name="mstatus" maxlength="5"/>(DEAD or ALIVE)</td></tr>
<tr>
<td>MOTHER-EMAIL: </td>
<td><input type="text" name="memail" maxlength="30"/><td></tr>
<tr>
<td>MOTHER-ADDRESS: </td>
<td><input type="text" name="maddress" maxlength="40"/></td></tr>
</table>

<hr>

<table>
<h3 >Guardian Information</h3>
<tr>
<td>CNIC:</td>
<td><input type="text" name="gcnic" maxlength="13"/><td></tr>
<tr>
<td>NAME:</td>
<td><input type="text" name="gname" maxlength="30"/></td></tr>
<tr>
<td>GENDER:</td>
<td><input type="text" name="ggender" maxlength="1"/><td></tr>
<tr>
<td>PHONE-NO: </td>
<td><input type="text" name="gphone" maxlength="11"/><td></tr>
<tr>
<td>RELATION: </td>
<td><input type="text" name="grelation" maxlength="10"/><td></tr>
<tr>
<td>EMAIL:</td>
<td><input type="text" name="gemail" maxlength="30"/></td></tr>
</table>
<hr>
<body>
<table align="center" border="1 px">
<tr>
<h3 align="center">Courses</h3>
</tr>
<tr>
<th>Course ID</th>
<th>Course ID</th>
<th>Course ID</th>
</tr>

</tr>
<tr>
<th>Family Management</th>
<th>Psychology</th>
<th>Maths</th>
</tr>
<tr>
<th>10</th>
<th>20</th>
<th>30</th>
</tr>
<tr>
</table>
    <table>
        <h3>Course Registration (Above 3 years only)</h3>
		<tr>
<tr>
<td>VOUCHER-NO: </td>
<td><input type="text" name="vno" maxlength="5"/><td></tr>		
<tr>
<td>COURSE-ID: </td>
<td><input type="text" name="cid" maxlength="2"/><td></tr>
<tr>
<td>CLASS:</td><td><input type="text" name="sclass" maxlength="1"/>(1-7 only)</td></tr>
<tr>
<td>SECTION:</td><td><input type="text" name="ssection" maxlength="1"/></td></tr>
        
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
/////////////////////////main code /////////////////////////////////////////////////////////////
	if ($_GET['mcnic'])
	{
	$sID=rand(21,99);
	$sName=$_GET['sname'];
	$sDOB=$_GET['sdob'];
	$sGender=$_GET['sgender'];

	
	$cID=$_GET['cid'];
	$sClass=$_GET['sclass'];
	$sSec=$_GET['ssection'];
	$vNo=$_GET['vno'];
	
	
	$fName=$_GET['fname'];
	$fContact=$_GET['fphone'];
	$fCNIC=$_GET['fcnic'];
	$fEmail=$_GET['femail'];
	$fAddress=$_GET['faddress'];
	$fStatus=$_GET['fstatus'];

	
	$mName=$_GET['mname'];
	$mContact=$_GET['mphone'];
	$mCNIC=$_GET['mcnic'];
	$mEmail=$_GET['memail'];
	$mAddress=$_GET['maddress'];
	$mStatus=$_GET['mstatus'];

	
	$gName=$_GET['gname'];
	$gContact=$_GET['gphone'];
	$gCNIC=$_GET['gcnic'];
	$gGender=$_GET['ggender'];
	$gRelation=$_GET['grelation'];
	$gEmail=$_GET['gemail'];
	

	
	
	
	
	
	$q1="insert into parent values ('".$mCNIC."','".$mName."','".$mContact."','MOTHER','','".$mStatus."','".$mEmail."','".$mAddress."')";
	$query_id1= oci_parse($con, $q1); 		
	$r1 = oci_execute($query_id1); 
	
	
	
	$q2="insert into parent values ('".$fCNIC."','".$fName."','".$fContact."','FATHER','".$mCNIC."','".$fStatus."','".$fEmail."','".$fAddress."')";
	$query_id2= oci_parse($con, $q2); 		
	$r2 = oci_execute($query_id2);
	
	$q3="insert into guardian values ('".$gCNIC."','".$gName."','".$gGender."','".$gContact."','".$gRelation."','".$gEmail."')";
	$query_id3= oci_parse($con, $q3); 		
	$r3 = oci_execute($query_id3); 
	
	
	$q4="insert into student values ('".$sID."','".$sName."','".$sGender."','0000_x',to_date('".$sDOB."','DD/MM/YYYY'),'".$sClass."','".$sSec."','".$mCNIC."','".$fCNIC."','".$gCNIC."',sysdate)";
	$query_id4= oci_parse($con, $q4); 		
	$r4 = oci_execute($query_id4);
	
	$q5="insert into course_reg values ('".$vNo."','".$sID."','".$cID."')";
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
	 }
	

///////////////////////////////////////////////////////////////////////




?> 
</body> 
</html>