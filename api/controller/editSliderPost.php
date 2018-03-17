<?php
	include "../dbConfig.php";

	$response = array();

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$textId = intval($_POST['textId']);
		$title = mysqli_real_escape_string($database,trim($_POST['title']));
		$message = mysqli_real_escape_string($database,trim($_POST['message']));

		$updateQuery = "UPDATE sliderpost SET post_title = ?,post_message = ? WHERE post_id = ?";
		$prepareQuery = $database->prepare($updateQuery);
		$prepareQuery->bind_param("ssi",$title,$message,$textId);

		if($prepareQuery->execute()){
			$response["success"] = true;
			$response["message"] = "Updated successfully";
			header('Content-Type: application/json');
			echo json_encode($response);
		}else{
			$response["success"] = false;
            $response["message"] = "Error occur updating slider Post";
            header('Content-Type: application/json');
            echo json_encode($response);
		}
	}