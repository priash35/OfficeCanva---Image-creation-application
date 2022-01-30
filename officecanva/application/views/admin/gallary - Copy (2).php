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
    width: 230px;
	//height: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 230px;
    height: 180px;
	
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>


</head>
<body>

<div class="page-content">
	<div class="container-fluid">

		<form name="myform"  id="myform" action="<?php echo base_url()?>welcome/imgGallary" method="post" enctype="multipart/form-data">
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
		<?php foreach($result as $row) {?>
		<div id="g1" class="gallery" >
			
			<img id="my_img" src="<?php echo $row->image; ?>"  alt="picture">
			<div class="desc">Image</div>
		</div>
		<?php } ?>
	</div>
</div>
</body>
<script>

$(document).ready(function() {  
$("img").click(function(){	
	var imageId = $(this).attr('src');
	//alert(imageId);
		window.location.href= "<?php echo site_url('Welcome/image_data');?>?id="+imageId;
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