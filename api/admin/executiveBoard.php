<?php
	include "../dbConfig.php";
    ini_set('display_errors', 1);


	$response = array();
	$imageDir = "../../uploads/images/executives/";
	$rand = substr(md5(microtime()),rand(0,25),15);
	//$date = date();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$execName = mysqli_real_escape_string($database, trim($_GET["name"]));
		$execPosition = mysqli_real_escape_string($database, trim($_GET['position']));
		$execLevel = mysqli_real_escape_string($database, trim($_GET['level']));

		
		if($_FILES['files']){



			$fileExt = explode('.',$_FILES['files']['name']);

			$fileName = "Executive"."_".$rand.".".end($fileExt);
			$targetImageDir = $imageDir.basename($fileName);
			$imageSource = $_FILES['files']['tmp_name'];

			move_uploaded_file($imageSource,$targetImageDir);

			$query = "INSERT INTO executives(`executive_name`, `executive_level`,`executive_position`,`executive_photo`, `appointment_year`) VALUES(?,?,?,?,YEAR(NOW()))";

			$prepareQuery = $database->prepare($query);
			$prepareQuery -> bind_param('ssss',$execName,$execLevel,$execPosition,$fileName);

			if($prepareQuery->execute()){
				$response["success"] = true;
				$response["message"] = $execPosition." inserted successfully";

				header("Content-Type: application/json");
				echo json_encode($response);
			}else{
				$response["success"] = false;
				$response["message"] = $execPosition." could'nt be stored";
				
				header("Content-Type: application/json");
				echo json_encode($response);
			}

			
		}
	}