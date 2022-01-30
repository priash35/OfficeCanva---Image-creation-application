<?php include 'master/header.php'; ?>
<style>
.heading{
	padding: 15px;
    text-align: center;
}
</style>
	<div class="page-content">
		<div class="container-fluid">	
			<section class="card">
				<div class="card-block">
					<div class="row">
						<div class="col-lg-12">

							<!-- <h5 class="m-t-lg with-border m-t-0">Default buttons</h5> -->
							<a href="<?php echo base_url();?>Welcome/add_empdata"><button class="btn btn-inline btn-primary btn-lg">Add New Employee</button></a><hr>
							<div class="heading"><h2>Employee List</h2></div>
							<!-- <table id="table-edit" class="table table-bordered table-hover"> -->
							<table class="table table-bordered table-hover "> 
								<thead>
								<tr>
									<th width="1">
										Sr. No.
									</th>
									<th>Employee Name</th>
									<th>Email</th>									
									<th>Contact Number</th>
									<th>Address</th>
									<th>Designation</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>

									
									<?php $i=1; foreach($emp as $post){?>
											<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $post->name;?></td>
													<td><?php echo $post->email;?></td>
													<td><?php echo $post->phone;?></td>
													<td><?php echo $post->address;?></td>
													<td><?php echo $post->designation;?></td>
													<td><a  href="<?php echo base_url(); ?>Welcome/EditEmpList/<?php echo $post->id;?>"><span class="tabledit-edit-button btn btn-sm btn-default glyphicon glyphicon-pencil"></span></a>
													<a  href="<?php echo base_url(); ?>Welcome/DeleteEmpList/<?php echo $post->id;?>"><span class="tabledit-edit-button btn btn-sm btn-default glyphicon glyphicon-trash"></span></a></td>
													
												</tr>
								   <?php $i++;}?>
								</tbody>
							</table>
				
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
	<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
	<!--.footer anre -content-->
	<script type="text/javascript">
	
	function delete_ins(ins_id)
		{	
			//alert('in javascript');
			if(ins_id!="")
			{
				var conf= confirm("Are you sure you want to delete?");
				
				if(conf)
				{
					window.location.href= "<?php echo site_url('admin/delete_course');?>?id="+ins_id;;
					
				}
			}
		}
		 
		
	</script>
	
<script src="<?php echo base_url()?>assets/js/app.js"></script>
</body>
</html>