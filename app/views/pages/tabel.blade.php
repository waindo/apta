<?php
	require_once("ajax_table.class.php");

	$obj = new ajax_table();
	$records = $obj->getRecords();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>WEBSITE</title>
		  <script>
			 // Column names must be identical to the actual column names in the database, if you dont want to reveal the column names, you can map them with the different names at the server side.
			 var columns = new Array("fname","lname","tech","email","address");
			 var placeholder = new Array("Enter First Name","Enter Last Name","Enter Technology","Enter Email","Enter Address");
			 var inputType = new Array("text","text","text","text","textarea");
			 var table = "tableDemo";
			 
			 // Set button class names 
			 var savebutton = "ajaxSave";
			 var deletebutton = "ajaxDelete";
			 var editbutton = "ajaxEdit";
			 var updatebutton = "ajaxUpdate";
			 var cancelbutton = "cancel";
			 
			 var saveImage = "{{ URL::asset('assets/images/save.png')}}"
			 var editImage = "{{ URL::asset('assets/images/edit.png')}}"
			 var deleteImage = "{{ URL::asset('assets/images/remove.png')}}"
			 var cancelImage = "{{ URL::asset('assets/images/back.png')}}"
			 var updateImage = "{{ URL::asset('assets/images/save.png')}}"

			 // Set highlight animation delay (higher the value longer will be the animation)
			 var saveAnimationDelay = 3000; 
			 var deleteAnimationDelay = 1000;
			  
			 // 2 effects available available 1) slide 2) flash
			 var effect = "flash"; 
		  
		  </script>
		  <script src="{{ URL::asset('assets/js/jquery-1.11.0.min.js')}}"></script>
		  		
		  <script src="{{ URL::asset('assets/js/jquery-ui.js')}}"></script>	
		  <script src="{{ URL::asset('assets/js/script.js')}}"></script>	
		  <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
					
	</head>
	<body>
	@include('layout.navigation')

			
			<table border="0" class="tableDemo bordered">
					<tr class="ajaxTitle">
						<th width="2%">No</th>
						<th width="16%">First Name</th>
						<th width="16%">Last Name</th>
						<th width="12%">Technology</th>
						<th width="20%">Email</th>
						<th width="18%">Address</th>
						<th width="14%">Action</th>
					</tr>
						<?php
					if(count($records)){
					 $i = 1;	
					 foreach($records as $key=>$eachRecord){
					?>
					<tr id="<?php echo $eachRecord['id']; ?>">
						
						<td class="id"><?php echo $i++;?></td>
						<td class="fname"><?php echo $eachRecord['fname'];?></td>
						<td class="lname"><?php echo $eachRecord['lname'];?></td>
						<td class="tech"><?php echo $eachRecord['tech'];?></td>
						<td class="email"><?php echo $eachRecord['email'];?></td>
						<td class="address"><?php echo $eachRecord['address'];?></td>
						<td>
							<a href="javascript:;" id="<?php echo $eachRecord['id'];?>" class="ajaxEdit"><img src="" class="eimage"></a>
							<a href="javascript:;" id="<?php echo $eachRecord['id'];?>" class="ajaxDelete"><img src="" class="dimage"></a>
						</td>
					</tr>
					<?php }
					}
					?>
				</table>
			
			
	</body>
</html>


