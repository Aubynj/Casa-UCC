<?php

	include "../dbConfig.php";
	ini_set('display_errors', 1);

	$response = array();

	$email = mysqli_real_escape_string($database, trim($_POST['email']));
	$subject = mysqli_real_escape_string($database, trim($_POST['subj']));
	$message = mysqli_real_escape_string($database, trim($_POST['message']));


	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$existQuery = "SELECT * FROM `contact` WHERE `email` = ?";
		$existprepare = $database->prepare($existQuery);
		$existprepare->bind_param('s',$email);
		$existprepare->execute();
		$result = $existprepare->get_result();
	

		if($result->num_rows > 0){

			//Email exist already
			$response["exist"] = true;
			$response["message"] = "You exists in our contact lists";
			header("Content-Type: application/json");
			echo json_encode($response); 

			
		}else{
			$query = "INSERT INTO contact(`email`,`subject`,`message`) VALUES (?,?,?)";
			$prepare = $database->prepare($query);
			$prepare->bind_param('sss',$email,$subject,$message);

			if($prepare->execute()){
				//Let insert into email lists
				$response["success"] = true;
				$response["message"] = "Thanks you are added to our contact list";
				header("Content-Type: application/json");
				echo json_encode($response);
			}else{
				$response["success"] = false;
				$response["message"] = "Oops there is a problem. Check connection";
				header("Content-Type: application/json");
				echo json_encode($response);
			}
		}



	}