<?php
require_once 'header.php';
?>
<!-- row-app -->
<div class="row row-app">

	<!-- col -->
	

		<!-- col-separator.box -->
		<div class="col-separator col-unscrollable box">
			
			<!-- col-table -->
			<div class="col-table">
				
				<h4 class="innerAll margin-none border-bottom text-center bg-primary"><i class="fa fa-pencil"></i> Create a new Event</h4>

				<!-- col-table-row -->
				<div class="col-table-row">

					<!-- col-app -->
					<div class="col-app col-unscrollable">

						<!-- col-app -->
						<div class="col-app">

							<div class="login">
								
								<div class="placeholder text-center"><i class="fa fa-pencil"></i></div>
								
								<div class="panel panel-default col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

								  	<div class="panel-body">
								  		<form role="form" action="<?php echo getURL(array('page'=>'index')); ?>">
									  		<div class="form-group">
									    		<label for="exampleInputEmail1">Event Name</label>
									    		<input type="text" class="form-control" id="exampleInputEmail1" >
                                                <div class="media-icons">
                                                <a href=""><i class="fa fa-star"></i></a>
                                                <a href=""><i class="fa fa-star"></i></a>
                                                <a href=""><i class="fa fa-star"></i></a>
                                                <a href=""><i class="fa fa-star"></i></a>
                                                <a href=""><i class="fa fa-star"></i></a>
                                                </div>
									  		</div>
								  	  		<div class="form-group">
									    		<label for="exampleInputEmail1">Event Venue</label>
									    		<input type="email" class="form-control" id="exampleInputEmail1" >
									  		</div>
									  		<div class="form-group">
									    		<label for="exampleInputPassword1">Event Date</label>
									    		<input type="password" class="form-control" id="exampleInputPassword1" >
                                                <div class="media-icons">
								                  <a href=""><i class="fa fa-calendar"></i></a></div>
									  		    </div>
								    		
									  			<button type="submit" class="btn btn-primary btn-block">Create Event</button>
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

</div>
<!-- // END row-app -->

