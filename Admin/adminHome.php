<!DOCTYPE html>
<?php
		session_start();
		include('conn.php');
		if(!isset($_SESSION['id']))
		{
			header('location:index.php');
		}
		if(isset($_POST['logout']))
		{
			session_destroy();
			header('location:index.php');
		}
		
        
        //Add Slider Content
		if(isset($_POST['picadd_submit'])) 
		{
			$nm=$_FILES['sliderpicpic_add']['name'];
			$target = "../images/Slider".$_FILES['sliderpicpic_add']['name'];
			$datatarget = "images/Slider".$_FILES['sliderpicpic_add']['name'];
			if(!move_uploaded_file($_FILES['sliderpicpic_add']['tmp_name'],$target))
			{
				echo "Sorry can't upload file....";	
			}
			else
			{
				$query="insert into slider(img_nm,path) values('".$nm."','".$datatarget."')";
				mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			}
		}


		if(isset($_POST['sliderPicSubmit'])) 
		{
			$nm=$_FILES['sliderpic']['name'];
			$target = "../images/Slider".$_FILES['sliderpic']['name'];
			$datatarget = "images/Slider".$_FILES['sliderpic']['name'];
			if(!move_uploaded_file($_FILES['sliderpic']['tmp_name'],$target))
			{
				echo "Sorry can't upload file....";	
			}
			else
			{
				$query="update slider set img_nm='$nm',path='$datatarget'";
				mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			}
		}

        //Update About us page
		$about_msg="";
		if(isset($_POST['about_info']))
		{
			$pagedata=$_POST['info'];
			$query="update pages set page_desc='$pagedata' where page_nm='about_us'";
			mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			$about_msg="Update Successfully...";
		}



        //Update Reach us page
		$reach_us_msg="";
		if(isset($_POST['reach_info']))
		{
			
			$query="update reach_us set nm='".$_POST['reach_nm']."', add1='".$_POST['reach_add1']."', add2='".$_POST['reach_add2']."', city='".$_POST['reach_city']."', zipcode='".$_POST['reach_zip']."', state='".$_POST['reach_state']."', contact_no='".$_POST['contact_no']."' where uid=1";
			mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			$reach_us_msg="Update Successfully...";
		}
		
		
		
		$socia_error="";
		//Social Content Update
		if(isset($_POST['social_facebook']))
		{
			$query="update social_media set facebook='".$_POST['social_facebook']."' where uid=1";
			mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			$socia_error="Update Successfully...";
		}
		
        $socia_fb="";
		$socia_twi="";
		$socia_lin="";
		$socia_inst="";
		//Social Content Update
		if(isset($_POST['social_facebook']))
		{
			$query="update social_media set facebook='".$_POST['social_facebook']."' where uid=1";
			mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			$socia_fb="Update Successfully...";
		}
		if(isset($_POST['social_twitter']))
		{
			$query="update social_media set twitter='".$_POST['social_twitter']."' where uid=1";
			mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			$socia_twi="Update Successfully...";
		}
		if(isset($_POST['social_linked']))
		{
			$query="update social_media set linkedin='".$_POST['social_linked']."' where uid=1";
			mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			$socia_lin="Update Successfully...";
		}
		if(isset($_POST['social_insta']))
		{
			$query="update social_media set insta='".$_POST['social_insta']."' where uid=1";
			mysqli_query($link,$query) or die("Error updating data.".mysqli_error($link));
			$socia_inst="Update Successfully...";
		}
		
	
?>


