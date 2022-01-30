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
							<h3>Update Employee</h3>
							        

							<!--<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">StartUI</a></li>
								<li><a href="#">Forms</a></li>
								<li class="active">jQuery Form Validation</li>
							</ol>-->
						</div>
							
							<form name="myform" id="myform" action="<?php echo base_url()?>Welcome/update_empdata" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<?php foreach($records as $row) { ?>
									<label class="form-label" for="signup_v1-username">Employee Name:</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control" name="emp_name" value="<?php echo $row->name; ?>" required>
										<input type="hidden" value="<?php echo $row->id;?>" name="id">
									</div><br>
																		
									<label class="form-label" for="signup_v1-username">Email Id:</label>
									<div class="form-control-wrapper">
										<input type="email" class="form-control" name="email" value="<?php echo $row->email; ?>" required>
									</div>
									<br>
									
									<label class="form-label" for="signup_v1-username">Password:</label>
									<div class="form-control-wrapper">
										<input type="password" class="form-control" name="pass" value="<?php echo $row->password; ?>" required>
									</div>
									<br>
									
									<label class="form-label" for="signup_v1-username">Contact Number:</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control" name="contact" value="<?php echo $row->phone; ?>" required>
									</div><br>
																											
									<label class="form-label" for="signup_v1-username">Address:</label>
									<div class="form-control-wrapper">
										<!--<input type="text" class="form-control" name="page_name" placeholder="Enter course name" required>-->
										<textarea style="width:100%;" class="form-control" type="text" id ="address" name="address"><?php echo $row->address; ?></textarea>
									</div><br>
									
									<label class="form-label" for="signup_v1-username">Designation:</label>
									<div class="form-control-wrapper">
										<input type="text" class="form-control" name="desig" value="<?php echo $row->designation; ?>" required>
									</div><br>
									
									<?php } ?>									
								</div>
								<div class="form-group">
									<button type="submit" name="update_emp" class="btn">Save</button>
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