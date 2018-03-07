<?php
    include "../dbConfig.php";

    $query = "SELECT * FROM frontpost ORDER BY post_id DESC LIMIT 4";
    $result = $database->query($query);
    $counter = 0.4;

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $front_title   = $row['post_title'];
        $front_message =  $row['post_message'];
        $front_images  = $row['post_image'];



        echo "
            <section class='col-md-3 text-center wow zoomIn' data-wow-duration='0.2s' data-wow-delay='$counter s'>
              <section class='card removeBorder'>
                <img class='card-img-top' src='./uploads/images/frontpost/$front_images' alt='card-image-to'>
                <section class='card-body'>
                  <h5 class='card-title'><strong>$front_title</strong></h5>
                  <p class='card-text'>$front_message</p>
                </section>
              </section>
            </section>
        ";

        $counter += 0.1;
      }
    }
