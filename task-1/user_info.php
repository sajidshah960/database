
<html>
<body>

<form>
<table border="02">
	<tr align="middle">
            <td colspan="2">Hello Visitor!!</td>
	</tr>
		
		<tr align="middle">
            <th colspan="2">Please provide us the requested information.</th>
        </tr>
		
		<tr>
            <td>Name is</td><td><?php echo $_POST["name"]; ?></td><br>
        </tr>
		
		<tr>
            <td>Gender is</td><td><?php echo $_POST["dropdown1"];?></td><br>
        </tr>
		
		<tr>
            <td>Education is</td><td><?php echo $_POST["dropdown"];?></td><br>
        </tr>
		
		<tr align="middle">
			<td colspan="2"><a href="input_info.html">Back</a></td>
		</tr>
		
</table>
</form>
</body>
</html> 





