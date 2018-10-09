<!DOCTYPE html>

<?php

	require_once('Admin/conn.php');
	
	$query="select * from social_media where uid=1";
	$result=mysqli_query($link,$query) or die("Error fetching data.".mysqli_error($link));
	$socialdetails=mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	$form_msg="";
	if(isset($_POST['registerClick']))
	{
		$fnm=trim($_POST['fnm']);
		$lnm=trim($_POST['lnm']);
		$gender=trim($_POST['gender']);
		$contact=trim($_POST['contact']);
		$email=trim($_POST['email']);
		$pwd=trim($_POST['pwd']);
		$dbpass=password_hash($pwd, PASSWORD_DEFAULT);
		$confirm=trim($_POST['confirmpwd']);
		$add1=trim($_POST['add1']);
		$add2=trim($_POST['add2']);
		$add3=trim($_POST['add3']);
		
		
		if($fnm=="" )
		{
			echo $form_msg="Please enter this field";
		}
		else if($lnm=="")
		{
			echo $form_msg="Please enter this field";
		}
		else if($contact=="")
		{
			echo $form_msg="Please enter this field";
		}
		else if($email=="")
		{
			echo $form_msg="Please enter this field";
		}
		else if($pwd=="")
		{
			echo $form_msg="Please enter this field";
		}
		else if($confirm=="")
		{
			echo $form_msg="Please enter this field";
		}
		else
		{
			if($pwd!=$confirm)
			{
				echo $form_msg="Set password and Confirm Password must be same.";
			}
			else
			{
			$query="insert into user_reg (fname,lname,gender,contact,email,password,add1,add2,add3) value('$fnm','$lnm','$gender','$contact','$email','$dbpass','$add1','$add2','$add3')";
				mysqli_query($link,$query) or die("Error inserting data.".mysqli_error($link));
				echo "success";
			}
		}
		
		
	}
	
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Gallery | <?php echo $title; ?></title>
    <link href="images/icon.png" rel="icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet"/>
	
  </head>
  <body>
  
	  <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog popup" role="document">
		<div class="modal-content">
		  
		  <div class="modal-body">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="panel panel-default">
			<div class="panel-heading" style="text-align:center">New Registration</div>
				<div class="panel-body">
					 <form class="form-horizontal" role="form" id="register" method="post">
					  <div class="form-group">
						<label class="control-label col-sm-3" for="FirstName">First Name</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="fnm" placeholder="Enter First Name">
						</div>
						<div class="col-sm-1">
						  <span class="val_err">*</span>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-offset-3 col-sm-9 pass_err"><?php echo $form_msg; ?></label>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-3" for="LastName">Last Name</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="lnm" placeholder="Enter Last Name">
						</div>
						<div class="col-sm-1">
						  <span class="val_err">*</span>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-offset-3 col-sm-9 pass_err"><?php echo $form_msg; ?></label>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-3" for="LastName">Gender</label>
						<div class="col-sm-8">
							<label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
							<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
						</div>
						<div class="col-sm-1">
						  <span class="val_err">*</span>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-offset-3 col-sm-9 pass_err"><?php echo $form_msg; ?></label>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-3" for="ContactNo">Contact No</label>
						<div class="col-sm-8">
						  <input type="number" class="form-control" name="contact" placeholder="Enter Contact No">
						</div>
						<div class="col-sm-1">
						  <span class="val_err">*</span>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-offset-3 col-sm-9 pass_err"><?php echo $form_msg; ?></label>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-3" for="email">Email</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control" name="email" placeholder="Enter email">
						</div>
					  <div class="col-sm-1">
						  <span class="val_err">*</span>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-offset-3 col-sm-9 pass_err"><?php echo $form_msg; ?></label>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-3" for="pwd">Set Password</label>
						<div class="col-sm-8"> 
						  <input type="password" class="form-control" name="pwd" placeholder="Enter password">
						</div>
						<div class="col-sm-1">
						  <span class="val_err">*</span>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-offset-3 col-sm-9 pass_err"><?php echo $form_msg; ?></label>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-3" for="conpwd">Confirm Password</label>
						<div class="col-sm-8"> 
						  <input type="password" class="form-control" name="confirmpwd" placeholder="Enter confirm password">
						</div>
						<div class="col-sm-1">
						  <span class="val_err">*</span>
						</div>
						<div class="form-group">
							<label class="col-sm-offset-3 col-sm-9 pass_err"><?php echo $form_msg; ?></label>
						  </div>
						
					  </div>
					  <div class="form-group">
						<label class="col-sm-offset-3 col-sm-9 pass_err" style="display:none">Set password and Confirm Password must be same.</label>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-3" for="address">Address</label>
						<div class="col-sm-8"> 
						  <input type="text" class="form-control" name="add1" placeholder="Address 1">
                          <input type="text" class="form-control" name="add2" placeholder="Address 2">
                          <input type="text" class="form-control" name="add3" placeholder="Address 3 (Optional)">
						</div>
					  </div>
					  <div class="form-group"> 
						<div class="col-sm-offset-3 col-sm-9">
						  <button type="submit" name="registerClick" id="registerClick" class="btn btn-primary">Submit</button>
						</div>
					  </div>
					</form>
				</div>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
	
	<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  
		  <div class="modal-body">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="panel panel-default">
			<div class="panel-heading" style="text-align:center">Log In</div>
				<div class="panel-body">
					 <form class="form-horizontal" role="form">
					  <div class="form-group">
						<label class="control-label col-sm-3">Email</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" id="username" placeholder="Enter Email">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-3">Password</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" name="pass" placeholder="Enter Password">
						</div>
					  </div>
					  <div class="form-group"> 
						<div class="col-sm-offset-3 col-sm-9">
						  <button type="submit" class="btn btn-primary">Login</button>
						  <button type="submit" class="btn btn-primary">Cancel</button>
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-12"><a href="#">Forgot Password</a></label>
						</div>
					  
					 </form>
				</div>
			</div>
		</div>
		  </div>
		  
		</div>
	  </div>
	</div>
		
      <div class="social-icon-area">
            <ul class="social-icons">
                <li><a href="<?php echo $socialdetails['facebook']; ?>" class="btn azm-social azm-size-48 azm-long-shadow azm-facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo $socialdetails['twitter']; ?>" class="btn azm-social azm-size-48 azm-long-shadow azm-twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?php echo $socialdetails['linkedin']; ?>" class="btn azm-social azm-size-48 azm-long-shadow azm-linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="<?php echo $socialdetails['insta']; ?>" class="btn azm-social azm-size-48 azm-long-shadow azm-instagram"><i class="fa fa-instagram"></i></a></li>
            </ul>
            
        </div>
     <nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Art Gallery</a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-right signup">
					<li><button id="signlog" data-toggle="modal" data-target="#signup" style="padding-top:11.5px"><span class="glyphicon glyphicon-user"></span> Sign Up</button>
					<li><button id="signlog" data-toggle="modal" data-target="#signin"><span class="glyphicon glyphicon-log-in"></span> Login</button>
					<li>
					 <form class="navbar-form navbar-left">
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="Search for product">
						<div class="input-group-btn">
						  <button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						  </button>
						</div>
					  </div>
					</form>
					</li>
				</ul>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right top_menu">
				
				<li <?php if($page=="index") echo 'class="active"' ?>><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
				<li <?php if($page=="aboutus") echo 'class="active"' ?>><a href="about_us.php">About us</a></li>
				<li class="dropdown <?php if($page=="arts") echo "active" ?>">
				  <a href="arts.php" class="dropdown-toggle <?php if($page=="arts") echo "active" ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Arts <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="arts.php">Oil Paintings</a></li>
					<li><a href="arts.php">Water Paintings</a></li>
					<li><a href="arts.php">Artices Special</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="arts.php">Gallery</a></li>
				  </ul>
				</li>
				<li <?php if($page=="contact_us") echo 'class="active"' ?>><a href="contact_us.php">Reach us</a></li>
				<li <?php if($page=="cart") echo 'class="active"' ?>><a href="cart.php">Cart us</a></li>
			  </ul>
			</div>
		  </div>
		</nav>