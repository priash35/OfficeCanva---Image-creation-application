<?php include "master/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
<script src="<?php echo base_url()?>assets/js/lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lib/jqueryui/jquery-ui.min.js"></script>
<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 210px;
	//height: 180px;
	cursor: pointer;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 210px;
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
</style>


</head>
<body>
<?php foreach($images as $value) {
	$c_name= $value->company_name;
} ?>
<div class="page-content">
	<div class="container-fluid">
		<section id="client_images" class="card">
			<div class="card-block">
				<div class="row m-t-lg">
					<form name="myform"  id="myform" action="<?php echo base_url()?>welcome/imgGallary" method="post" enctype="multipart/form-data">
						<div class="form-group">			
							<div class="form-control-wrapper">
								
								<label for="title">Add New Image:</label>
								<input type="file" class="form-control" name="add_photo" style="width:50%" required>
								<input type="hidden" value="<?php echo $c_name; ?>" name="c_name" >
							</div><br>			
						</div>
						<div class="form-group">
							<button type="submit" id="submit" name="add_image" class="btn">Save</button>
						</div>
					</form>

					

					<div class="heading"><h2>Image library</h3></div>
					<?php foreach($images as $row) {?>
					<div id="g1" class="gallery" >
						
						<img id="my_img" src="<?php echo $row->image; ?>"  alt="<?php echo $row->company_name; ?>">
						<!--<div id="cl_name" class="desc"><?php //echo $row->company_name; ?></div>-->
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</div>
</div>
</body>
<script>

$(document).ready(function() {  
$("img").click(function(){	
	var imageId = $(this).attr('src');
	var comp = $(this).attr('alt');
	//alert(imageId);
		window.location.href= "<?php echo site_url('Welcome/image_data');?>?id="+imageId+"&company="+comp;
    /* var imageId = document.getElementById("my_img").src;			
	alert(imageId); */
	/* $.ajax({ 
			url:"<?php echo base_url();?>welcome/image_data",  
            data: {id: imageId},  
            type: "POST",  
            success:function(){       
        }  
    });  */
});
	
});
</script>
</html>
<?php include "master/footer.php"; ?>