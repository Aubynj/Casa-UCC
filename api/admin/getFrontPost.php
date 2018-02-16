<?php
    include "../dbConfig.php";

    $query = "SELECT * FROM frontpost ORDER BY post_id DESC LIMIT 4";

    $result = $database->query($query);

    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {
        $postTitle = $row["post_title"];
        $postMessage = $row["post_message"];
        $postImage = $row["post_image"];
        $postDate = $row["post_date"];


        echo "
              <section class='col-md-3 text-center'>
                <section class='card'>
                  <img class='card-img-top' src='uploads/images/$postImage' alt='card-image-top'>
                  <section class='card-body'>
                    <h5 class='card-title'><strong>$postTitle</strong></h5>
                    <p class='card-text'>$postMessage</p>
                  </section>
                </section>
              </section>
        ";

      }
    }
