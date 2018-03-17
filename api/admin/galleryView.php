<?php
	include "../dbConfig.php";

	$id = intval($_POST['ID']);


	$galleryViewQuery = "SELECT * FROM gallery_images WHERE gallery_img_id = $id";

	$result = $database->query($galleryViewQuery);

	$row = $result->fetch_assoc();

	$images = $row['gallery_img_name'];

	$newImageName = unserialize($images);
	$imageSize = sizeof($newImageName);

	echo "
			<div id='carouselExampleControls' class='carousel slide wow zoomIn' data-ride='carousel' data-wow-duration='0.4s' data-wow-delay='0.4s'>
			  <div class='carousel-inner'>
			    <div class='carousel-item active'>
			      <img class='d-block w-100 gallerySize' src='./uploads/images/gallery/$newImageName[0]' alt='First slide'>
			    </div>";

			    for ($i=1; $i < $imageSize; $i++) { 
			   echo "	<div class='carousel-item'>
					      <img class='d-block w-100 gallerySize' src='./uploads/images/gallery/$newImageName[$i]' alt='Second slide'>
					    </div>";
			    }
			    
		echo "  
			  </div>
			  <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
			    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
			    <span class='sr-only'>Previous</span>
			  </a>
			  <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
			    <span class='carousel-control-next-icon' aria-hidden='true'></span>
			    <span class='sr-only'>Next</span>
			  </a>
			</div>";