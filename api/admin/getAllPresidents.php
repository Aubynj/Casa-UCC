<?php
	include "../dbConfig.php";
	ini_set('display_errors',1);

	$date = date('Y');
	$counter = 0.1;
	$queryFetch = "SELECT * FROM president WHERE `appointment_year`= '$date' limit 2";

	$result = $database->query($queryFetch);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){

			$presImage = $row['president_photo'];
			$presName  = $row['president_name'];
			$presPosition = $row['president_position'];


			echo "

		           <section class='executive wow zoomIn presImg' data-wow-duration='0.2s' data-wow-delay='".$counter."s'>
		              <div class='card'>
		                <img class='card-img-top' src='uploads/images/executives/$presImage' alt='Card image cap'>
		                <div class='card-body'>
		                  <h5 class='card-title'><strong>$presPosition</strong></h5>
		                  <p class='card-text'>$presName</p>
		                </div>
		              </div>
		           </section>
					";

		$counter += 0.1;

		}
	}