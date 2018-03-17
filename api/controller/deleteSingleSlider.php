<?php
	include "../dbConfig.php";

	$response = array();

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$id = intval($_POST['id']);
		$imageId = intval($_POST['Id']);

		$query = "SELECT slider_image_name FROM sliderimage WHERE slider_image_id = $imageId";
		$result = $database->query($query);

		$row = $result->fetch_assoc();

		$imageArray = $row['slider_image_name'];


		$newImages = unserialize($imageArray);
		$imageRemove = $newImages[$id];

		//Remove image from folder
		unlink("../../uploads/images/slider/".$imageRemove);


		//Remove the element from the array
		unset($newImages[$id]);

		//Reorganize index of array
		$newImageArray = array_values($newImages);
		$imageInserted = serialize($newImageArray);

		
		//Let make insertion
		$updateQuery = "UPDATE sliderimage SET slider_image_name = ? WHERE slider_image_id = ?";
		$prepareQuery = $database->prepare($updateQuery);
		$prepareQuery->bind_param("si",$imageInserted,$imageId);

		if($prepareQuery->execute()){
			$response["success"] = true;
			$response["message"] = "Deleted successfully";
			header('Content-Type: application/json');
			echo json_encode($response);
		}else{
			$response["success"] = false;
            $response["message"] = "Error occur deleting";
            header('Content-Type: application/json');
            echo json_encode($response);
		}
	}