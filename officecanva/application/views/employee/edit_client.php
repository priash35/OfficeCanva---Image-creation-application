<?php include 'master/header.php'; ?>

	<div class="page-content">
		<div class="container-fluid">	
			<section class="card">
				<div class="card-block">
					<div class="row">
					
					</div><!--.row-->

					<div class="row m-t-lg">
						<div class="col-md-8">
						<div class="tbl-cell">
							<h3>Update Client</h3>
							        

							<!--<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">StartUI</a></li>
								<li><a href="#">Forms</a></li>
								<li class="active">jQuery Form Validation</li>
							</ol>-->
						</div>
							
							<form name="myform" id="myform" action="<?php echo base_url()?>Welcome/update_clientdata" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<?php foreach($records as $row) { ?>
									<label class="form-label" for="signup_v1-username">Company Name:</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control" name="company" value="<?php echo $row->company_name; ?>" required>
										<input type="hidden" value="<?php echo $row->id;?>" name="client_id">
									</div><br>
												
									<label class="form-label" for="signup_v1-username">Client Name:</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control" name="name" value="<?php echo $row->client_name; ?>" required>
									</div><br>
									
									<label class="form-label" for="signup_v1-username">Address:</label>
									<div class="form-control-wrapper">
										<!--<input type="text" class="form-control" name="page_name" placeholder="Enter course name" required>-->
										<textarea style="width:100%;" class="form-control" type="text" id ="address" name="address"><?php echo $row->address; ?></textarea>
									</div><br>
									
									<label class="form-label" for="signup_v1-username">Email Id:</label>
									<div class="form-control-wrapper">
										<input type="email" class="form-control" name="email" value="<?php echo $row->email; ?>" required>
									</div>
									<br>
																		
									<label class="form-label" for="signup_v1-username">Contact Number:</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control" name="contact" value="<?php echo $row->contact; ?>" required>
									</div><br>
									
									<label class="form-label" for="signup_v1-username">Business Category:</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control" name="b_cat" value="<?php echo $row->business_category; ?>" required>
									</div><br>
									
															
									<label class="form-label" for="signup_v1-username">Company Logo:</label>
									<div class="form-control-wrapper">
										<input type="file" class="form-control" name="logo" required>
										<input type="hidden" name="ins_image" value="<?php echo $row->logo;?>" /><br>
										<img src="<?php echo $row->logo;?>" style="width:200px; height:150px;"/>
									</div><br>
																										
									<label class="form-label" for="signup_v1-username">Website:</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control" name="website" value="<?php echo $row->website_url; ?>" required>
									</div><br>
									<?php } ?>									
								</div>
								<div class="form-group">
									<button type="submit" name="update_client" class="btn">Save</button>
								</div>
							</form>
							
							<!--<form name="myform" id="myform" action="<//?php echo base_url()?>Page/test" method="post">
								<div class="form-group">
									<label class="form-label" for="signup_v1-username">Username</label>
									<div class="form-control-wrapper">
										<span id="bn-success"><//?php //echo validation_errors(); ?></span>
										<input type="text" class="form-control" name="page_name">
									</div>
								</div>
								<div class="form-group">
									<button type="submit" name="register" class="btn">Add Page</button>
								</div>
							</form>-->
							<!--<div class="form-group">
								
									<label class="form-label" for="signup_v1-username">Username</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control"  id="fullname" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" name="register" value="hello" id="btnhello" class="success btn btn-success">Add Page</button>
									<span id="bn-success"></span>
									  

								</div>-->
							
							
						</div>						
												
					</div><!--.row-->
				</div>
			</section>
		</div><!--.container-fluid-->
	</div><!--.page-content-->
	

	<?php include 'master/footer.php'; ?>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/lib/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/lib/bootstrap-notify/bootstrap-notify-init.js"></script>
	<!--.footer anre -content-->
	
	
<script src="<?php echo base_url()?>assets/js/app.js"></script>
</body>
</html>