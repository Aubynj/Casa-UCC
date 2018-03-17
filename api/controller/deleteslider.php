<?php
	include "../dbConfig.php";

	$imageDir = "../../uploads/images/slider/";
	$response = array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$numText = intval($_POST['numText']);
		$numImg = intval($_POST['numImg']);


		$query = "SELECT slider_image_name FROM `sliderimage` WHERE slider_image_id = $numImg";
		$result = $database->query($query);

		$row = $result->fetch_assoc();

		$images = $row['slider_image_name'];

		$realImages = unserialize($images);

		$imageSize = sizeof($realImages);

		//unlink
		for ($i=0; $i < $imageSize; $i++) { 
			unlink("../../uploads/images/slider/".$realImages[$i]);
		}

		$anotherQuery = "DELETE FROM `sliderimage` WHERE slider_image_id = ?";
		$respre = $database->prepare($anotherQuery);

		$respre->bind_param("i",$numImg);

		if($respre->execute()){
			//Let delete the extra 
			$sliderQuery = "DELETE FROM `sliderpost` WHERE post_id = ?";
			$prepareSlider = $database->prepare($sliderQuery);
			$prepareSlider->bind_param("i",$numText);

			if($prepareSlider->execute()){
				$response["success"] =  true;
				$response["message"] = "Successfully deleted";

				header("Content-Type: application/json");
				echo json_encode($response);
			}else{
				$response["success"] =  false;
				$response["message"] = "Problem occur. Contact System Admin";

				header("Content-Type: application/json");
				echo json_encode($response);
			}


		}else{

			$response["success"] =  false;
			$response["message"] = "Oops errors occur";

			header("Content-Type: application/json");
			echo json_encode($response);
		}

	}