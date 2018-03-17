<?php
	include "../dbConfig.php";
	ini_set('display_errors',1);

	$date = date('Y');
	$counter = 0.1;

	$queryFetch = "SELECT * FROM executives WHERE `appointment_year`= '$date'";

	$result = $database->query($queryFetch);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){

			$execImage = $row['executive_photo'];
			$execName  = $row['executive_name'];
			$execPosition = $row['executive_position'];


			echo "

		           <section class='executive wow zoomIn execImg' data-wow-duration='0.2s' data-wow-delay='".$counter."s'>
		              <div class='card'>
		                <img class='card-img-top' src='uploads/images/executives/$execImage' alt='Card image cap'>
		                <div class='card-body'>
		                  <h5 class='card-title'><strong>$execPosition</strong></h5>
		                  <p class='card-text'>$execName</p>
		                </div>
		              </div>
		           </section>
					";


		$counter += 0.1;

		}
	}