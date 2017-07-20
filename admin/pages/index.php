<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "uniconnect";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM user_profiles up
				JOIN designations d on up.designation_id=d.designation_id
    			JOIN branches b on up.branch_id=b.branch_id
				JOIN users u on up.user_id=u.user_id
				where up.user_id='" . $_SESSION['login_user'] . "'";
		$result = $conn->query($sql);
		
		$pro = $result->fetch_assoc();
		
	?>

<style>
	.edit input[type=text] {
		height: 16px;
		font-size: 10px;
		border: 1px dotted steelblue;
		background-color: bisque;
		padding-left: 5px;
	}
</style>

<div class="innerAll">
	<div class="row">
		<div class="col-lg-9 col-md-8">
			<div class="timeline-cover">	
				<div class="cover">
					<div class="top">
						<img src="../assets//images/Union_Bank_of_India_Logo.gif" class="img-responsive" />					
					</div>
					<ul class="list-unstyled">
						<li class="active"><a href="<?php echo getURL(array('page'=>'index')); ?>"><i class="fa fa-fw fa-user"></i> <span>About</span></a></li>
						<li><a href="<?php echo getURL(array('page'=>'media_1')); ?>"><i class="fa fa-fw icon-photo-camera"></i> <span>Photos</span></a></li>
						<li><a href="<?php echo getURL(array('page'=>'messages')); ?>"><i class="fa fa-fw icon-envelope-fill-1"></i> <span>My Blogs</span></a></li>
					</ul>
				</div>
			</div>

			<div class="gridalicious-row" data-toggle="gridalicious" data-gridalicious-width="340" data-gridalicious-gutter="12" data-gridalicious-selector=".gridalicious-item">
				<div class="innerAll inner-2x loading text-center text-medium"><i class="fa fa-fw fa-spinner fa-spin"></i> Loading</div>
				<div class="loaded hide2">
                

			<h3>&nbsp;About</h3>

			<div class="row">
				<div class="col-sm-6">
					<div id="about-bio" class="widget">
						<div class="widget-head border-bottom bg-gray">
							<h5 class="innerAll pull-left margin-none">Short Bio</h5>
							<div class="pull-right edit-elem">
								<a data-target="#about-bio" class="text-muted editor-pencil">
									<i class="fa fa-pencil innerL"></i>
								</a>
								<a data-target="#about-bio" class="text-muted editor-check">
									<i class="fa fa-check innerL"></i>
								</a>
							</div>
						</div>
						<div class="widget-body">
							<div class="media innerB ">
								<a href="" class="pull-left">
									<img src="../assets/images/.jpg" alt="" width="75"/>
								</a>
								<div class="media-body display">
									<p><?php echo wordwrap($pro['bio'], 75, "<br />\n", TRUE);?>.</p>
								</div>
								<div class="media-body edit">
									<textarea rows="3" cols="50"><?php echo $pro['bio'];?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div id="about-hobbies" class="widget">
						<div class="widget-head border-bottom bg-gray">
							<h5 class="innerAll pull-left margin-none">Hobbies</h5>
							<div class="pull-right edit-elem">
								<a data-target="#about-hobbies" class="text-muted editor-pencil">
									<i class="fa fa-pencil innerL"></i>
								</a>
								<a data-target="#about-hobbies" class="text-muted editor-check">
									<i class="fa fa-check innerL"></i>
								</a>
							</div>
						</div>
						<div class="widget-body">
							<span class="innerR innerB">
								<i class="box-generic innerAll icon-chef-hat fa fa-3x" data-toggle="tooltip" data-original-title="Cooking" data-placement="bottom"></i>
							</span>
							<span class="innerR innerB">
								<i class="box-generic innerAll  icon-soccerball-fiil fa fa-3x" data-toggle="tooltip" data-original-title="Soccer" data-placement="bottom"></i>
							</span>
							<span class="innerR innerB">
								<i class="box-generic innerAll  icon-steering-wheel fa fa-3x" data-toggle="tooltip" data-original-title="Driving" data-placement="bottom"></i>
							</span>
							<span class="innerR innerB">
								<i class="box-generic innerAll  icon-swimming fa fa-3x" data-toggle="tooltip" data-original-title="Swimming" data-placement="bottom"></i>
							</span>
		                         <span class="innerR innerB">
								<i class="box-generic innerAll icon-chef-hat fa fa-3x" data-toggle="tooltip" data-original-title="Cooking" data-placement="bottom"></i>
							</span>
						</div>
					</div>
				</div>
                </div><div class="row">
				<div class="col-sm-6">
					<div id="about-basic-info" class="widget">
						<div class="widget-head border-bottom bg-gray">
							<h5 class="innerAll pull-left margin-none">Basic Info</h5>
							<div class="pull-right edit-elem">
								<a data-target="#about-basic-info" class="text-muted editor-pencil">
									<i class="fa fa-pencil innerL"></i>
								</a>
								<a data-target="#about-basic-info" class="text-muted editor-check">
									<i class="fa fa-check innerL"></i>
                                </a>
							</div>
						</div>
						<div class="widget-body">
							<dl class="dl-horizontal" style="margin-bottom: 15px;">
								<dt>Date of Birth</dt>
								<dd class="display"><?php echo $pro['date_of_birth'];?></dd>
								<dd class="edit"><input type="text" value="<?php echo $pro['date_of_birth'];?>" /></dd>
								<dt>Phone</dt>
								<dd class="display"><?php echo $pro['mob_phn_number'];?></dd>
								<dd class="edit"><input type="text" value="<?php echo $pro['mob_phn_number'];?>" /></dd>
								<dt>E-mail</dt>
								<dd class="display"><?php echo $pro['email_id'];?></dd>
								<dd class="edit"><input type="text" value="<?php echo $pro['email_id'];?>" /></dd>
                                <dt>Date of Joining</dt>
								<dd class="display"><?php echo $pro['date_of_joining'];?></dd>
								<dd class="edit"><input type="text" value="<?php echo $pro['date_of_joining'];?>1" /></dd>
							</dl>
						</div>
					</div>
				</div>
                <div class="col-sm-6">
					<div id="about-more-info" class="widget">
						<div class="widget-head border-bottom bg-gray">
							<h5 class="innerAll pull-left margin-none">Address</h5>
							<div class="pull-right edit-elem">
								<a data-target="#about-more-info" class="text-muted editor-pencil">
									<i class="fa fa-pencil innerL"></i>
								</a>
								<a data-target="#about-more-info" class="text-muted editor-check">
									<i class="fa fa-check innerL"></i>
								</a>
							</div>
						</div>
						<div class="widget-body">
							<dl class="dl-horizontal" style="margin-bottom: 15px;">
								<dt>Street </dt>
								<dd class="display"><?php echo $pro['address'];?></dd>
								<dd class="edit"><input type="text" value="<?php echo $pro['address'];?>" /></dd>
                                <dt>City </dt>
								<dd class="display"><?php echo $pro['city'];?></dd>
								<dd class="edit"><input type="text" value="<?php echo $pro['city'];?>" /></dd>
								<dt>State </dt>
								<dd class="display"><?php echo $pro['state'];?></dd>
								<dd class="edit"><input type="text" value="<?php echo $pro['state'];?>" /></dd>
								<dt>Pin code </dt>
								<dd class="display"><?php echo $pro['pincode'];?></dd>
								<dd class="edit"><input type="text" value="<?php echo $pro['pincode'];?>" /></dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div id="about-sec-ques" class="widget">
						<div class="widget-head border-bottom bg-gray">
							<h5 class="innerAll pull-left margin-none">Security Questions</h5>
							<div class="pull-right edit-elem">
								<a data-target="#about-sec-ques" class="text-muted editor-pencil">
									<i class="fa fa-pencil innerL"></i>
								</a>
								<a data-target="#about-sec-ques" class="text-muted editor-check">
									<i class="fa fa-check innerL"></i>
								</a>
							</div>
						</div>
						<div class="widget-body">
							<dl class="dl-horizontal" style="margin-bottom: 52px;">
								<dt>Question 1 </dt>
								<dd class="display">What is your Favourate colour?</dd>
								<dd class="edit"><input type="text" value="What is your Favourate colour?" /></dd>
                                <dt>Answer </dt>
								<dd class="display">Pink</dd>
								<dd class="edit"><input type="text" value="Pink" /></dd><br />
								<dt>Question 2 </dt>
								<dd class="display">What is your pet's name?</dd>
								<dd class="edit"><input type="text" value="What is your pet's name?" /></dd>
								<dt>Answer </dt>
								<dd class="display">Moti</dd>
								<dd class="edit"><input type="text" value="Moti" /></dd><br />
                                <dt>Question 3 </dt>
								<dd class="display">What is your mother's maiden name?</dd>
								<dd class="edit"><input type="text" value="What is your mother's maiden name?" /></dd>
                                <dt>Answer </dt>
								<dd class="display">Devi</dd>
								<dd class="edit"><input type="text" value="Devi" /></dd>
							</dl>
						</div>
					</div>
				</div>
                <div class="col-sm-6">
					<div id="about-change-pass" class="widget">
						<div class="widget-head border-bottom bg-gray">
							<h5 class="innerAll pull-left margin-none">Change Password</h5>
							<div class="pull-right edit-elem">
								<a data-target="#about-change-pass" class="text-muted editor-pencil">
									<i class="fa fa-pencil innerL"></i>
								</a>
								<a data-target="#about-change-pass" class="text-muted editor-check">
									<i class="fa fa-check innerL"></i>
								</a>
							</div>
						</div>
						<div class="widget-body">
							<dl class="dl-horizontal" style="margin-bottom: 15px;">
								<dt>Current Password</dt>
								<dd class="display">*********</dd>
								<dd class="edit"><input type="text" value="" /></dd>
								<dt>New Password</dt>
								<dd class="display">******</dd>
								<dd class="edit"><input type="text" value="" /></dd>
								<dt>Re-enter Password</dt>
								<dd class="display">******</dd>
								<dd class="edit"><input type="text" value="" /></dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		<div class="col-md-4 col-lg-3">

			<div class="widget">
				<div class="widget-body text-center">
					<a href=""><img src="../assets/images/.jpg" width="120" alt="" class="img-circle"></a>
					<h2 class="strong margin-none"><?php echo $_SESSION['login_user']; ?></h2>
                    				<div><?php echo $_SESSION['user_designation'];?></div>
									<div><?php echo $_SESSION['user_branch'];?></div>
					<div class="innerB"></div>
					<div class="btn-group-vertical btn-block">
						<a id="about-edit-button" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Edit Account</a>
						<a id="about-done-edit-button" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Done Editing</a>
					</div>
				</div>
			</div>

			<div class="widget">
	<h5 class="innerAll margin-none border-bottom bg-gray">Recent Updates</h5>
	<div class="widget-body padding-none">
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="" class="text-inverse">Social Admin Released</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="" class="text-inverse">Timeline Cover Page</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="" class="text-inverse">1000+ Sales</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="" class="text-inverse">On-Page Optimization</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="" class="text-inverse">14th Admin Template</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
			</div>
</div>





		
		</div>
	</div>
</div>








