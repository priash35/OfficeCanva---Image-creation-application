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
					
					<div class="heading"><h2>Clients</h2></div>
					<?php foreach($result as $row) {?>
					<div id="g1" class="gallery" >			
						<img id="my_img" src="<?php echo $row->logo; ?>" style="padding: 60px 30px;" alt="picture">
						<div id="company" class="desc"><?php echo $row->company_name; ?></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		
		
		<section id="client_images" class="card">
			<div class="card-block">
				<div class="row m-t-lg">
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
					<div id="g2" class="gallery" >						
						<img id="cl_img"  alt="picture">
						<div id="cl_name" class="desc">Image</div>
					</div>
					<table id= "userdata" border="2">
					  
					
				</div>
			</div>
		</section>
	</div>
</div>
</body>
<script>/* 

$(document).ready(function() {
	
	
  var jsonp = '[{"Lang":"jQuery","ID":"1"},{"Lang":"C#","ID":"2"}]';
  var lang = '';
  alert(jsonp);
  var obj = $.parseJSON(jsonp);
  $.each(obj, function() {
      lang += this['Lang'] + "<br/>";
  });
  $('span').html(lang);
})
 */
$(document).ready(function() {  

$("#g1 img").click(function(){	
	var logo = $(this).attr('src');
	//alert(imageId);
		//window.location.href= "<?php echo site_url('Welcome/image_data');?>?id="+imageId;
    //var imageId = document.getElementById("my_img").src;	
		//var comp = document.getElementById("company").innerHTML;	
	//alert(logo);
	//alert(comp);
	$.ajax({ 
			url:"<?php echo base_url();?>Welcome/client_image_data",  
            data: {logo: logo},  
            type: "POST",  
            success:function(data){ 
				 
				//var myJSON = JSON.stringify(data);			
				//var arr = $(this).html(data.contact);  
				var mydata = JSON.parse(data);
				for(i=0; i< mydata.length; i++)
				{
					var id =  mydata[i].id;
					var image = mydata[i].image;
					var company_name = mydata[i].company_name;
					
				}
				 //$('#g2').html(id);
				 //$('#cl_img').html(image);
				 
			  	/* $('#cl_name').html(company_name);
				var img = new Image();
				  img.src = image;
				  document.getElementById("cl_img").appendChild(img); */
				//document.getElementById("cl_img").innerHTML=image;
				/* 
					var jsonp = data;
					var lang = '';
					var company_name = '';
				  alert(jsonp);
				  var obj = $.parseJSON(jsonp);
				  $.each(obj, function() {
					  lang += this['image'];
					  company_name += this['company_name'];
				  });
				  $('#g2').html(lang);
				   $('#cl_name').html(company_name);
				 */
				  //$('span').html(lang);
				//document.getElementById("phone").innerHTML = obj.contact;
				//document.getElementById("cl_img").src = obj.image;
				//document.getElementById("cl_name").innerHTML = obj.company_name; */
        }  
    }); 
});

/* $("img").click(function(){	
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
    });  
}); */
	
});
</script>
</html>
<?php include "master/footer.php"; ?>