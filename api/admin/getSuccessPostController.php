<?php
    include "../dbConfig.php";

    $query = "SELECT * FROM successpost ORDER BY post_id DESC LIMIT 1";
    $result = $database->query($query);

    $row = $result->fetch_assoc();

    $success_title   = $row['post_title'];
    $success_message =  $row['post_message'];
    $success_images  = $row['post_image'];

    echo "
    <section class='card removeBorder'>
      <img class='card-img-top' src='./uploads/images/successpost/$success_images' alt='card-image-top'>
      <section class='card-body'>
        <h5 class='card-title'><strong>$success_title</strong></h5>
        <p class='card-text'>$success_message</p>
      </section>
    </section>
    ";
