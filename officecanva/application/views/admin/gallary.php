<?php include "master/header.php"; ?>

<!DOCTYPE html>
<html>
<head>

<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 210px;
	//height: 180px;
	cursor: pointer;
	display: inline;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 209px;
    height: 180px;	
}
.heading{
	padding: 15px;
    text-align: center;
}
div.desc {
    padding: 10px;
    text-align: center;
	border-top: 1px solid #ccc;
}
.test{
	float: left;
	display: inline;
}
</style>


</head>
<body>

<div class="page-content">
	<div class="container-fluid">
		<section class="card">
			<div class="card-block">
				<div class="row m-t-lg">
					<!--<form name="myform"  id="myform" action="<?php echo base_url()?>welcome/imgGallary" method="post" enctype="multipart/form-data">
						<div class="form-group">			
							<div class="form-control-wrapper">
								<label for="title">Add New Image:</label>
								<input type="file" class="form-control" name="add_photo" style="width:50%" required>
							</div><br>			
						</div>
						<div class="form-group">
							<button type="submit" id="submit" name="add_image" class="btn">Save</button>
						</div>
					</form>

					

					<div class="desc"><h2>Image library</h3></div>
					<?php //foreach($result as $row) {?>
					<div id="g1" class="gallery" >
						
						<img id="my_img" src="<?php //echo $row->image; ?>"  alt="picture">
						<div class="desc">Image</div>
					</div>-->
					<?php //} ?>
					
					<div class="heading"><h2>Clients Gallary</h2></div>
					<?php foreach($result as $row) {?>
					<div id="g1" class="gallery" >			
						<img id="my_img" src="<?php echo $row->logo; ?>" style="padding: 60px 30px;" alt="<?php echo $row->company_name; ?>">
						<div id="company" class="desc"><?php echo $row->company_name; ?></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		
		
		<section id="client_images" class="card hidden">
			<div class="card-block">
				<div class="row m-t-lg">
					<form name="myform"  id="myform" action="<?php echo base_url()?>welcome/imgGallary" method="post" enctype="multipart/form-data">
						<div class="form-group">			
							<div class="form-control-wrapper" id="add_file">
								<label for="title">Add New Image:</label>
								<input type="file" class="form-control" id="add_photo" name="add_photo" style="width:50%" required>
								<input type="hidden" name="c_name" id="c_name" value="" />
							</div><br>			
						</div>
						<div class="form-group">
							<button type="submit" id="submit" name="add_image" class="btn">Save</button>
						</div>
					</form>
				

					<div class="heading"><h2>Image library</h3></div>
					<div id="cl_data" class="row">
						<!--<div class="gallery" >						
							<img id="cl_img"  alt="picture">
							<div id="cl_name" class="desc"></div>
						</div>-->
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</body>

<?php include "master/footer.php"; ?>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lib/jqueryui/jquery-ui.min.js"></script>
</html>

<script>

$(document).ready(function() {  

	$("#g1 img").click(function(){	
		var logo = $(this).attr('src');
		var comp = $(this).attr('alt');
		//alert(comp);
		//alert(imageId);
			//window.location.href= "<?php echo site_url('Welcome/client_image_data');?>?logo="+logo+"&company="+comp;
		$.ajax({ 
				url:"<?php echo base_url();?>Welcome/client_image_data",  
				data: {logo: logo, comp:comp},  
				type: "POST",  
				success:function(data){ 
					 //alert(data);
					 $("#client_images").removeClass("hidden");
					  $("#client_images").addClass("show");
					  
					var company = '';
					company = '<input type="hidden" name="c_name" id="c_name" value="'+comp+'" />';
					$('#add_file').append(company);
					 $("#cl_data").html("");
					//var myJSON = JSON.stringify(data);			
					//var arr = $(this).html(data.contact);  
					var mydata = JSON.parse(data);
					
					 for(i=0; i< mydata.length; i++)
					{
						var id =  mydata[i].id;
						var image = mydata[i].image;
						var company_name = mydata[i].company_name;
						
						var res= '';
						res ='<div id="g2" class="gallery"><img id="cl_img['+i+']" class="cl_img" src="'+image+'" alt="picture" ><div id="cl_name" class="desc">'+company_name+'</div></div>';
						$('#cl_data').append(res);				
						
					} 
					$(".cl_img").click(function(){	
						var imageId = $(this).attr('src');
						window.location.href= "<?php echo site_url('Welcome/image_data');?>?id="+imageId;	
						//var imageId = document.getElementById("cl_img").src;
								
						//alert(imageId);							
					});
					$('#c_name').val(company_name);						
				}  
		}); 	
	});
});


	
</script>
