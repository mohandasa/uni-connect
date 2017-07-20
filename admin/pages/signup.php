<?php

	$user_id = $_POST['signup-userid'];
	$password = $_POST['signup-password'];
	$fname = $_POST['signup-fname'];
	$lname = $_POST['signup-lname'];
	$designation = $_POST['signup-designation'];
	$branch = $_POST['signup-branch'];

	$message = '';
	if (!empty($user_id) && !empty($password)) {
		$user_id = mysql_real_escape_string(stripslashes($user_id));
		$password = mysql_real_escape_string(stripslashes($password));
		$fname = mysql_real_escape_string(stripslashes($fname));
		$lname = mysql_real_escape_string(stripslashes($lname));
		$designation = mysql_real_escape_string(stripslashes($designation));
		$branch = mysql_real_escape_string(stripslashes($branch));

		$message = "'" . $user_id . "', " . $branch . ", " . $designation . ", '" . $fname . "', '" . $lname . "'";

		$servername = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "uniconnect";
		$connection = new mysqli($servername, $dbuser, $dbpass, $dbname);
		// Check connection
		if ($connection->connect_error) {
		    $message = "Connection failed: " . $connection->connect_error;
		} else {
			$sql = "INSERT INTO users (user_id, password, role_id)
				VALUES ('" . $user_id . "', '" . $password . "', 2)";

			if ($connection->query($sql) === TRUE) {
			    $sql = "INSERT INTO user_profiles (user_id, branch_id, designation_id, first_name, 
			    	last_name, date_of_birth, date_of_joining, display_pic)
					VALUES ('" . $user_id . "', " . $branch . ", " . $designation . ", '" . $fname . "', '" . $lname . "', now(), now(), 1)";

				if ($connection->query($sql) === TRUE) {
					$message = "Success";
				} else {
					$message = "Error: " . $sql . "<br>" . $connection->error;
				}
			} else {
			    $message = "Error: " . $sql . "<br>" . $connection->error;
			}

			$connection->close();
		}
	}
?>
<!-- row-app -->
<div class="row row-app">

	<!-- col -->
	

		<!-- col-separator.box -->
		<div class="col-separator col-unscrollable box">
			
			<!-- col-table -->
			<div class="col-table">
				
				<h4 class="innerAll margin-none border-bottom text-center bg-primary"><i class="fa fa-pencil"></i> Create a new Account</h4>

				<!-- col-table-row -->
				<div class="col-table-row">

					<!-- col-app -->
					<div class="col-app col-unscrollable">

						<!-- col-app -->
						<div class="col-app">

							<div class="login">
								
								<div class="placeholder text-center"><i class="fa fa-pencil"></i></div>
								
								<div class="panel panel-default col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
									<?php echo $message; ?>
								  	<div class="panel-body">
								  		<form role="form" action="<?php echo getURL(array('page'=>'signup')); ?>" method="POST">
					  			  	  		<div class="form-group">
					  				    		<label for="signup-userid">User ID</label>
					  				    		<input type="text" class="form-control" id="signup-userid" 
					  				    			name="signup-userid" placeholder="Employee's User ID" />
					  				  		</div>
					  				  		<div class="form-group">
					  				  		 	<label for="signup-password">Password</label>
					  				  		 	<input type="password" class="form-control" id="signup-password" 
					  				  		 		name="signup-password" placeholder="Employee's Password" />
					  				  		</div>
									  		<div class="form-group">
									    		<label for="signup-fname">First Name</label>
									    		<input type="text" class="form-control" id="signup-fname" 
									    			name="signup-fname" placeholder="Employee's First Name" />
									  		</div>
                                            <div class="form-group">
									    		<label for="signup-lname">Last Name</label>
									    		<input type="text" class="form-control" id="signup-lname" 
									    			name="signup-lname" placeholder="Employee's Last Name" />
									  		</div>
                                            <div class="form-group">
									    		<label for="signup-designation">Designation</label>
									    		<input type="number" class="form-control" id="signup-designation" 
									    			name="signup-designation" placeholder="Employee's Designation" />
									  		</div>
                                            <div class="form-group">
									    		<label for="signup-branch">Branch</label>
									    		<input type="number" class="form-control" id="signup-branch" 
									    			name="signup-branch" placeholder="Employee's Branch" />
									  		</div>
									  		<button type="submit" class="btn btn-primary btn-block">Create Account</button>
										</form>
							  		</div>
								
								</div>
								<div class="clearfix"></div>					

							</div>
							
						</div>
						<!-- // END col-app -->

					</div>
					<!-- // END col-app.col-unscrollable -->

				</div>
				<!-- // END col-table-row -->
			
			</div>
			<!-- // END col-table -->
			
		</div>
		<!-- // END col-separator.box -->


</div>
<!-- // END row-app -->

