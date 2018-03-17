<?php
    include "../dbConfig.php";
    ini_set('display_errors', 1);

    $imageArray = array();
    $counter = 0.1;


    $queryStatement = "SELECT * FROM sliderimage INNER JOIN sliderpost on slider_image_info = post_id  WHERE slider_image_info = post_id";

    $result = $database->query($queryStatement);


    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $sliderTitle = $row["post_title"];
          $sliderImage = $row["slider_image_name"];


          $imageArray["title"] = $sliderTitle;
          $imageArray["id_text"] = $row["post_id"];
          $imageArray["post_body"] = $row["post_message"];
          $imageArray["id_image"] = $row["slider_image_id"];


          $serializeImage = unserialize($sliderImage);
          $imageArray["images"] = $serializeImage;

          $imageObj = json_encode($imageArray);

          echo "
          <section class='col-md-4 down wow zoomIn' data-wow-duration='0.2s' data-wow-delay='".$counter."s'>
              <img src='../uploads/images/slider/$serializeImage[0]' class='btn btn-primary btn-slider' data-target='#add-post-model' data-toggle='modal' /><br>
              <span><i class='fa fa-pencil' id='pointme' onclick='viewSlider($imageObj)'></i></span> &nbsp;&nbsp;
              <span><i class='fa fa-trash-o' id='pointme' onclick='deleteSlider($imageObj)'></i></span>
            </section><br/>
            ";

        $counter += 0.1;
        }
    }else{
      echo "There are no slider images";
    }
