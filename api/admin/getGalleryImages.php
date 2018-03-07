<?php
    include "../dbConfig.php";
    $imageData = array();

    $queryGallery = "SELECT * FROM gallery_info INNER JOIN gallery_images on gallery_info_id = gallery_id";
    $result= $database->query($queryGallery);
    $counter = 0.1;

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $galleryHeading = $row['gallery_subject'];
        $gallery = $row['gallery_img_name'];


        $galleryImg = unserialize($gallery);
        //Uncode database to be handle by json
        $imageData['title'] = $row['gallery_subject'];
        $imageData['image_name'] = unserialize($gallery);

        $imageObj = json_encode($imageData);

        echo "
            <section class='col-md-3 text-center wow zoomIn' data-wow-duration='0.2s' data-wow-delay='.$counter s'>
              <section class='card removeBorder'>
                <img class='card-img-top' src='./uploads/images/gallery/$galleryImg[0]' alt='card-image-to' onclick='popUpPhto($imageObj)'>
                <section class='card-body'>
                  <h5 class='card-title'><strong>$galleryHeading</strong></h5>
                  <p class='card-text'></p>
                </section>
              </section>
            </section>
        ";


        $counter += 0.1;
      }
    }else{
      echo "
      <h3 style='text-align:center'>Sorry no photos at this time</h3>
      ";
    }
