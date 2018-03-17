<?php
	include "../dbConfig.php";
	ini_set('display_errors', 1);
	$date = date('Y');
	$presData = array();
	$execData = array();

	$counter = 0.1;


	$query = "SELECT * FROM president WHERE `appointment_year`= '$date' limit 2";
	$result = $database->query($query);

	if($result->num_rows > 0){

		while($row = $result->fetch_assoc()){
			$presidentName = $row['president_name'];
			$presidentLevel = $row['president_level'];
			$presidentPosition = $row['president_position'];
			$presidentPhoto = $row['president_photo'];

			$presData["id"] = $row['president_id'];
			$presData["name"] = $presidentName;
			$presData["level"] = $presidentLevel;
			$presData["position"] = $presidentPosition;
			$presData["photo"] = $presidentPhoto;

			$presObj = json_encode($presData);


			echo "
				<section class='col-md-4 wow zoomIn' data-wow-duration='0.2s' data-wow-delay='".$counter."s' style='padding-top:10px'>
	              <section class='card removeBorder'>
	                <img class='card-img-top execImage' src='../uploads/images/executives/$presidentPhoto' alt='card-image-to'>
	                <section class='card-body'>
	                  <h5 class='card-title'><strong>$presidentPosition</strong></h5>
	                  <p class='card-text'></p>
	                </section>
	                <section class='icon-shift'>
		                <span><i class='fa fa-pencil' onclick='editPres($presObj)'></i></span>&nbsp;&nbsp;&nbsp;
		                <span><i class='fa fa-trash' onclick='delePres($presObj)'></i></span>
	                </section>
	              </section>
	            </section><br>

			";

			$counter += 0.1; 
		}
	}

#Get executive information 

	$queryExec = "SELECT * FROM executives WHERE `appointment_year`= '$date'";
	$resultExec = $database->query($queryExec);

	if($resultExec->num_rows > 0){

		while($row = $resultExec->fetch_assoc()){
			$executiveName = $row['executive_name'];
			$executiveLevel = $row['executive_level'];
			$executivePosition = $row['executive_position'];
			$executivePhoto = $row['executive_photo'];

			$execData["id"] = $row['executive_id'];
			$execData["name"] = $executiveName;
			$execData["level"] = $executiveLevel;
			$execData["position"] = $executivePosition;
			$execData["photo"] = $executivePhoto;

			$execObj = json_encode($execData);


			echo "
				<br>
				<section class='col-md-4 wow zoomIn' data-wow-duration='0.2s' data-wow-delay='".$counter."s' style='padding-top:10px'>
	              <section class='card removeBorder'>
	                <img class='card-img-top execImage' src='../uploads/images/executives/$executivePhoto' alt='card-image-to'>
	                <section class='card-body'>
	                  <h5 class='card-title'><strong>$executivePosition</strong></h5>
	                  <p class='card-text'></p>
	                </section>
	                <section class='icon-shift'>
		                <span><i class='fa fa-pencil' onclick='editExec($execObj)'></i></span>&nbsp;&nbsp;&nbsp;
		                <span><i class='fa fa-trash' onclick='deleExec($execObj)'></i></span>
	                </section>
	              </section>
	              </section>
	            </section><br>

			";

			$counter += 0.1; 
		}
	}


