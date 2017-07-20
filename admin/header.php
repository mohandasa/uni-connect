<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial sidebar sidebar-social footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial sidebar sidebar-social footer-sticky"><!-- <![endif]-->
<head>
	<title>Uni-Connect</title>
	
	<!-- Meta -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
	<!-- 
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	<link rel="stylesheet/less" href="../assets/less/admin/module.admin.stylesheet-complete.less" />
	-->

		<!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->

	<?php 
		if(!isset($_SESSION['login_user'])) {
			header('Location: login.php'); // Redirecting To Home Page
		}
	?>
		
	<?php
		$skin = isset($_GET['skin']) && $_GET['skin'] !== 'style-default' ? $_GET['skin'] : false;
		if ($skin)
			echo '<link href="' . ASSETS_PATH . '/css/skins/module.' . $module . '.stylesheet-complete.skin.' . $skin . '.min.css" rel="stylesheet" />';
		else
			echo '<link href="' . ASSETS_PATH . '/css/' . $module . '/module.' . $module . '.stylesheet-complete.min.css" rel="stylesheet" />';
	?>

	
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	<?php 
	foreach ($scripts as $id => $script)
	{
		$sections = !empty($script['sections']) && !empty($script['sections'][$page]);
		$inPages = in_array($page, $script['pages']);
		$inSections = !$sections ? false : in_array($section, $script['sections'][$page]);

		if ($script['header'] && ((!$sections && $inPages) || ($sections && $inSections)))
			echo '<script src="' . $script['file'] . '"></script>' . "\n\t";
	} 
	?>
	<script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>
	
	<style>
		#menu {
			background: none !important;
		}

		#header-newsfeed-menu {
			padding: 15px 15px 0px 15px;
			font-weight: bold;
			border-right: 1px solid #efefef;
			height: 54px;
		}

		#header-searchbox {
			border-left: none;
		}

		#header-searchbox .btn.btn-default {
			background: #fff;
			border: 1px solid #e7e7e7;
			border-top-right-radius: 4px;
			border-bottom-right-radius: 4px;
		}

		#header-searchbox .btn.btn-default:hover {
			background: #efefef;
		}

		#header-searchbox input[type=text] {
			height: 34px;
			display: table;
			left: 0;
			padding: 0px;
			padding-left: 38px;
			margin-top: 9px;
			border: none;
			border: 1px solid #e7e7e7;
			border-radius: 4px;
			border-top-right-radius: 0;
			border-bottom-right-radius: 0;
		}
		
	</style>
</head>