<html>
	  <head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Art Gallery | Admin</title>
			<link href="../images/icon.png" rel="icon">
			<link href="../css/bootstrap.min.css" rel="stylesheet">
			<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<link href="style.css" rel="stylesheet">
	  </head>
	  <body>
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-9"><h3>Art Gallery</h3></div>
				<div class="col-md-3">
					<ul class="user-nav">
						<li class="dropdown user-icon">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span>Hi <?php echo $_SESSION['uname']; ?> </span> <span class="glyphicon glyphicon-user"></span>  <span class="glyphicon glyphicon-triangle-bottom"></span></a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="#"><span class=""></span> User Profile</a></li>
								<li><a href="#"><span class=""></span> Settings</a>
								</li>
								<li class="divider"></li>
								<li class="logout-li"><form method="post"><span class="glyphicon glyphicon-log-out"></span><button type="submit" name="logout" class="btn btn-default logout"> Logout</button></form></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="row center-container">
				<div class="col-md-2 left-nav">
					<ul class="nav nav-stacked left-menu">
						<li role="presentation"><a href="#dashboard" class="active">Dashboard</a></li>
						<li role="presentation"><a href="#home">Home</a></li>
						<li role="presentation"><a href="#about">About</a></li>
						<li role="presentation"><a href="#arts">Arts</a></li>
						<li role="presentation"><a href="#reach_us">Reach us</a></li>
						<li role="presentation"><a href="#manage_account">Manage Account</a></li>
					</ul>
				
				</div>
				<div class="col-md-10">
					<div class="pages center-container">
						<div id="dashboard" class="switchgroup dashboard">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Dashboard</h3>
								</div>
								<div class="panel-body">
									
									<!-- Social Links  -->
									<div class="panel panel-default social-links">
										<div class="panel-heading">
											<h4>Social Links</h4>
										</div>
										<div class="panel-body">
										<?php	
											$sql="select * from social_media where uid=1";
											$result=mysqli_query($link,$sql) or die("Error fetching data.".mysqli_error($link));
											$socialcontent=mysqli_fetch_assoc($result);
											mysqli_free_result($result);
										?>
											<form class="form-inline" method="post">
											  <div class="form-group">
												<div class="input-group">
												  <div class="input-group-addon">Facebook</div>
												  <input type="text" name="social_facebook" class="form-control" value="<?php echo $socialcontent['facebook']; ?>">
												</div>
											  </div>
											  <button type="submit" class="btn btn-success">Update</button>
											  <span class="text-success" style="padding-left:10px"><?php echo $socia_error; ?></span>
											</form>
											<form class="form-inline" method="post">
											  <div class="form-group">
												<div class="input-group">
												  <div class="input-group-addon">Twitter</div>
												  <input type="text" name="social_twitter" class="form-control" value="<?php echo $socialcontent['twitter']; ?>">
												</div>
											  </div>
											  <button type="submit" class="btn btn-success">Update</button>
											</form>
											<form class="form-inline" method="post">
											  <div class="form-group">
												<div class="input-group">
												  <div class="input-group-addon">LinkedIn</div>
												  <input type="text" name="social_linked" class="form-control" value="<?php echo $socialcontent['linkedin']; ?>">
												</div>
											  </div>
											  <button type="submit" class="btn btn-success">Update</button>
											</form>
											<form class="form-inline" method="post">
											  <div class="form-group">
												<div class="input-group">
												  <div class="input-group-addon">Instagram</div>
												  <input type="text" name="social_insta" class="form-control" value="<?php echo $socialcontent['insta']; ?>">
												</div>
											  </div>
											  <button type="submit" class="btn btn-success">Update</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- ------------------Home Page--------------  -->
						<div id="home" class="switchgroup dashboard">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Home</h3>
								</div>
								<div class="panel-body">
									<!-- Slider  -->
									<?php
										$query="select * from  slider";
										$result=mysqli_query($link,$query) or die("Error fetching data.".mysqli_error($link));
										
										
									?>
									
									<div class="panel panel-default slider-content">
										<div class="panel-heading">
											<h4>Slider Content<a href="#" class="pull-right" name="slider_add"  data-toggle="modal" data-target="#slider_img_add">Add&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span></a></h4>
										</div>
										<div class="panel-body">
												
												<form class="form-inline" method="post" enctype="multipart/form-data">
													
												  <div class="form-group">
													<div class="input-group">
													<?php
														while($slidercontent=mysqli_fetch_assoc($result))
														{
													?>
														<img src="../<?php echo $slidercontent['path']; ?>" alt="<?php echo $slidercontent['img_nm']; ?>" width="50" height="50"/>
														<input type="hidden" name="img_id" value=""/>
													</div>
												  </div>
												  <div class="form-group">
													<input type="file" name="sliderpic">
													<button type="submit" name="sliderPicSubmit" id="<?php echo $slidercontent['id']; ?>" class="btn btn-success glyphicon glyphicon-pencil"></button>
													<button type="submit" name="sliderPicDelete" class="btn btn-danger glyphicon glyphicon-remove"></button>
												   </div>
												   <?php
                                                            break;
                                                        }
                                                        
													?>
												</form>
										</div>
									</div>
									<!-- End Home Slider -->
									
									<!-- Social Links  -->
									<div class="panel panel-default social-links">
										<div class="panel-heading">
											<h4>Social Links</h4>
										</div>
										<div class="panel-body">
										<?php	
											$sql="select * from social_media where uid=1";
											$result=mysqli_query($link,$sql) or die("Error fetching data.".mysqli_error($link));
											$socialcontent=mysqli_fetch_assoc($result);
											mysqli_free_result($result);
										?>
											<form class="form-inline" method="post">
											  <div class="form-group">
												<div class="input-group">
												  <div class="input-group-addon">Facebook</div>
												  <input type="text" name="social_facebook" class="form-control" value="<?php echo $socialcontent['facebook']; ?>">
												</div>
											  </div>
											  <button type="submit" class="btn btn-success">Update</button>
											  <span class="text-success" style="padding-left:10px"><?php echo $socia_error; ?></span>
											</form>
											<form class="form-inline" method="post">
											  <div class="form-group">
												<div class="input-group">
												  <div class="input-group-addon">Twitter</div>
												  <input type="text" name="social_twitter" class="form-control" value="<?php echo $socialcontent['twitter']; ?>">
												</div>
											  </div>
											  <button type="submit" class="btn btn-success">Update</button>
											</form>
											<form class="form-inline" method="post">
											  <div class="form-group">
												<div class="input-group">
												  <div class="input-group-addon">LinkedIn</div>
												  <input type="text" name="social_linked" class="form-control" value="<?php echo $socialcontent['linkedin']; ?>">
												</div>
											  </div>
											  <button type="submit" class="btn btn-success">Update</button>
											</form>
											<form class="form-inline" method="post">
											  <div class="form-group">
												<div class="input-group">
												  <div class="input-group-addon">Instagram</div>
												  <input type="text" name="social_insta" class="form-control" value="<?php echo $socialcontent['insta']; ?>">
												</div>
											  </div>
											  <button type="submit" class="btn btn-success">Update</button>
											</form>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<!-- ------------------End Home Page--------------  -->
						
                        <!-- ---------------About page--------------->
						<div id="about" class="switchgroup dashboard">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>About us</h3>
								</div>
								<div class="panel-body">
									<!-- About us content  -->
									<div class="panel panel-default social-links">
										<div class="panel-heading">
											<h4>About us Content</h4>
										</div>
										<div class="panel-body">
										<?php	
											$sql="select * from pages where page_nm='about_us'";
											$result=mysqli_query($link,$sql) or die("Error fetching data.".mysqli_error($link));
											$aboutcontent=mysqli_fetch_assoc($result);
											mysqli_free_result($result);
										?>
											<form class="form-inline" method="post">
												<div class="form-group">
												  <textarea class="form-control" rows="10" cols="100" name="info" id="myInfo"><?php 
												  
														echo $aboutcontent['page_desc'];
												  
												  ?></textarea>
												</div>
												<br/>
												<span class="text-success" style="padding-left:10px"><?php echo $about_msg; ?></span>
												<br/>
												<div class="form-group">
													<button type="submit" class="btn btn-success" name="about_info">Update</button>
													
												</div>
											</form>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<!-- ------------------End About page--------------->
                        
                        <!-- ---------------Reach us page------------- -->
						<div id="reach_us" class="switchgroup dashboard">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Reach us</h3>
								</div>
								<div class="panel-body">
									<!-- Reach us content--> 
									<div class="panel panel-default social-links">
										<div class="panel-heading">
											<h4>Address</h4>
										</div>
										<div class="panel-body">
										<?php	
											$query="select * from reach_us where uid=1";
											$result=mysqli_query($link,$query) or die("Error fetching data.".mysqli_error($link));
											$contactetails=mysqli_fetch_assoc($result);
											mysqli_free_result($result);
										?>
											<form class="form-inline" method="post">
											  <div class="form-group reach_data">
												<div class="input-group">
												  <div class="input-group-addon">Name</div>
												  <input type="text" name="reach_nm" class="form-control" value="<?php echo $contactetails['nm']; ?>">
												</div>
											  </div>
											  <br/>
											  <div class="form-group reach_data">
												<div class="input-group">
												  <div class="input-group-addon">Address-1</div>
												  <input type="text" name="reach_add1" class="form-control" value="<?php echo $contactetails['add1']; ?>">
												</div>
											  </div>
											  <br/>
											  <div class="form-group reach_data">
												<div class="input-group">
												  <div class="input-group-addon">Address-2</div>
												  <input type="text" name="reach_add2" class="form-control" value="<?php echo $contactetails['add2']; ?>">
												</div>
											  </div>
											  <br/>
											  <div class="form-group reach_data">
												<div class="input-group">
												  <div class="input-group-addon">City</div>
												  <input type="text" name="reach_city" class="form-control" value="<?php echo $contactetails['city']; ?>">
												</div>
											  </div>
											  <br/>
											  
											  <div class="form-group reach_data">
												<div class="input-group">
												  <div class="input-group-addon">Zipcode</div>
												  <input type="text" name="reach_zip" class="form-control" value="<?php echo $contactetails['zipcode']; ?>">
												</div>
											  </div>
											  <br/>
											  <div class="form-group reach_data">
												<div class="input-group">
												  <div class="input-group-addon">State</div>
												  <input type="text" name="reach_state" class="form-control" value="<?php echo $contactetails['state']; ?>">
												</div>
											  </div>
											  <br/>
											  <div class="form-group reach_data">
												<div class="input-group">
												  <div class="input-group-addon">Contact No.</div>
												  <input type="text" name="contact_no" class="form-control" value="<?php echo $contactetails['contact_no']; ?>">
												</div>
											  </div>
											  <br/>
											  <br/>
											  <button type="submit" name="reach_info" class="btn btn-success">Update</button>
											  <span class="text-success" style="padding-left:10px"><?php echo $reach_us_msg; ?></span>
											</form>
										</div>
									</div>
									
								</div>
						</div>
						</div>
						<!-- ------------------End Reach us page--------------->
                        
                        
						
						
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="modal fade" id="slider_img_add" tabindex="-1" role="dialog" aria-labelledby="slider_img_add">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Slider Image</h4>
			  </div>
			  <form method="post" enctype="multipart/form-data" class="form-inline">
					
				  <div class="modal-body">
							<div class="form-group ">
								<input type="file" name="sliderpicpic_add">
							</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" name="picadd_submit" class="btn btn-primary">Add</button>
				  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		
		
		
		
		
		
		<script type="text/javascript">
		</script>
		
		
		
		
		
		
		<?php
			require_once('dbconclose.php');
		?>
		
		<script src="../js/jquery.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	  </body>
</html>