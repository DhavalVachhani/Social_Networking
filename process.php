<?php
	session_start();
include("db.php");


	if(isset($_POST['subLogIn']))
	{
		$query="select email,password,id from user";
		
		$email=$_POST['txtEmail'];
		$result=mysqli_query($conn,$q);
		
		
		$result=mysqli_query($conn,$query);
		
		while($row=mysqli_fetch_array($result))
		{
			
			
				if($_POST['txtEmail']==$row['email'] && password_verify($_POST['txtPassword'],$row['password']))
				{
						$_SESSION['id']=$row['id'];
						header("Location:home.php");

					die();
				}
			}
				header("Location:login.php?x");

	}

	else if(isset($_POST['subRegister']))
	{
			
			
		include("upload.php");
		
		
		//header("Location:home.php");

	}

else
{
	header("Location:login.php");
		
}
	

?>