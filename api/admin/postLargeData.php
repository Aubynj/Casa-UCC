<?php
	include "../dbConfig.php";

	ini_set('display_errors', 1);
	$response = array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$id = intval($_POST['id']);
		$pageInfo = mysqli_real_escape_string($database, trim($_POST['pageTxt']));

		$query = "UPDATE page_information SET `page_data` = '$pageInfo' WHERE `page_id` = $id";
		$prepareQuery = $database->query($query);

		if($prepareQuery == TRUE){
			//Data inserted success

			$response["success"] = true;
            $response["message"] = "Thank! Your post is publish!";
            header('Content-Type: application/json');
            echo json_encode($response);
		}else{
			$response["success"] = false;
            $response["message"] = "Oops we can't publish your post";
            header('Content-Type: application/json');
            echo json_encode($response);
		}
	}