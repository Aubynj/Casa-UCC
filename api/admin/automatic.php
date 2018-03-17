<?php
	include "../dbConfig.php";

	ini_set('display_errors', 1);
	$response = array();


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$largeData = mysqli_real_escape_string($database, trim($_POST['msg']));
		$id = intval($_POST['id']);

		$query = "UPDATE page_information SET `page_data` = '$largeData' WHERE `page_id` = $id";
		$prepareQuery = $database->query($query);

		if($prepareQuery == TRUE){
			//Data inserted success

			$response["success"] = true;
            $response["message"] = "Saved";
            header('Content-Type: application/json');
            echo json_encode($response);
		}else{
			$response["success"] = false;
            $response["message"] = "Oops...Problem connection.";
            header('Content-Type: application/json');
            echo json_encode($response);
		}
	}