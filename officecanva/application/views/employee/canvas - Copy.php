<?php include "master/header.php"; ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Display image file in Canvas</title>
<style>
/*html, body {text-align:center;}*/
#main
{
	position: relative;
	margin-top: 150px;
	margin-left: 200px;
}
#cnv1{
 display: block;
 //margin: 0 auto;
 background: #fdfdfd;
 border: 1px solid blue;
}

#pic1 {
 font-weight: 700;
 font-size: 18px;
}
#myform
{
	//margin-left: 130px;
	//margin-bottom: 150px;
}
#hello
{
	width: 30px;
	height: 30px;
	background: #fdfdfd;
}
.movable_div{	
	cursor: move;
}
/*.facebook{
	position: relative;
    top: 50px;    
    margin-bottom: 100px;
}*/

</style>

</head> 
<body>
<div class="page-content">
	<div class="container-fluid">
		
		<div class="row col-md-4">			
			 
			<form name="myform" id="myform" action="<?php //echo base_url()?>" method="post">
				<!--<div class="col-md-8">-->
					<div class="form-group col-md-12">
						<div class="form-control-wrapper">
						<label class="form-label">Style 1:</label>
						<select name="client" id="client" class="form-control" style="width:100%">
									<option value="0">---Select your client---</option>
											<?php
												foreach ($clients as $value1) 
													{
														echo "<option value='".$value1->id."'>".$value1->company_name."</option>";
													}
											?>							
						</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="form-control-wrapper">
						<label class="form-label">Style 2:</label>
						<select name="client1" id="client1" class="form-control" style="width:100%">
									<option value="0">---Select your client---</option>
											<?php
												foreach ($clients as $value1) 
													{
														echo "<option value='".$value1->id."'>".$value1->company_name."</option>";
													}
											?>							
						</select>
						</div>
					</div>
				<!--</div>-->
				
					<div class="form-group col-md-6">
						<div id="combodiv" class="form-control-wrapper">	
							<!--Font Size: <input id="slider" type ="range" min ="10" max="50" value ="0" onchange="showVal(this.value)"/><br />
							<input type="hidden" id="f_size" value="">-->	
							<!--<input type="button" value="Capture" id="capture" class="btn"/>-->
							Font Size: <select class="form-control" id="combo" style="width:80%">
								<?php for($i=5; $i<=100; $i++)
									echo "<option id='".$i."' value='".$i."'>".$i."</option>"; ?>
							</select>							
						</div>	
					</div>
					<div class="form-group col-md-6">
						<div class="form-control-wrapper">
							Color: <br><button id="hello" class="jscolor {valueElement:'chosen-value', onFineChange:'setTextColor(this)'}"></button>
							<input type="hidden" id="chosen-value" value="000000">	
						</div>
					</div>
					
				
					<div class="form-group col-md-12">
						<div class="form-control-wrapper">						
							<textarea rows="4" cols="50" style="width:100%;" class="form-control" type="text" id ="textbox" name="textbox" placeholder="Enter Desciption"></textarea><br>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="form-control-wrapper">
							<input type="button" value="Add Desciption" id="add" class="btn"/><br>
							<br>
							<!--<input type="button" value="Download Image" id="dw" class="btn"/>-->
						</div>
					</div>
					<!--<div class="form-group col-md-2">
						<div class="form-control-wrapper">
							<button id="hello" class="jscolor {valueElement:'chosen-value', onFineChange:'setTextColor(this)'}"></button>
							<input type="hidden" id="chosen-value" value="000000">	
						</div>
					</div>-->					
				
				
			</form>
			<div id="comboval" style="visibility: hidden;"></div>
		</div>
	
		<div class="row col-md-8">	
			<div style="position:relative; left:25px;">
				<div id="canvasesdiv">
					<canvas id="cnv" style="z-index: 0; visibility: hidden; " height="650px" width="600"></canvas>
					<canvas id="cnv1" style="z-index: 1;position:absolute;left: 25px;top:0px;" height="650px" width="600">	
					</canvas>
					<canvas id="cnv2" style="z-index: 2;position:absolute;left: 400px;top:0px;" height="40px" width="250">
					</canvas>
					<canvas id="cnv3" style="z-index: 2;position:absolute;left: 20px;top:550px;" height="100px" width="150">
					</canvas>
					<canvas id="cnv4" style="z-index: 2;position:absolute;left: 350px;top:550px;" height="100px" width="300">
					</canvas>
					<canvas id="cnv5" class="movable_div" style="z-index: 10;position: absolute;left: 100px;top: 150px;" height="300px" width="500px">
					</canvas>
					<canvas id="cnv6" style="z-index: 10; position:absolute; left:25px; top:550px;" height="100px" width="600">
					</canvas>
				</div>
				<!--<div id="canvasesdiv">
					<canvas id="cnv"  style="z-index: 0; visibility: hidden; " height="650px" width="600"></canvas>
					<canvas id="cnv1" style="z-index: 1; position:absolute; left:150px; top:0px;" height="650px" width="600">	
					</canvas>
					<canvas id="cnv2" style="z-index: 2; position:absolute; left:550px; top:0px;" height="40px" width="200">
					</canvas>
					<canvas id="cnv3" style="z-index: 2; position:absolute; left:150px; top:550px;" height="100px" width="150">
					</canvas>
					<canvas id="cnv4" style="z-index: 2; position:absolute; left:500px; top:550px;" height="100px" width="300">
					</canvas>
					<canvas id="cnv5" class="movable_div" style="z-index: 10; position:absolute; left:150px; top:150px;" height="300px" width="500px" >
					</canvas>
					<canvas id="cnv6" style="z-index: 10; position:absolute; left:150px; top:550px;" height="100px" width="600">
					</canvas>
				</div>-->
			</div>
			<br><br>
			<div class="form-group col-md-12 text-center">
				<div class="form-control-wrapper">
					<input type="button" value="Download Image" id="dw" class="btn"/>
				</div>
			</div>
		</div>
			
		<div id="cl_data" style="visibility: hidden;">
			<p id="name"></p>
			<p id="email"></p>
			<p id="phone"></p>
			<p id="photo"></p>
			<p id="logo"></p>
			<p id="website"></p>
			<p id="content"></p>
			</div>
	 
		<!--<div id="data" class="facebook">
			<!--<input type="button" value="convert" id="fb" class="btn"/>
			
		</div>-->
	
	</div>
