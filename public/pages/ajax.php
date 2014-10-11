<?php

	require_once("ajax_table.class.php");
	$obj = new ajax_table();

	if(isset($_POST) && count($_POST)){
		
		// whats the action ??

		$action = $_POST['action'];
		unset($_POST['action']);

		if($action == "save"){		
			// remove 'action' key from array, we no longer need it
			
  			// function recursive_escape($data) {
  				//$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
  				//mysqli_select_db($conn,DB_DB);
			    //if (is_array($data))
			    //    array_map('recursive_escape', $data);
			   // else
			   //     $data = mysqli_real_escape_string( $conn,$data);
			//}

			
			// Never ever believe on end user, he could be a evil minded
			//$escapedPost = array_map('recursive_escape', $_POST);
			$escapedPost = array_map('htmlentities', $_POST);
				
			$res = $obj->save($escapedPost);
			
			if($res){
				$escapedPost["success"] = "1";
				$escapedPost["id"] = $res;
				echo json_encode($escapedPost);
			}
			else
				echo $obj->error("save");
		}else if($action == "del"){
			$id = $_POST['rid'];
			$res = $obj->delete_record($id);
			if($res)
				echo json_encode(array("success" => "1","id" => $id));	
			else
				echo $obj->error("delete");
		}
		else if($action == "update"){
			
			//$escapedPost = array_map('mysqli_real_escape_string', $_POST);
			$escapedPost = array_map('htmlentities', $_POST);

			$id = $obj->update_record($escapedPost);
			if($id)
				echo json_encode(array_merge(array("success" => "1","id" => $id),$escapedPost));	
			else
				echo $obj->error("update");
		}
		else if($action == "updatetd"){
			
			//$escapedPost = array_map('mysqli_real_escape_string', $_POST);
			$escapedPost = array_map('htmlentities', $_POST);

			$id = $obj->update_column($escapedPost);
			if($id)
				echo json_encode(array_merge(array("success" => "1","id" => $id),$escapedPost));	
			else
				echo $obj->error("updatetd");
		}
	}
?>