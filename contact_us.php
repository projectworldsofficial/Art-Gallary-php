<?php

	$page="contact_us";
	$title="Reach us";
	require_once('header.php');
	
?>
        
		<div class="container-fluid">
		  <div class="row reach_us_data">
			<div class="col-md-6 comment_form">
				<div class="panel panel-default">
				  <div class="panel-heading">Leave Comment</div>
				  <div class="panel-body">
						<form class="form-horizontal">
						  <div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Name <span>*</span></label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" placeholder="Enter Name">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputEmail" class="col-sm-2 control-label">Email <span>*</span></label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" placeholder="Email">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputComment" class="col-sm-2 control-label">Comment </label>
							<div class="col-sm-10">
							  <textarea class="form-control" rows="3"></textarea>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="submit" class="btn btn-default">Comment</button>
							</div>
						  </div>
						</form>
				  </div>
				</div>	
				
			</div>
			<div class="col-md-6 address">
			<?php
				$query="select * from reach_us where uid=1";
				$result=mysqli_query($link,$query) or die("Error fetching data.".mysqli_error($link));
				$contactetails=mysqli_fetch_assoc($result);
				mysqli_free_result($result);
			?>
			
				<div class="panel panel-default">
				  <div class="panel-heading">Address</div>
				  <div class="panel-body">
					  <div class="jumbotron">
						<p><?php echo $contactetails['nm']; ?></p>
						<p><?php echo $contactetails['add1']; ?></p>
						<p><?php if($contactetails['add2']!="") 
						{
							echo $contactetails['add2'];
						}
						else
							echo "";
						?></p>
						<p><?php echo $contactetails['city']; ?></p>
						<p><?php echo $contactetails['zipcode']; ?></p>
						<p><?php echo $contactetails['state']; ?></p>
						<br/>
						<p>Contact No: <?php echo $contactetails['contact_no']; ?></p>
					  </div>
				</div>
				 </div>
				</div>
			</div>	
		  
		  
<?php

	require('footer.php');
?>