</div>
</body>
</html>
<?php include 'master/footer.php'; ?>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/lib/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/lib/bootstrap-notify/bootstrap-notify-init.js"></script>
	
	
<script src="<?php echo base_url()?>assets/js/lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/FileSaver/FileSaver.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lib/match-height/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jscolor.js"></script>
	<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
	
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery-latest.js"></script> 



<script>


function setTextColor(jscolor) {
    // 'jscolor' instance can be used as a string
    //document.getElementById("cnv2").style.color = '#' + jscolor.toString();
	//var col = '#' + jscolor.toString();
	
}

	var canva = document.getElementById('cnv1');
      var context = canva.getContext('2d');
      var imageObj = new Image();

      imageObj.onload = function() {
        context.drawImage(imageObj, 0, 0,600,650);
      };    
	   imageObj.src = '<?php echo $id_image ?>';



$(document).ready(function() {
	$("#combo").change(function(){ 
		var f_size = $(this).val()+"px";
		//var f_size = $(this).val();			
		//alert(f_size);
		document.getElementById('comboval').innerHTML=f_size;
	}); 
		
    $("#client").change(function(){ 
			
			var col = $("#chosen-value").val();	
			var fsize = $("#comboval").html();				
			var id = $(this).val()
			//alert(fsize);
			$.ajax({  
				url:"<?php echo base_url();?>Welcome/get_client_data",  
				data: {id:id}, 
				dataType: 'json',
				type: "POST",  
				success:function(data){ 
				//alert(id);
				//alert(data);
				
				var myJSON = JSON.stringify(data[0]);
				//alert(myJSON);				
				//var arr = $(this).html(data.contact);  
				var obj = JSON.parse(myJSON);
				//alert(obj);	
				var phone= obj.contact;
				var logo= obj.logo;
				var website= obj.website_url;
				
				/* alert(phone);
				alert(logo);
				alert(website); */
				document.getElementById("phone").innerHTML = obj.contact;
				document.getElementById("logo").innerHTML = obj.logo;
				document.getElementById("photo").innerHTML = obj.photo;
				document.getElementById("website").innerHTML = obj.website_url;
				document.getElementById("name").innerHTML = obj.client_name;
				document.getElementById("email").innerHTML = obj.email;
				
				var c_name= document.getElementById("name").innerHTML;
				var email= document.getElementById("email").innerHTML;
				var contact= document.getElementById("phone").innerHTML;
				var web= document.getElementById("website").innerHTML;
				var c_logo= document.getElementById("logo").innerHTML;
				var photo= document.getElementById("photo").innerHTML;
				
				/*--------- clear canvas -----------*/
				var c = document.getElementById("cnv2");
				var ctx = c.getContext("2d");
				ctx.clearRect(0, 0, c.width, c.height);				
				var canvas1 = document.getElementById('cnv3');
				context1 = canvas1.getContext('2d');
				context1.clearRect(0, 0, canvas1.width, canvas1.height);				
				var c1 = document.getElementById("cnv4");
				var ctx1 = c1.getContext("2d");
				ctx1.clearRect(0, 0, c1.width, c1.height);
				
				// fill canvas
				var c4 = document.getElementById("cnv6");
				var ctx4 = c4.getContext("2d");
				ctx4.clearRect(0, 0, c4.width, c4.height);
				var con = "Contact Number: "+contact;
				var emailid = "Email Id: "+email;
				ctx4.fillStyle = "#"+col;
				//ctx4.font = ""+fsize+" bold Georgia";
				ctx4.font = "13px Georgia";
				ctx4.fillText(c_name, 350, 25);
				ctx4.fillText(emailid, 350, 40);
				ctx4.fillText(con, 350, 60);
				ctx4.fillText(web,350, 75);					
				//client logo
				base_image1 = new Image();
				base_image1.src = c_logo;
				base_image1.onload = function(){
				ctx4.drawImage(base_image1, 10,30,150,50);}	
				// client image  working code
				base_image = new Image();
				base_image.src = photo;
				base_image.onload = function(){
				ctx4.drawImage(base_image, 250,15,80,70);}	
				
				
				/* base_image = new Image();
				base_image.src = photo;
				base_image.onload = function(){
				//base_image.onload = start;
					ctx4.save();
					 ctx4.beginPath();
					//ctx4.arc(2*24, 2*24, 2*24, 0, Math.PI*2, true);
					ctx4.arc(100, 75, 40, 0, 2 * Math.PI, true);
					ctx4.closePath();
					ctx4.clip(); 
 
					ctx4.drawImage(base_image, 300,10,80,80);
					ctx4.restore();
				} */
				
				/* function start(){
				  var cw,ch;
				  cw=base_image.width;
				  ch=base_image.height;
				  ctx4.drawImage(base_image, 300,10,80,80);
				  ctx4.globalCompositeOperation='destination-in';
				  ctx4.beginPath();
				  ctx4.arc(100, 75,40,0,Math.PI*2);
				  ctx4.closePath();
				  ctx4.fill();
				}//start funtion close	 */
				
				
            }			
        });			
	});
	
	$("#client1").change(function(){ 
			
			var col = $("#chosen-value").val();	
			var fsize = $("#comboval").html();				
			var id = $(this).val()
			//alert(fsize);
			$.ajax({  
				url:"<?php echo base_url();?>Welcome/get_client_data",  
				data: {id:id}, 
				dataType: 'json',
				type: "POST",  
				success:function(data){ 
				//alert(id);
				//alert(data);
				
				var myJSON = JSON.stringify(data[0]);
				//alert(myJSON);				
				//var arr = $(this).html(data.contact);  
				var obj = JSON.parse(myJSON);
				//alert(obj);	
				var phone= obj.contact;
				var logo= obj.logo;
				var website= obj.website_url;
				
				/* alert(phone);
				alert(logo);
				alert(website); */
				document.getElementById("phone").innerHTML = obj.contact;
				document.getElementById("logo").innerHTML = obj.logo;
				document.getElementById("photo").innerHTML = obj.photo;
				document.getElementById("website").innerHTML = obj.website_url;
				document.getElementById("name").innerHTML = obj.client_name;
				document.getElementById("email").innerHTML = obj.email;
				
				var c_name= document.getElementById("name").innerHTML;
				var email= document.getElementById("email").innerHTML;
				var contact= document.getElementById("phone").innerHTML;
				var web= document.getElementById("website").innerHTML;
				var c_logo= document.getElementById("logo").innerHTML;
				var photo= document.getElementById("photo").innerHTML;
				
				/*--------- clear canvas -----------*/
				
				var can = document.getElementById("cnv6");
				var ctx6 = can.getContext("2d");
				ctx6.clearRect(0, 0, can.width, can.height);
				
				
				//contact text 
				 var contact= document.getElementById("phone").innerHTML;
				var c = document.getElementById("cnv2");
				var ctx = c.getContext("2d");
				var con = "Contact Number: "+contact;
				ctx.clearRect(0, 0, c.width, c.height);
				ctx.fillStyle = "#"+col;
				//ctx.font = "bold 15px Georgia";
				ctx.font = ""+fsize+" bold Georgia";
				//ctx.font = "bold Georgia";
				ctx.fillText(con, 10, 25);
											
				//website
				var web= document.getElementById("website").innerHTML;
				var c1 = document.getElementById("cnv4");
				var ctx1 = c1.getContext("2d");
				ctx1.clearRect(0, 0, c1.width, c1.height);
				ctx1.fillStyle = "#"+col;				
				//ctx1.font = "15px Georgia";
				ctx1.font = ""+fsize+" Georgia";
				//ctx1.font = "Georgia";
				ctx1.fillText(web,10, 70);
				
				// logo 
				var c_logo= document.getElementById("logo").innerHTML;
				var canvas1 = document.getElementById('cnv3');
				context1 = canvas1.getContext('2d');
				context1.clearRect(0, 0, canvas1.width, canvas1.height);
				base_image1 = new Image();
				base_image1.src = c_logo;
				base_image1.onload = function(){
				context1.drawImage(base_image1, 10,30,120,50); 
				
				} 							
            }			
        });			
	});
	
	
	$("#add").click(function(){
		var col = $("#chosen-value").val();
	//alert(col);
		var fsize = $("#comboval").html();		
		var con= document.getElementById("content").innerHTML;
		//var fsize= document.getElementById("f_size").innerHTML;
				//alert(con);
				var c2 = document.getElementById("cnv5");
				var ctx2 = c2.getContext("2d");
				ctx2.clearRect(0, 0, c2.width, c2.height);
				var maxWidth = 470;
				var lineHeight = 20;
				var x = (c2.width - maxWidth) / 2;
				var y = 40;
				ctx2.fillStyle = "#"+col;
				
				
				//ctx2.fillStyle =  document.getElementById("cnv5").style.color = "col";
				//ctx2.fillStyle = f_color;
				ctx2.font = ""+fsize+" Georgia";
				
				//ctx2.font = (fsize);
				//ctx2.font = 'Georgia';
				//ctx2.fillText(con,30, 70);
				wrapText(ctx2, con, x, y, maxWidth, lineHeight);	
	});
	
});


