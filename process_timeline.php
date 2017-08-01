<?php

// [name] => desktop-year-of-the-tiger-images-wallpaper.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\php6F88.tmp [error] => 0 [size] => 316625




	
						session_start();

include("db.php");

$comment=$_POST['cmt'];


$id=$_SESSION['id'];



			$f=$_FILES['file'];
			
			$fileName=$f['name'];
			
			$ext=strtolower(end( explode('.',$fileName)));
			
			$allowed=array('png','jpg'); 


			
			if(in_array($ext,$allowed))
			{
				

				if($f['error']==0)
				{
					
					if($f['size']<=800000)
					{
						
						$uniquid=uniqid();
						$newFileName="timeline/".$_SESSION['id']."_$uniquid.$ext";
						
						echo $newFileName;
						if(move_uploaded_file($f['tmp_name'],$newFileName))
						{

								date_default_timezone_set("Asia/Kolkata");

								$time=date("d/m/y H:i");
								$query="insert into timeline(id,comment,image,time) values($id,'$comment','$newFileName','$time')";
							
							$result=mysqli_query($conn,$query);
							
									if($result)
									{
										header('location:home.php');
									}
							else
							{
								echo "something went wrong";
							}

										

						}
						else
						{
							echo "File upload problem";
				    	}
					}
					else
					{
						echo 'File size is too large ';	
					}
				}
				else
				{
					echo 'error while uploading profile picture';
				}
			}

			else
			{
				echo 'only file with extensions .jpg and .png are allowed';
			}
			
			
		
/*else
{
	header('location:home.php');
}*/


























