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
		$id = intval($_GET["id"]);

		$queryImage = "SELECT executive_photo From executives WHERE executive_id = $id";
      	$result = $database->query($queryImage);

	    //If result is going to be fetch truly, then
	    $row = $result->fetch_assoc();
	    $oldImage = $row['executive_photo'];  


		
		if($_FILES['imageName']){

			//Delete old image from database
      		unlink("../../uploads/images/executives/".$oldImage);

			$fileExt = explode('.',$_FILES['imageName']['name']);

			$fileName = "Executive"."_".$rand.".".end($fileExt);
			$targetImageDir = $imageDir.basename($fileName);
			$imageSource = $_FILES['imageName']['tmp_name'];

			move_uploaded_file($imageSource,$targetImageDir);

			$query = "UPDATE executives SET executive_name = ?, executive_level = ?,executive_position = ?,executive_photo = ? WHERE executive_id = ?";

			$prepareQuery = $database->prepare($query);
			$prepareQuery -> bind_param('ssssi',$execName,$execLevel,$execPosition,$fileName,$id);

			if($prepareQuery->execute()){
				$response["success"] = true;
				$response["message"] = $execPosition." updated successfully";

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