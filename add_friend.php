<?php

session_start();

	if(!isset($_SESSION['id']))
	{
		header("Location:login.php");
		die();
	}


if(isset($_GET['sent']))
{
	echo "Request has already been sent or user is already a friend";
	
}

	else if(isset($_GET['action']))
	{

		echo "Request sent Succesfully";
	}
include('header.php');


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>


			
	
</head>


<body style="background-color: black;color: yellow;">


		<h4 align="left"><a href="home.php" style="color: yellow">Home</a></h4>


		<form  action="add_friend.php?search_friend" method="post">
			
			<input type="text" name="txt1" id="txt1" autofocus>
			<input type="submit" name="sub" value="Search">
			
		</form>
		
		
<br>
<br>
<br>
<br>

		
	<?php 

	
			if(isset($_GET['search_friend']) && isset($_POST['sub']))
			{
					
					include("db.php");

					$name=$_POST['txt1'];
						$query="select * from user where name='$name'";

					$result=mysqli_query($conn,$query);
				
	?>
				
			
			
				<?php $z=0;$f=0; while($row=mysqli_fetch_array($result)):if($row['id']!=$_SESSION['id']): if($f==0){?>
							
		<table align="center" border="2" cellspacing="0" cellpadding="2">
				<tr>
				<td align="center">Name</td>
				<td align="center">Email-Id</td>
				<td align="center">DOB</td>
				</tr>
						<?php $f=1;$z=1; } ?>
							
					<tr>
						<td><?php echo $row['name']." ".$row['surname']?></td>
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['dob']?></td>
						<td ><img height="100" src=<?php echo $row['image'] ?> alt=""></td>
						<td><a style="color: green" href="process_addfriend.php?friendId=<?php echo $row['id'] ?>">Add</a></td>
					</tr>			
							
				
				<?php endif; endwhile ;if($z==0){echo "No any user found having name '$name' ";}
			} ?>
				
			
	</table>
	
	

</body>
</html>


		