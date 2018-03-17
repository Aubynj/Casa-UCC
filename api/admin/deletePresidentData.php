<?php
	include "../dbConfig.php";
	ini_set('display_errors',1);

	$response = array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$id = mysqli_real_escape_string($database, trim(intval($_POST['id'])));
		

		$query = "SELECT * FROM president WHERE president_id = $id";
		$result = $database->query($query);

		$row = $result->fetch_assoc();

		$imageToBeDeleted = $row['president_photo'];
		$position = $row['president_position'];


		$deleteQuery = "DELETE FROM president WHERE president_id = ?";
		$delResult = $database->prepare($deleteQuery);
		$delResult->bind_param('i',$id);

		if($delResult->execute()){
			//Delete image from directory
			unlink("../../uploads/images/executives/".$imageToBeDeleted);

			$response["success"] = true;
	        $response["message"] = $position." deleted successfully";
	        header('Content-Type: application/json');
	        echo json_encode($response);
		}else{
			$response["success"] = false;
	        $response["message"] = "We have problem deleting ".$position;
	        header('Content-Type: application/json');
	        echo json_encode($response);
		}


	}