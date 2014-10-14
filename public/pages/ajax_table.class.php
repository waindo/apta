<?php

	
// Database
define ( 'DB_HOST', 'localhost' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASSWORD', '' );
define ( 'DB_DB', 'auth' );




class ajax_table {
     
  public function __construct(){
	$this->dbconnect();
  }
   
  private function dbconnect() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD)
      or die ("<div style='color:red;'><h3>Could not connect to mysqli server</h3></div>");
         
    mysqli_select_db($conn,DB_DB)
      or die ("<div style='color:red;'><h3>Could not select the indicated database</h3></div>");
     
    return $conn;
  }
   
  function getRecords(){
  	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
  	mysqli_select_db($conn,DB_DB);
  	$kueri = "select * from tab1";
	$this->res = mysqli_query( $conn, $kueri );
	if(mysqli_num_rows($this->res)){
		while($this->row = mysqli_fetch_assoc($this->res)){
			$record = array_map('stripslashes', $this->row);
			$this->records[] = $record; 
		}
		return $this->records;
	}
	//else echo "No records found";
  }	

  function save($data){
  	

	if(count($data)){
		
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	  	mysqli_select_db($conn,DB_DB);
	  	$values = implode("','", array_values($data));
	  	$kueri2 = "insert into tab1 (".implode(",",array_keys($data)).") values ('".$values."')";
		$kueri3 = "insert into tab1_log (tab1param , tab1usern , ".implode(",",array_keys($data)).") values ('Insert', 'agung', '".$values."')";
		mysqli_query($conn, $kueri2 );
		mysqli_query($conn, $kueri3 );
		if(mysqli_insert_id($conn)) return mysqli_insert_id($conn);
		return 0;
	}
	else return 0;	
  }	

  function delete_record($tab1ident){
	 if($tab1ident){
	 	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	  	mysqli_select_db($conn,DB_DB);
		mysqli_query($conn, "delete from tab1 where tab1ident = $tab1ident limit 1");
		mysqli_query($conn, "insert into tab1_log (tab1param,tab1usern) values ('Del' , 'agung')");
		return mysqli_affected_rows($conn);
	 }
  }	

  function update_record($data){
	if(count($data)){
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	  	mysqli_select_db($conn,DB_DB);
		$tab1ident = $data['rid'];
		unset($data['rid']);
		$values = implode("','", array_values($data));
		$str = "";
		foreach($data as $key=>$val){
			$str .= $key."='".$val."',";
		}
		$str = substr($str,0,-1);
		$sql = "update tab1 set $str where tab1ident = $tab1ident limit 1";
		$sql2 = "Insert into tab1_log (tab1param, tab1usern) values ('Edit', 'agung') ";
		$res = mysqli_query($conn, $sql);
		$res2 = mysqli_query($conn, $sql2);
		
		if(mysqli_affected_rows($conn)) return $tab1ident;
		return 0;
	}
	else return 0;	
  }	

  /* function update_column($data){
	if(count($data)){
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	  	mysqli_select_db($conn,DB_DB);
		$id = $data['rid'];
		unset($data['rid']);
		$sql = "update info set ".key($data)."='".$data[key($data)]."' where id = $id limit 1";
		$res = mysqli_query($conn, $sql);
		if(mysqli_affected_rows($conn)) return $id;
		return 0;
		
	}	
  } */

  function error($act){
	 return json_encode(array("success" => "0","action" => $act));
  }

}
?>