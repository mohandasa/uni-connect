<?php
require_once 'header.php';
?>

<div class="innerLR">

	<!-- Row -->
	<div class="row">
	
		<!-- Column -->
		<div class="col-md-3">
			
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white" >

				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Details</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body"><form action="addexec.php" method="post" enctype="multipart/form-data" name="addroom">
					
					<div class="innerB"><input type="file" name="image" class="ed">
</div>
					<div class="innerB"><input type="text" placeholder="Caption" name="caption" type="text" id="brnu" class="form-control" />
</div>
				<!--<div class="innerB"><select style="width: 100%;" id="select2_3" placeholder="Albums">
					<option></option>
					<optgroup label="Alaskan/Hawaiian Time Zone">
	                   <option value="AK">Alaska</option>
	                   <option value="HI">Hawaii</option>
	               </optgroup>
	        	</select></div><div class="innerB">
                <input type="hidden" id="select2_5" style="width: 100%;" placeholder="Tags" value="" /></div>
					
				</div>
			</div>-->
            <div class="form-actions">
				<button type="submit" name="submit" class="btn btn-primary" id="button1"><i class="fa fa-check-circle"></i> Save</button>
				<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
			</div>
			<!-- // Widget END -->
            </form>
		</div>
		<!-- // Column END -->
		
		<!-- Column -->
	<div class="col-md-9 detailsWrapper">
					<!-- Widget -->
<div class="widget widget-heading-simple widget-body-white">
<!-- Widget heading -->
<div class="widget-head">
<h4 class="heading glyphicons file_import"><i></i>Preview</h4>
</div>
<!-- // Widget heading END -->
<div class="widget-body">
<!-- Dropzone -->
<div id="dropzone">
<form action="../assets/assets/upload.php" class="dropzone" id="demo-upload">
<div class="fallback">
   	<input name="file" type="file" multiple />
 	</div>
</form>
</div>

<div class="separator bottom"></div>
<p class="lead">This is just a demo dropzone. Uploaded files are <strong>not</strong> processed, BUT there is a Simple PHP Upload Example available in components/forms/file_manager/dropzone/assets/lib/dropzone-upload-sample.php</p>
<!-- // Dropzone END -->
</div>
</div>
<!-- // Widget END -->


				</div>
			</div>
		</div>
	</div>
	<!-- // Widget END -->

</div>

		<!-- // Column END -->
		
	</div>
	<!-- // Row END -->