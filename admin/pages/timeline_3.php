<div class="innerAll" 
	ng-init="initUser({id:'<?php echo $_SESSION['login_user']; ?>', 
		name: '<?php echo $_SESSION['user_name']; ?>',
		branch: '<?php echo $_SESSION['user_branch']; ?>', 
		zone: '<?php echo $_SESSION['user_zone']; ?>', 
		region: '<?php echo $_SESSION['user_region']; ?>'
	})">
	<div class="row">
		<div class="col-lg-9 col-md-8">
			<div class="media" style="width: 90%">
	            <div class="innerB hidden-xs">
					<button class="btn btn-default filter" 
						ng-class="{active: selectedFilter === 'all'}"
						ng-click="filterCriteria=noFilter; selectedFilter='all';">Union Bank</button>
					<button class="btn btn-default filter" 
						ng-class="{active: selectedFilter === 'zone'}"
						ng-click="filterCriteria=filterByZone; selectedFilter='zone';">My Zone: {{thisUser.zone}}</button>
					<button class="btn btn-default filter" 
						ng-class="{active: selectedFilter === 'region'}"
						ng-click="filterCriteria=filterByRegion; selectedFilter='region';">My Region: {{thisUser.region}}</button>
	                <button class="btn btn-default filter" 
	                	ng-class="{active: selectedFilter === 'branch'}"
	                	ng-click="filterCriteria=filterByBranch; selectedFilter='branch';">My Branch: {{thisUser.branch}}</button>
				</div>
				<a href="" class="btn btn-default pull-left">Today</a>
				<div class="media-body">
					<div class="input-group">
					      <input type="text" class="form-control" id="timelineUserBlogEntry" 
					      	placeholder="Whats on your mind..." ng-model="blogContent">
					      <span class="input-group-btn">
					        <button class="btn btn-primary" id="timelinePostButton" 
					        	type="button" ng-click="submitBlog()"
					        	data-loading-text="Uploading...">Post</button>
					      </span>
					</div><!-- /input-group -->
				</div>
			</div>

			<ul class="timeline-activity list-unstyled">
				<li class="active" ng-repeat="blog in blogs | filter:filterCriteria | orderBy:predicate:reverse">
					<div class="block block-inline" style="width: 89%">
						<span class="marker"></span>
						<div class="caret"></div>
						<div class="box-generic">
							<div class="timeline-top-info border-bottom">
								<strong class="text-info">{{blog.content}}</strong> 
								from <a href="#"><img src="../assets/images/people/80/8.jpg" alt="photo" width="20"></a> <a href="<?php echo getURL(array('page'=>'index')); ?>">{{blog.user.name}}</a>
								<br />
								<div class="media-body">
                                    <div class="timeline-bottom pull-left">
            							<a href="" ng-click="like('content', blog)" ><i class="fa fa-thumbs-up"></i></a> {{blog.likes ? blog.likes.length : 0}} &nbsp; 
            						</div>
            						<div class="timeline-bottom pull-left">
										<i class="fa fa-comment"></i> {{blog.comments ? blog.comments.length : 0}} 
									</div>
									<div class="timeline-bottom pull-right">
										<i class="fa fa-clock-o"></i> {{blog.creation_time}} 
									</div> 
								</div>                  
							</div>
							<div class="media innerAll bg-gray margin-none" ng-repeat="comment in blog.comments | orderBy:predicate">
						        <a class="pull-left" href="#"><img src="../assets/images/people/80/8.jpg" alt="photo" class="media-object" width="35"></a>
						        <div class="media-body">
						          	<a href="" class="strong text-inverse">{{comment.user.id}}</a> {{comment.comment}}
					     			<br />
			                        <div class="timeline-bottom pull-left">
										<a href="" ng-click="like('comment', comment)" ><i class="fa fa-thumbs-up"></i></a> {{comment.likes ? comment.likes.length : 0}} 
									</div>
			                        <div class="timeline-bottom pull-right">
										<i class="fa fa-clock-o"></i> {{comment.creation_time}} 
									</div>
						        </div>
						    </div>
							<div class="innerAll">
								<div class="input-group col-md-12">
								      <input type="text" class="form-control"
								      	placeholder="Comment here..." ng-model="blog.newComment">
								      <span class="input-group-btn">
								        <button class="btn btn-primary" 
								        	id="timeline-addCommentBtn"
								        	ng-show="blog.newComment && blog.newComment.length > 0"
								        	type="button" ng-click="submitComment(blog)"
								        	data-loading-text="Uploading...">Add</button>
								      </span>
								</div><!-- /input-group -->
							</div>
						</div>
						
					</div>
				</li>
			</ul>
			
		</div>

		<div class="col-md-4 col-lg-3">
			<a href="<?php echo getURL(array('page'=>'events')); ?>">
				<div class="widget"><h4 class="bg-primary innerAll half border-bottom margin-none text-white">Event</h4>

			    <div class="innerAll half bg-primary border-bottom">
			        <div class="media innerAll half margin-none text-white">
			            <div class="pull-left"><i class="fa fa-fw fa-calendar fa-3x "></i></div>
			            <div class="media-body"><p class="strong lead margin-none">22 DEC 2013</p>
			                <p class="strong margin-none">1:00 - 5:00 pm</p></div>
			        </div>
			    </div>
			    <div class="innerAll half bg-gray border-bottom">
			        <div class="media innerAll half margin-none">
			            <div class="pull-left"><i class="fa fa-fw fa-map-marker fa-3x"></i></div>
			            <div class="media-body"><p class="strong lead margin-none">San Francisco</p>
			                <p class="strong margin-none">California, USA</p></div>
			        </div>
			    </div>
			</a>
		    <div class="innerAll text-center half">
		        <div class="btn-group">
		            <button class="btn btn-success"><i class="fa fa-fw fa-check"></i> Attend</button>
		            <button class="btn btn-default">I might go</button>
		        </div>
		    </div>
		</div>


		<!-- // END CALENDAR -->

		<!-- Widget -->
		<!-- FRIENDS INVITED START -->
		<div class="widget">
		    <div class="border-bottom">
		        <div class="innerAll half"><span class="badge bg-primary pull-right">215</span> Attending</div>
		    </div>
		    <div class="border-bottom">
		        <div class="innerAll half"><span class="badge bg-white bordered border-primary pull-right text-primary">585</span> Might Go
		        </div>
		    </div>
		    
		</div>
		<!-- // END FRIENDS INVITED -->
		<!-- End Widget -->

		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-white">
				
			<!-- Widget Heading -->
			<div class="widget-head">
				<h4 class="heading glyphicons glyphicons-social twitter"><i></i>Times of India</h4>
			</div>
			<!-- // Widget Heading END -->
			
			<div class="widget-body" data-builder-exclude="element children">
				<div class="jstwitter" data-gridalicious="false" data-type="slide" data-images="false"><span class="label label-default">Loading .. </span></div>
			</div>
		</div>
		<!-- // Widget END -->
	</div>
</div>

