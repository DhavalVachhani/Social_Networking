
<?php

	session_start();
	
if(!isset($_SESSION['id']))
{
	include('login.php');
	die();
}

	if(isset($_GET['friendId']))
	{
		$userId=$_SESSION['id'];
		$friendId=$_GET['friendId'];
		//echo	$userId."  ".$friendId;
		
		include("db.php");
		
		$query="select * from user where id=$friendId";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
		
	}


	include("header.php");
?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>


	<script type="application/javascript">
		
		function z()
		{
			var req=new XMLHttpRequest();
			
	
			
				var msg=document.getElementById('txtArea').value;
			
				req.onreadystatechange=function()
				{
					if(req.readyState==4 && req.status==200)
						{
							document.getElementById('chatlogs').innerHTML=req.responseText;
						}
				}
						
				var userId="<?php echo $userId?>";
				var frindId="<?php echo $friendId?>";
					req.open('get',"process_msg.php?userId="+userId+"&friendId="+frindId+"&x=0&msg="+msg+" ",true);
					req.send();

						document.getElementById('txtArea').value='';

				

		}
		
	function x()
	{
		
		
			var req=new XMLHttpRequest();

			req.onreadystatechange=function()
			{
				if(req.readyState==4 && req.status==200)
					{
						document.getElementById('chatlogs').innerHTML=req.responseText;
					}
			}

					var userId="<?php echo $userId?>";
					var frindId="<?php echo $friendId?>";
					req.open('get',"process_msg.php?userId="+userId+"&friendId="+frindId+"",true);
					req.send();

	
	}
	
	
	
	setInterval(x,1000);
		
		
	
	</script>

</head>

<body style="background-color: cadetblue;color:crimsono;">


	<p align="right">User:<?php $userName=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_SESSION['id']."'"));
			echo $userName['name'];
		?> 
		
	</p>	
		<table>
			
			<tr>
				
				<td><img height="100" src=<?php echo $row['image'] ?>></td>
				<td> <?php echo $row['name']." ".$row['surname'] ?> </td>
			</tr>
			
		</table>

		<textarea name="txtArea" id="txtArea" cols="50" rows="5"></textarea>

			<br>

			<button onClick="z()" style="font-size: 20px;padding: 5px 10px;border-radius: 8px;	position: relative;
					left: 140px;top:25px" ></bu>Send</button>


			<br>
			<br>
			<br>
			<br>
					<h1 align="center" style="border: solid;margin:0px 400px 20px 400px;">Chats</h1>

			<div  id="chatlogs" align="left">

			</div>


</body>
</html>