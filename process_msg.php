<?php

session_start();



	
	if(isset($_SESSION['id']))
	{

		include("db.php");

		
		$userId=$_GET['userId'];
		$friendId=$_GET['friendId'];
		
		
		
		$query="select * from user where id=$userId";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
		
		$user_name=$row['name'];
		
		
		$query="select * from user where id=$friendId";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
		
		
			$friend_name=$row['name'];
		
		
		
	if(isset($_GET['x']))
	{
		$msg=$_GET['msg'];
$insertQuery="insert into msg(sendby,sendto,msg) values('$userId','$friendId','$msg')";

mysqli_query($conn,$insertQuery);
}

	$getMsgQuery="select * from msg where (sendby='$userId' and sendto='$friendId') or (sendby='$friendId' and sendto='$userId') order by msgid desc";

	$result=mysqli_query($conn,$getMsgQuery);

	while($data=mysqli_fetch_assoc($result))
	{
		if($data['sendby']==$userId)
		{
			echo "<h2 > me:".$data['msg']."</h2><br>";	
		}
		else
		{
			echo "<h2 style='padding-left: 200px'> $friend_name:".$data['msg']."</h2><br>";
		}
		
		
	}
		
		
	/*	$getMsgQuery="select * from msg where sendby='$friendId' and sendto='$userId' order by msgid desc";

	$result=mysqli_query($conn,$getMsgQuery);

	while($data=mysqli_fetch_assoc($result))
	{
		echo "<h2> $friend_name:".$data['msg']."</h2><br>";
	}*/
		
		}

else
{
	header("location:myhome.php");
}