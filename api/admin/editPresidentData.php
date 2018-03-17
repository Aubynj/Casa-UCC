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
		$id = intval($_GET["id"]);

		$queryImage = "SELECT president_photo From president WHERE president_id = '$id'";
      	$result = $database->query($queryImage);

      //If result is going to be fetch truly, then
	      if($result->num_rows > 0){
	        while($row = $result->fetch_assoc()){
	          $oldImage = $row["president_photo"];
	        }
	      }


		
		if($_FILES['imageName']){

			//Delete old image from database
      		unlink("../../uploads/images/executives/".$oldImage);

			$fileExt = explode('.',$_FILES['imageName']['name']);

			$fileName = "Executive"."_".$rand.".".end($fileExt);
			$targetImageDir = $imageDir.basename($fileName);
			$imageSource = $_FILES['imageName']['tmp_name'];

			move_uploaded_file($imageSource,$targetImageDir);

			$query = "UPDATE president SET president_name = ?, president_level = ?,president_position = ?,president_photo = ? WHERE president_id = ?";

			$prepareQuery = $database->prepare($query);
			$prepareQuery -> bind_param('ssssi',$presName,$presLevel,$presPosition,$fileName,$id);

			if($prepareQuery->execute()){
				$response["success"] = true;
				$response["message"] = $presPosition." updated successfully";

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