<body ng-app="myapp" class=" menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid menu-hidden" ng-controller="BlogsController">

		<!-- Main Sidebar Menu -->
		<div id="menu" class="hidden-print hidden-xs sidebar-default sidebar-brand-primary">
			
			<div id="sidebar-social-wrapper">
				<div id="brandWrapper">
					<a href="<?php echo getURL(array('page'=>'timeline_3')); ?>"><span class="text" style="padding-left:55px">Uni-Connect</span></a>
				</div>
				<ul class="menu list-unstyled">
					<?php Menu::make($config["menu"]["admin"], $page, $module); ?>	</ul>
			</div>
		</div>
		<!-- // Main Sidebar Menu END -->
				
		
		
		<!-- messages menu START -->
		<div id="menu-right">
			<div>
				<button class="btn btn-inverse btn-xs btn-close" data-toggle="sidr-close" data-menu="menu-right"><i class="fa fa-times"></i></button>

				<div class="tab-content">
					<div class="tab-pane" id="chat-conversation">
						<ul>
							<li>
								<div class="innerAll"><button class="btn btn-primary" data-toggle="tab" data-target="#chat-list"><i class="fa fa-fw fa-user"></i> friends</button></div>
							</li>
							<li class="conversation innerAll">
								<!-- Media item -->
								<div class="media">
									<small class="author"><a href="#" title="" class="strong">Jane Doe</a></small>
									<div class="media-object pull-left"><img src="../assets/images/people/50/1.jpg" alt="Image" class="img-circle" /></div>
									<div class="media-body">
										<blockquote>
											<small class="date"><cite>just now</cite></small>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, sit?</p>
										</blockquote>
									</div>
								</div>
								<!-- // Media item END -->
								
								<!-- Media item -->
								<div class="media primary right">
									<small class="author"><a href="#" title="" class="strong">John Doe</a></small>
									<div class="media-object pull-right"><img src="../assets/images/people/50/2.jpg" alt="Image" class="img-circle" /></div>
									<div class="media-body">
										<blockquote class="pull-right">
											<small class="date"><cite>15 seconds ago</cite></small>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, molestiae!</p>
										</blockquote>
									</div>
								</div>
								<!-- // Media item END -->
								
								<!-- Media item -->
								<div class="media">
									<small class="author"><a href="#" title="" class="strong">Ricky</a></small>
									<div class="media-object pull-left"><img src="../assets/images/people/50/1.jpg" alt="Image" class="img-circle" /></div>
									<div class="media-body">
										<blockquote>
											<small class="date"><cite>5 minutes ago</cite></small>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, distinctio!</p>
										</blockquote>
									</div>
								</div>
								<!-- // Media item END -->
							</li>
						</ul>
					</div>
					
					<div class="tab-pane active" id="chat-list">
						<div class="mixitup" id="mixitup-chat" data-show-default="mixit-chat-1" data-layout-mode="list" data-target-selector=".mix" data-filter-selector=".filter-chat">
							<ul>	
								<li class="category border-bottom">Messages</li>

								<li>	
									<div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/1.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Perpetua Inger</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/2.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Zoticus Axel</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/3.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Yun Ragna</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>

									<div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/4.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Victor Tacitus</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>

									<div class="mixit-chat-1 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/5.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Arden Catharine</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/6.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Mihovil Govinda</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/7.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Mariya Hadya</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/8.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Tahir Benedikt</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/9.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Olayinka Kristin</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-2 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/10.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Danko Nikodim</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/11.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Zoja Aileas</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/12.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Alphonsus Braidy</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/13.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Helene Liana</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/14.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Sebastian Niklas</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class="mixit-chat-3 mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/15.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Elvire Maya</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
									
									<div class=" mix media border-bottom innerAll margin-none">
										<a href="#chat-conversation" data-toggle="tab" class="pull-left media-object"><img src="../assets/images/people/35/16.jpg" class="img-circle" /></a>
										<div class="media-body">
											<a href="#chat-conversation" data-toggle="tab" class="pull-right text-muted innerT half">
												<i class="fa fa-comments"></i> 4
											</a>
											<h5 class="margin-none"><a href="#chat-conversation" data-toggle="tab" class="text-white">Kerman Otakar</a></h5>
											<small>Hey, the party is on tonight!</small>
										</div>
									</div>
								</li>
								<!-- end of message list -->
							</ul>
						</div>
					</div>
					<!-- end of messages tab pane -->
				</div>
				<!-- end of tabs -->
			</div>
		</div>
		<!-- messages menu END -->
		
		<!-- Content START -->
		<div id="content">
			
			<!-- NAVBAR START -->
			<div class="navbar hidden-print navbar-default box main" role="navigation">
				<div class="user-action user-action-btn-navbar pull-left">
					<a href="#menu" class="btn btn-sm btn-navbar btn-open-left"><i class="fa fa-bars fa-2x"></i></a>
				</div>
				<!-- // show-menu -->

				<div class="pull-left" id="header-newsfeed-menu">
					<a href="<?php echo getURL(array('page'=>'timeline_3')); ?>">News Feed</a>
				</div>
				<!-- // show-bloggs-feed -->

				<div id="header-searchbox" class="input-group pull-left hidden-xs col-lg-3"
					style="margin-left: 15px;">
				  	<span class="input-group-addon"><i class="icon-search"></i></span>
				  	<input type="text" class="form-control" placeholder="Search"/>
				  	<span class="input-group-btn">
		  	        	<button class="btn btn-default" type="button">Go!</button>
		  	      	</span>
				</div>
				<!-- // search-bar -->

				<div class="user-action user-action-btn-navbar pull-right border-left">
					<a href="#menu-right" class="btn btn-sm btn-navbar btn-open-right"><i class="fa fa-comments fa-2x"></i></a>
				</div>
				<!-- // show-messages -->

				<div class="user-action pull-right menu-right-hidden-xs menu-left-hidden-xs border-left">
					<div class="dropdown username pull-left">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="media margin-none">
								<span class="pull-left"><img src="../assets/images/.jpg" alt="user" class="img-circle"></span>
								<span class="media-body"><?php echo $_SESSION['login_user']; ?><span class="caret"></span></span>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo getURL(array('page'=>'index')); ?>" >About</a></li>
							<li><a href="<?php echo getURL(array('page'=>'logout')); ?>">Logout</a></li>
					    </ul>
					</div>
				</div>
				<!-- // user-actions -->

				<?php
					if(isset($_SESSION['login_user_role']) && $_SESSION['login_user_role'] == '1') {
						echo 
					    '<div class="user-action pull-right menu-right-hidden-xs menu-left-hidden-xs border-left">
							<div class="dropdown username pull-left">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<span class="media margin-none">
										<span class="pull-left"><i class="notif-block icon-user-2"></i></span>
										<span class="media-body">Admin<span class="caret"></span></span>
									</span>	
								</a>
								<ul class="dropdown-menu">
									<li><a href="' . getURL(array('page'=>'signup')) . '" >Create New User</a></li>
									<li><a href="' . getURL(array('page'=>'media_3')). '">Upload Picture</a></li>
									<li><a href="' . getURL(array('page'=>'signup1')). '">Create Event</a></li>
							    </ul>
							</div>
						</div>
						<!-- // admin-actions -->';
					}
				?>
			</div>
			<!-- NAVBAR END -->


			<!-- <div class="layout-app">  -->
			