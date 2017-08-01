<?php
	session_start();
$id=$_SESSION['id'];

	if(!isset($id))
	{
			header("Location:login.php");
		die();
	}

		include("db.php");
		$query="select * from user where id=$id";
		
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);

		include("header.php");
?>


<!doctype html>
<html >
<head>
<meta charset="utf-8">
<title>Home</title>

	<script type="application/javascript">

				
	var m=0;
		function z()
		{
			document.getElementById('bt').value='';
			document.getElementById('bt').click();
		 m=setInterval(x,2000);
		
			
			
		}
		
		function x()
		{
			var img=document.getElementById('bt').value;
			
		
				
				if(img!="")
				{
					var comment=window.prompt("Have any Comment","");
					document.getElementById('cmt').value=comment;
					clearInterval(m);
					document.getElementById('subbtn').click();

				}
			
		}
		
	
		
	</script>
	
<style>
	
	.content
	{
		float: left;
	}
	
	</style>

</head>

<body style="background-color:rgba(97,97,97,1.00);color: yellow">


<div class="content">

<div  style="float: left; margin-right: 600px;margin-left: 20px" >




	<table align="" border="0" cellspacing="0" cellpadding="2" >
		
		<tr>
		
			
			<td ><img height="120" src=<?php echo $row['image']?> alt=""></td>
			
			<th align="center" width="100">Name:<br><br>Email-Id:<br><br>DOB:</th>
			<td width="150" ><?php echo $row['name']." ".$row['surname']."<br><br>".$row['email']."<br><br>".$row['dob'] ?></td>
			
			<td width="1000" align="right">
				
					


					

				
			</td>
			
		</tr>
			
	</table>
	</div>
	
	<!--	okkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk-->
	
	<div  style="float:right;margin-top: -140px;margin-right: 20px;">
	<table align="" border="2" cellspacing="0" cellpadding="2">
		
		<tr>
			
			<th colspan="2">My Friends</th>
			
		</tr>
		<?php
	
		
			include("db.php");
					$friend="select requestedto from friend_request where requester=$id and status=1" ;
					 $resultOfFriend=mysqli_query($conn,$friend);
					 
				while($rowId=mysqli_fetch_array($resultOfFriend)):
				
					 $fid=$rowId['requestedto'];
						$q="select * from user where id=$fid";
					$r=mysqli_query($conn,$q);
					$row=mysqli_fetch_array($r);

		?>
		
			<tr>
				
				<td><a href="msg.php?friendId=<?php echo $row['id']?>"><img height="100" width="100" src=<?php echo $row['image'] ?> ></a></td>
				<td><a style="text-decoration:none;color: yellow;" href="msg.php?friendId=<?php echo $row['id']?>"><?php echo $row['name']." ".$row['surname'] ?></a></td>
			</tr>
		
		<?php endwhile;?>
			
		
	</table>
	
	</div>
	
	</div>
	<br>
<br>
<br>
<br>


		
		<h1 align="left">Timeline</h1>
		
	<form action="process_timeline.php" method="post" enctype="multipart/form-data">
		
			<input type="file" name="file" id="bt" hidden>

					<table border="0" cellspacing="0" cellpadding="2" width="">


						<tr>

							<td colspan="2" align="center"><input style="width: 100px;height: 40px;border-radius: 10px;background: rgba(89,243,240,1.00);color: black;border: thin; margin: 10px"  type="button" value="Upload" onClick="z()"></td>

						</tr>

					</table>
					
					<input type="text" id="cmt" name="cmt" hidden>
					<input type="submit" id="subbtn" hidden>

	</form>
	
		<br>
		<br>
		<br>

			<table align="center" border="2" cellspacing="0" cellpadding="2" width="400">
				
				
				
				
				<?php
							$query_timeline="SELECT DISTINCT image,comment,id,time from timeline where id in (SELECT requestedto from friend_request where requester=$id and status=1) or id=$id order by srno desc";
						$result=mysqli_query($conn,$query_timeline);
						
						while($row=mysqli_fetch_array($result)):
						
						$name=mysqli_fetch_array(mysqli_query($conn,"select name,surname from user where id=".$row['id'].""));
				?>
						
						<tr>
							
							<th><?php echo $name['name']." ".$name['surname']?></th>
							<td><?php echo $row['time'] ?></td>
							
						</tr>
						<tr>
							
							<td colspan="2"><img height="200" width="400" src=<?php echo $row['image'] ?> alt=""></td>
							
						</tr>
					
					<tr>
						
						<td colspan="2"><?php echo "Comment: ".$row['comment'] ?></td>
						
					</tr>
					<tr>
						
					</tr>

				<?php endwhile;?>
				
			</table>
	
	</table>


</body>
</html>