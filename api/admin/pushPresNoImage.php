<?php

	include "../dbConfig.php";
    ini_set('display_errors', 1);


	$response = array();
	
	

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$id = mysqli_real_escape_string($database,trim(intval($_POST['id'])));
		$presName = mysqli_real_escape_string($database, trim($_POST["name"]));
		$presPosition = mysqli_real_escape_string($database, trim($_POST['position']));
		$presLevel = mysqli_real_escape_string($database, trim($_POST['level']));


		
		$query = "UPDATE president SET president_name = ?, president_level = ?,president_position = ? WHERE president_id = ?";


		$prepareQuery = $database->prepare($query);
		$prepareQuery->bind_param('sssi',$presName,$presLevel,$presPosition,$id);

		if($prepareQuery->execute()){
			$response["success"] =  true;
			$response["message"] = $presPosition." updated successfully";
			header("Content-Type: application/json");
			echo json_encode($response);

		}else{
			$response["success"] =  false;
			$response["message"] = $presPosition." couldn't be stored. Contact System Admin";
			header("Content-Type: application/json");
			echo json_encode($response);
		}
		
	}