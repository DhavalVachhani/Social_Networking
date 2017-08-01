<?php
session_start();

	if(!isset($_SESSION['id']))
	{
		header("Location:login.php");
		die();
	}
	
include("db.php");

echo($_GET['friendId']);

$requester=$_SESSION['id'];
$requestedto=$_GET['friendId'];
$status=0;


$q="select * from friend_request where requester=$requester and requestedto=$requestedto";
$res=mysqli_query($conn,$q);

$ro=mysqli_fetch_array($res);

	

	if(is_null($ro))
	{

			$query="insert into friend_request(requester,requestedto,status) values($requester,$requestedto,$status)";

			if(mysqli_query($conn,$query))
			{
				header("location:add_friend.php?action");
			}
			else
				{
					echo "request not sent";
				}

	}
else
{
				header("location:add_friend.php?sent");
}


	

	

?>


