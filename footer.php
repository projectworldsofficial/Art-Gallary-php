		<div class="row footer">
			<div class="col-md-12">
				<div class="row inner_footer">
					<div class="col-md-3 quick_links">
						<h3>Quick Links</h3>
						<ul>
							<li <?php if($page=="index") echo 'class="active"' ?>><a href="index.php">Home</a></li>
							<li <?php if($page=="aboutus") echo 'class="active"' ?>><a href="about_us.php">About us</a></li>
							<li <?php if($page=="arts") echo 'class="active"' ?>><a href="arts.php">Arts</a></li>
							<li <?php if($page=="contact_us") echo 'class="active"' ?>><a href="contact_us.php">Reach us</a></li>
						</ul>
					</div>
					<div class="col-md-9 email_subscriber">
						<h3>Email Subscriber</h3>
						<form method="post">
							<input type="email" name="email_subscriber" placeholder="Email" /><br />
							<input type="submit" value="Subscriber" />
						</form>
					</div>
				</div>
				<div class="row copyright_tag">
					<div class="col-md-12">
						<h4>Copyright &copy; 2018 Art Gallery Brought To You By <a href ="https://www.projectworlds.in">Projectworlds</a></h4>
					</div>
				</div>
			</div>
		  </div>
		</div>
	<?php
			require_once('Admin/dbconclose.php');
	?>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>  
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>