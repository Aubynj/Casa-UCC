<?php
    include "../dbConfig.php";

    $query = "SELECT * FROM sliderpost INNER JOIN sliderimage ON slider_image_info = post_id ORDER BY post_id DESC LIMIT 1";
    $result = $database->query($query);

    $row = $result->fetch_assoc();

    $slider_title   = $row['post_title'];
    $slider_message =  $row['post_message'];
    $slider_images  = $row['slider_image_name'];

    $sliderNewNames = unserialize($slider_images);
    $sliderNo =  sizeof($sliderNewNames);

    echo "
    <section class='card flex-md-row mb-4 box-shadow h-md-250 section-big some-wrapper removeBorder wow zoomIn' data-wow-duration='0.2s' data-wow-delay='0.2s'>
      <section class='card-body d-flex flex-column align-items-start'>
        <h2>$slider_title</h2>
        <p class='card-text'>$slider_message</p>
      </section>
        <!--<img src='./assets/img/sec1.jpg' class='card-img-right' alt='card-image-top'>-->
        <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
            <ol class='carousel-indicators'>
              <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
              <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
              <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
            </ol>
            <div class='carousel-inner'>
              <div class='carousel-item active slider_image'>
                <img class='d-block w-100 slider_image' src='./uploads/images/slider/$sliderNewNames[0]' alt='First slide'>
              </div>";

              for ($i=1; $i < $sliderNo; $i++) {
                echo "
                    <div class='carousel-item slider_image'>
                      <img class='d-block w-100 slider_image' src='./uploads/images/slider/$sliderNewNames[$i]' alt='Second slide'>
                    </div>
                ";
              }

    echo  "
            </div>
            <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
              <span class='carousel-control-prev-icon' aria-hidden='true'></span>
              <span class='sr-only'>Previous</span>
            </a>
            <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
              <span class='carousel-control-next-icon' aria-hidden='true'></span>
              <span class='sr-only'>Next</span>
            </a>
          </div>
    </section>

    ";
