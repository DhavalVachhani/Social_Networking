hb  <?php

session_start();
	if(!isset($_SESSION['id']))
	{
		header("Location:login.php");
		die();
	}

	include("db.php");
	
$id=$_SESSION['id'];
	
	$query="select requester from friend_request where requestedto=$id and status=0";

	$result=mysqli_query($conn,$query);

include("header.php");
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>



<body style="background-color: black;color: yellow;">


				<?php $f=0;while($requester=mysqli_fetch_array($result)):

					$x=$requester['requester'];
					$query="select * from user where id=$x";
					$r=mysqli_query($conn,$query);
					$row=mysqli_fetch_array($r);

					?>

				<table border="2" cellspacing="0" cellpadding="5">

	<tr>			
		
				<td><?php echo $row['name']." ".$row['surname']?></td>
						
						<td ><img height="100" src=<?php echo $row['image'] ?> alt=""></td>
						<td><a href="friend_request_list.php?accept=<?php echo $row['id'] ?>&&x=<?php echo $_SESSION['id'] ?> ">Accept</a></td>
						<td><a href="friend_request_list.php?reject=<?php echo $row['id'] ?>&&x=<?php echo $_SESSION['id'] ?> ">Reject</a></td>
	</tr>
				
		<?php $f=1;endwhile;if($f==0) echo "<p style='border-width: 10px;margin: 200px 400px 200px 400px'>No any Friend Request</p>";?>
		

		</table>
</body>
</html>




<?php

	if(isset($_GET['accept']))
	{
		echo $_GET['accept']." & ".$_GET['x'];
		
		$requester=$_GET['accept'];
		$requstedto=$_GET['x'];
		
		$query="update friend_request set status=1 where requester=$requester and requestedto=$requstedto";
		
		mysqli_query($conn,$query);
		
		header("Location:home.php");
	}
	
	else if(isset($_GET['reject']))
	{
		
		$requester=$_GET['reject'];
		$requstedto=$_GET['x'];
		
		$query="delete from friend_request where requester=$requester and requestedto=$requstedto";
		
		mysqli_query($conn,$query);
		header("Location:home.php");
	}
	

?>