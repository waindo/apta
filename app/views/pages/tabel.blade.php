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
			 var columns = new Array("tab1kol01","tab1kol02","tab1kol03","tab1kol04","tab1kol05","tab1kol06","tab1kol07","tab1kol08","tab1kol09","tab1kol10");
			 var placeholder = new Array("Masukkan Data","Masukkan Data","Masukkan Data","Masukkan Data","Masukkan Data","Masukkan Data","Masukkan Data","Masukkan Data","Masukkan Data","Masukkan Data");
			 var inputType = new Array("text","text","text","text","text","text","text","text","text","text");
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
	<br><li><a href="{{ URL::route('home')}}">Home</a></li>
	<li><a href="{{URL::route('account-logout')}}">Logout</a></li></br>	
	<br><li><td><a href="{{URL::route('tabel')}}">TABEL</a></td>
			</li></br>
		
			<table border="0" class="tableDemo bordered">
					<tr class="ajaxTitle">
						<th width="2%">No</th>
						<th width="9%">Kolom 1</th>
						<th width="9%">Kolom 2</th>
						<th width="9%">Kolom 3</th>
						<th width="9%">Kolom 4</th>
						<th width="9%">Kolom 5</th>
						<th width="9%">Kolom 6</th>
						<th width="9%">Kolom 7</th>
						<th width="9%">Kolom 8</th>
						<th width="9%">Kolom 9</th>
						<th width="9%">Kolom 10</th>
						<th width="8%">Action</th>
					</tr>
						<?php
					if(count($records)){
					 $i = 1;	
					 foreach($records as $key=>$eachRecord){
					?>
					<tr id="<?php echo $eachRecord['tab1ident']; ?>">
						
						<td class="tab1ident"><?php echo $i++;?></td>
						<td class="tab1kol01"><?php echo $eachRecord['tab1kol01'];?></td>
						<td class="tab1kol02"><?php echo $eachRecord['tab1kol02'];?></td>
						<td class="tab1kol03"><?php echo $eachRecord['tab1kol03'];?></td>
						<td class="tab1kol04"><?php echo $eachRecord['tab1kol04'];?></td>
						<td class="tab1kol05"><?php echo $eachRecord['tab1kol05'];?></td>
						<td class="tab1kol06"><?php echo $eachRecord['tab1kol06'];?></td>
						<td class="tab1kol07"><?php echo $eachRecord['tab1kol07'];?></td>
						<td class="tab1kol08"><?php echo $eachRecord['tab1kol08'];?></td>
						<td class="tab1kol09"><?php echo $eachRecord['tab1kol09'];?></td>
						<td class="tab1kol10"><?php echo $eachRecord['tab1kol10'];?></td>
						<td>
							<a href="javascript:;" id="<?php echo $eachRecord['tab1ident'];?>" class="ajaxEdit"><img src="" class="eimage"></a>
							<a href="javascript:;" id="<?php echo $eachRecord['tab1ident'];?>" class="ajaxDelete"><img src="" class="dimage"></a>
						</td>
					</tr>
					<?php }
					}
					?>
				</table>
			
			
	</body>
</html>


