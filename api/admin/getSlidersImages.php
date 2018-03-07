<?php
    include "../dbConfig.php";
    ini_set('display_errors', 1);


    $counter = 0.1;


    $queryStatement = "SELECT * FROM sliderimage INNER JOIN sliderpost on slider_image_info = post_id  WHERE slider_image_info = post_id";

    $result = $database->query($queryStatement);


    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $sliderTitle = $row["post_title"];
          $sliderImage = $row["slider_image_name"];


          $serializeImage = unserialize($sliderImage);

          echo "
          <section class='col-md-4 down wow zoomIn' data-wow-duration='0.2s' data-wow-delay='$counter s'>
              <img src='../uploads/images/slider/$serializeImage[0]' class='btn btn-primary btn-slider' data-target='#add-post-model' data-toggle='modal'/>
            </section><br/>
            ";

        $counter += 0.1;
        }
    }else{
      echo "There are no slider images";
    }
