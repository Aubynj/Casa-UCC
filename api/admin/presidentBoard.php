<?php
	include "../dbConfig.php";
    ini_set('display_errors', 1);


	$response = array();
	$imageDir = "../../uploads/images/executives/";
	$rand = substr(md5(microtime()),rand(0,25),15);
	//$date = date();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$presName = mysqli_real_escape_string($database, trim($_GET["name"]));
		$presPosition = mysqli_real_escape_string($database, trim($_GET['position']));
		$presLevel = mysqli_real_escape_string($database, trim($_GET['level']));

		
		if($_FILES['files']){



			$fileExt = explode('.',$_FILES['files']['name']);

			$fileName = "Executive"."_".$rand.".".end($fileExt);
			$targetImageDir = $imageDir.basename($fileName);
			$imageSource = $_FILES['files']['tmp_name'];

			move_uploaded_file($imageSource,$targetImageDir);

			$query = "INSERT INTO president(`president_name`, `president_level`, `president_position`, `president_photo`, `appointment_year`) VALUES(?,?,?,?,YEAR(NOW()))";

			$prepareQuery = $database->prepare($query);
			$prepareQuery -> bind_param('ssss',$presName,$presLevel,$presPosition,$fileName);

			if($prepareQuery->execute()){
				$response["success"] = true;
				$response["message"] = $presPosition." inserted successfully";

				header("Content-Type: application/json");
				echo json_encode($response);
			}else{
				$response["success"] = false;
				$response["message"] = $presPosition." could'nt be stored";
				
				header("Content-Type: application/json");
				echo json_encode($response);
			}

			
		}
	}