function wrapText(context, text, x, y, maxWidth, lineHeight) 
	  {
		var words = text.split(' ');
        var line = '';

        for(var n = 0; n < words.length; n++) {
          var testLine = line + words[n] + ' ';
          var metrics = context.measureText(testLine);
          var testWidth = metrics.width;
          if (testWidth > maxWidth && n > 0) {
            context.fillText(line, x, y);
            line = words[n] + ' ';
            y += lineHeight;
          }
          else {
            line = testLine;
          }
        }
        context.fillText(line, x, y);
      }
	  
</script>

<script type="text/javascript">	
	
	$(function(){	
	
			//to capture the entered text in the textbox 
			$('#textbox').change(function(){
				var text = $(this).val();					
				$("#content").html(text);
			});	
				
				
			//Make the middle contents element draggagle:
			dragElement(document.getElementById(("cnv5")));

			function dragElement(elmnt) {
				var tl;
				var pt;
			  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
			  if (document.getElementById(elmnt.id + "header")) {
				/* if present, the header is where you move the DIV from:*/
				document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
			  } else {
				/* otherwise, move the DIV from anywhere inside the DIV:*/
				elmnt.onmousedown = dragMouseDown;
			  }

			  function dragMouseDown(e) {
				e = e || window.event;
				// get the mouse cursor position at startup:
				pos3 = e.clientX;
				pos4 = e.clientY;
				document.onmouseup = closeDragElement;
				// call a function whenever the cursor moves:
				document.onmousemove = elementDrag;
			  }

			  function elementDrag(e) {
				e = e || window.event;
				// calculate the new cursor position:
				pos1 = pos3 - e.clientX;
				pos2 = pos4 - e.clientY;
				pos3 = e.clientX;
				pos4 = e.clientY;
				// set the element's new position:
				
				elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
				elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
				lt = (elmnt.offsetLeft - pos1);
				tp = (elmnt.offsetTop - pos2);
			  }

			  function closeDragElement() {
				/* stop moving when mouse button is released:*/
				document.onmouseup = null;
				document.onmousemove = null;
			  }
			}	
			
			//font size handler here. 
			/* $('#slider').change(function(){
				
				var fontSize = $(this).val();
				//alert(fontSize);
				//$('#content').css('font-size', fontSize+'px');
				$('#f_size').val(fontSize+'px');
			});   */
 						
			//here is the hero, after the capture button is clicked
			//he will take the screen shot of the div and save it as image.
			
			$('#dw').click(function(){
				
				var can3 = document.getElementById('cnv');
				var ctx3 = can3.getContext('2d');
				var cnv1= document.getElementById("cnv1");
				var cnv2= document.getElementById("cnv2");
				var cnv3= document.getElementById("cnv3");
				var cnv4= document.getElementById("cnv4");
				var cnv5= document.getElementById("cnv5");
				var cnv6= document.getElementById("cnv6");
				//alert(lt);
				//alert(tp);
				/*  ctx3.drawImage(cnv1, 0, 0);
					ctx3.drawImage(cnv2, 400, 10); 
					ctx3.drawImage(cnv3, 0, 550);
					ctx3.drawImage(cnv4, 350, 550);
					ctx3.drawImage(cnv5, lt-150, tp);
					ctx3.drawImage(cnv6, 0, 550);*/
				if(lt!=150 && tp!=150)
				{
					ctx3.drawImage(cnv1, 0, 0);
					ctx3.drawImage(cnv2, 400, 10); 
					ctx3.drawImage(cnv3, 0, 550);
					ctx3.drawImage(cnv4, 350, 550);
					ctx3.drawImage(cnv5, lt-150, tp);
					ctx3.drawImage(cnv6, 0, 550);
				}
				else
				{					
					ctx3.drawImage(cnv1, 0, 0);
					ctx3.drawImage(cnv2, 400, 10); 
					ctx3.drawImage(cnv3, 0, 550);
					ctx3.drawImage(cnv4, 350, 550);
					ctx3.drawImage(cnv5, 150, 200);
					ctx3.drawImage(cnv6, 0, 550);
				}
				//get the div content
				div_content = document.querySelector("#cnv");
				div_content.toBlob(function(blob) {
				
					saveAs(blob,'image.jpg');
					
				});				
				
				alert('Image saved successfully. Click OK to download it.');
				
			});			
		});
		
		
		
</script>
<script src="<?php echo base_url()?>assets/js/app.js"></script>



