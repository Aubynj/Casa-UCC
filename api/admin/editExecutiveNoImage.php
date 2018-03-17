<?php

	include "../dbConfig.php";
    ini_set('display_errors', 1);


	$response = array();
	
	

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$id = mysqli_real_escape_string($database,trim(intval($_POST['id'])));
		$execName = mysqli_real_escape_string($database, trim($_POST["name"]));
		$execPosition = mysqli_real_escape_string($database, trim($_POST['position']));
		$execLevel = mysqli_real_escape_string($database, trim($_POST['level']));


		
		$query = "UPDATE executives SET executive_name = ?, executive_level = ?,executive_position = ? WHERE executive_id = ?";


		$prepareQuery = $database->prepare($query);
		$prepareQuery->bind_param('sssi',$execName,$execLevel,$execPosition,$id);

		if($prepareQuery->execute()){
			$response["success"] =  true;
			$response["message"] = $execPosition." updated successfully";
			header("Content-Type: application/json");
			echo json_encode($response);

		}else{
			$response["success"] =  false;
			$response["message"] = $execPosition." couldn't be stored. Contact System Admin";
			header("Content-Type: application/json");
			echo json_encode($response);
		}
		
	}