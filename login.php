
<?php
session_start();
	if(isset($_SESSION['id']))
	{
						header("Location:home.php");
			die();

	}


	

	else if(isset($_GET['x']))
	{
		echo "<h3 align='center'>Wrong email-id or password</h3>";
	}

	
else
{
	echo "<h3 align='center'>LogIn Here</h3>";
}


?>

<!doctype html>
<html>
<script type="application/javascript">
	
	function validate1(){
		if(document.getElementById("txtEmail1").value=="")
	{
		alert("Please enter Email-Id");
		document.getElementById("txtEmail1").focus();
		return false;
	}
	if(document.getElementById("txtPassword1").value=="")
	{
		alert("Please enter Password");
		document.getElementById("txtPassword1").focus();
		return false;
	}
	}
	
function validate2()
{
	
	
	
	
	if(document.getElementById("txtName").value=="")
	{
		alert("Please enter Name");
		document.getElementById("txtName").focus();
		return false;
	}
	if(document.getElementById("txtSurName").value=="")
	{
		alert("Please enter Surname");
		document.getElementById("txtSurName").focus();
		return false;
	}
	if(document.getElementById("txtdob").value=="")
	{
		alert("Please enter DOB");
		document.getElementById("txtdob").focus();
		return false;
	}
	if(document.getElementById("txtEmail").value=="")
	{
		alert("Please enter Email");
		document.getElementById("txtEmail").focus();
		return false;
	}
	

	if(document.getElementById("txtPassword").value=="")
	{
		alert("Please Enter Password");
		document.getElementById("txtPassword").focus();
		return false;
	}
	if(document.getElementById("txtConfirmPassword").value=="")
	{
		alert("Please Enter Confirm Password");
		document.getElementById("txtConfirmPassword").focus();
		return false;
	}
	
			if(document.getElementById("txtPassword").value!=document.getElementById("txtConfirmPassword").value)
	{
		alert("Password doesn't match");
		//document.getElementById("txtEmail").focus();
		return false;
	}

}
</script>

<head>
<meta charset="utf-8">
<title>Login</title>

<style>
	
	
	
input
{
	display: block;
	width: 300px;
	height: 30px;
	padding: 10px;
	font-size: 14px;
	font-family: sans-serif;
	color: white;
	background:rgba(0,0,0,0.30);
	outline: none;
	border: 1px solid rgba(0,0,0,0.30);
	border-radius: 10px;
	box-shadow: insert 0px -5px 45px rgba(100,100,100,0.2),0px 1px 1px rgba(255,255,255,0.2);
	margin-bottom: 5px;
	border-color:brown ;
	border-width: 2px;
	
}
	
	#z{
			border-color:black;
	}

	
	</style>

</head>

<body style="background: black;color: yellow">

	<form name="login" action="process.php" method="post" onSubmit="return validate1()" >
		
		<table align="center" border="0" cellspacing="0" cellpadding="2">
		
		<tr>
			<th >Email</th>
			<td><input type="text" name="txtEmail" id="txtEmail1" ></td>
			
		</tr>
			
		<tr>
			
			<th>Password</th>
			<td><input type="password" name="txtPassword" id="txtPassword1"></td>
				
		</tr>
		
		
		<tr>
			
			<td colspan="2" align="center"><input type="submit" name="subLogIn" value="Login"></td>
							
		</tr>
		
		
		
		
		</table>
		
	</form>
	
<br>
<br>
<br>
<br>
<br>
<br>
<br>

	
<?php

	if(isset($_GET['xreg']))
	{
		echo "<h3 align='center'>Email-Id already exist</h3>";
	}
	
	else if(isset($_GET['upload']))
	{
				echo "<h3 align='center'>File upload problem</h3>";
	}
	
	else
{
	echo "<h3 align='center'>Registration</h3>";
}


?>

	<form name="registration" action="process.php" method="post" enctype="multipart/form-data" onsubmit="return validate2()">
		
		<table align="center" border="0" cellspacing="0" cellpadding="2">
		
		
		
		<tr>
			<th>Name</th>
			<td><input type="text" name="txtName" width="250" id="txtName" ></td>
			
		</tr>
		
		
		
		<tr>
			<th>Last Name</th>
			<td><input type="text" name="txtSurName" width="250" id="txtSurName"></td>
			
		</tr>
		
		
		<tr>
			<th>DOB</th>
			<td><input type="date" name="txtdob" width="250" id="txtdob"></td>
			
		</tr>
		
		<tr>
			<th>Email</th>
			<td><input type="text" name="txtEmail" width="250" id="txtEmail"></td>
			
		</tr>
			
		<tr>
			
			<th>Password</th>
			<td><input type="password" name="txtPassword" width="250" id="txtPassword"></td>
				
		</tr>
		
				
		<tr>
			
			<th>Confirm Password</th>
			<td><input type="password" name="txtConfirmPassword" width="250" id="txtConfirmPassword"></td>
				
		</tr>
		
		
		
		<tr>
			
			<th >Image</th>
			<td><input id="z" type="file" name="file" ></td>
				
		</tr>
		
		
		
		
		<tr>
			
			<td colspan="2" align="center"><input type="submit" name="subRegister" value="Register"></td>
							
		</tr>
		
		
		
		
		</table>
		
	</form>

</body>
</html>