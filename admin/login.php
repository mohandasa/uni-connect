<?php
	$module = 'admin';

	/* 
	 * Load config.app;
	 * Main configuration file
	 */
	require_once 'config/config.app.php';

	$skin = isset($_GET['skin']) && $_GET['skin'] !== 'style-default' ? $_GET['skin'] : false;
	if ($skin)
		echo '<link href="' . ASSETS_PATH . '/css/skins/module.' . $module . '.stylesheet-complete.skin.' . $skin . '.min.css" rel="stylesheet" />';
	else
		echo '<link href="' . ASSETS_PATH . '/css/' . $module . '/module.' . $module . '.stylesheet-complete.min.css" rel="stylesheet" />';

	session_start();
	$error='';
	$username=$_POST['username'];
	$password=$_POST['password'];

	if (!empty($username) && !empty($password)) {
		$connection = mysql_connect("localhost", "root", "");

		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		$db = mysql_select_db("uniconnect", $connection);

		$query = mysql_query("select user_id, role_id from users where password='$password' AND user_id='$username'", $connection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
			$row = mysql_fetch_assoc($query);
			$_SESSION['login_user']=$row['user_id']; 
			$_SESSION['login_user_role']=$row['role_id']; 
			$ses_sql=mysql_query("select concat_ws(', ', up.first_name, up.last_name) as user_name, 
				b.branch_name,r.region_name, z.zone_name, d.designation_name from user_profiles up
				JOIN designations d on up.designation_id=d.designation_id
				JOIN branches b on up.branch_id=b.branch_id
			    JOIN regions r on r.region_id = b.region_id
			    JOIN zones z on z.zone_id = r.zone_id where up.user_id='" . $_SESSION['login_user'] . "'", $connection);
			$row = mysql_fetch_assoc($ses_sql);
			$_SESSION['user_name'] =$row['user_name'];
			$_SESSION['user_branch'] =$row['branch_name'];
			$_SESSION['user_region'] =$row['region_name'];
			$_SESSION['user_zone'] =$row['zone_name'];
			$_SESSION['user_designation'] =$row['designation_name'];
		} 
		else {
			$error = "Username or Password is invalid";
		}
		
		mysql_close($connection); 
	}

	if(isset($_SESSION['login_user'])) {
		header("location: index.php"); 
	}
	
?>

<html>
	<head>
		<script type="text/javascript" src="../assets/library/jquery/jquery.min.js"></script>
	</head>
	<body>
		<div class="layout-app col-fs">
			<div class="row row-app">
				<div class="col-md-12">
					<div class="col-separator col-separator-first box col-unscrollable col-fs">
						<div class="col-table">
							<div class="col-table-row">
								<div class="col-app col-unscrollable tab-content">
									<div class="col-app lock-wrapper lock-bg-1 tab-pane active animated fadeIn" id="lock-1-1">
										<h3 class="text-white innerB text-center"><img src="../assets/images/Union_Bank_of_India_Logo.png" width="300px" /></h3>
		                                <h4 class="text-white innerB text-center">Sign in to Uni-Connect</h4>
										<div class="lock-container">
											<div class="innerAll text-center">
												<img src="../assets/images/Login_Icon.png" width="100" />
												<div class="innerLR">
		                                        <form action="" method="post">
													
													<input class="form-control text-center bg-gray" id="name" name="username" placeholder="Username" type="text"/>
													<br />
		                                            
													<input class="form-control text-center bg-gray" id="password" name="password" placeholder="Password" type="password">
													<input class="btn btn-primary" id="loginBtn" name="submit" type="submit" value=" Login "/>
		                                            <br /><br />
													<span id="errorMessage"><?php echo $error; ?></span>
												</form>
													
											  </div>
												<a href="index.php<?php echo getURL(array('page'=>'forgotpass')); ?>" class="btn margin-none">Forgot password?</a>
										  </div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>

		
		<script type="text/javascript">
			$('#loginBtn').on('click', function(event) {
				var username = $('#name').val();
				var password = $('#password').val();
				if (username == undefined || username == ''
					|| password == undefined || password == '') {
					$('#errorMessage').html('Please enter username and password');
					event.preventDefault();
				} else {
					$('#errorMessage').html('');
				}
			});
		</script>
	</body>
</html>
