<?php

// [name] => desktop-year-of-the-tiger-images-wallpaper.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\php6F88.tmp [error] => 0 [size] => 316625


			$f=$_FILES['file'];
			
			$fileName=$f['name'];
			
			$ext=strtolower(end( explode('.',$fileName)));
			
			$allowed=array('png','jpg'); 


			
			if(in_array($ext,$allowed))
			{
				
				
										



				if($f['error']==0)
				{
					
					if($f['size']<=8000000)
					{
						session_start();

						$name=$_POST['txtName'];
						$surname=$_POST['txtSurName'];
						$dob=$_POST['txtdob'];
						$email=$_POST['txtEmail'];
						$password=password_hash($_POST['txtPassword'],PASSWORD_DEFAULT);

								$query="insert into user(name,surname,dob,email,password) values('".$name."','".$surname."','".$dob."','".$email."','".$password."')";
												mysqli_query($conn,$query);
						
								$result=mysqli_query($conn,"select id from user where email='".$email."'");

								$row=mysqli_fetch_array($result);

								$_SESSION['id']=$row['id'];
							$newFileName='profile/'.$_SESSION['id'].'.'.$ext;
						
						$id=$row['id'];
							$query="update user set image='".$newFileName."' where id=$id";
																		mysqli_query($conn,$query);

						if($file_size>=500000)
								{
									$decide =imagejpeg(imagecreatefromjpeg($f['tmp_name']),$newFileName,40);
								}
						else
						{
						$decide=imagejpeg(imagecreatefromjpeg($f['tmp_name']),$newFileName);
					}
						
						if($decide)
						{


										header('location:home.php');

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





























	