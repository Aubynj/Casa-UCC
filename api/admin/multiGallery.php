<?php
    include "../dbConfig.php";
    ini_set('display_errors', 1);

    $imageDir = "../../uploads/images/gallery/";
    $response = array();
    $output_array = array();
    $galleryImages = array();
    $subject = mysqli_real_escape_string($database,trim($_POST["subject"]));
    $tracking_post_id = md5(microtime()).rand(0,50);

    if($_SERVER['REQUEST_METHOD'] == "POST"){


      $firstquery = "INSERT INTO gallery_info(gallery_subject,gallery_date,gallery_tracking_id) VALUES(?,NOW(),?)";
      $statement = $database->prepare($firstquery);
      $statement->bind_param('ss',$subject,$tracking_post_id);
      $statement->execute();

      $anotherQuery = "SELECT * FROM gallery_info WHERE gallery_tracking_id = '$tracking_post_id'";
      $result = $database->query($anotherQuery);

      $row = $result->fetch_assoc();
      $id = intval($row["gallery_id"]);


      if(is_array($_FILES)){


        foreach ($_FILES['files']['name'] as $key => $value) {
          $file_name = explode(".",$_FILES['files']['name'][$key]);

          $rand = substr(md5(microtime()),rand(0,25),5);
          $new_name = "gallery".$rand.".".$file_name[1];
          $source = $_FILES['files']['tmp_name'][$key];
          $target = $imageDir.$new_name;

          if(move_uploaded_file($source,$target)){

            array_push($galleryImages, $new_name);

          }else{
            $response['success'] = false;
            $response['message'] = "Oops something bad occur. Contact Administrator";
          }
        }

        $galleryImagesInsertable = serialize($galleryImages);

        $query = "INSERT INTO gallery_images(gallery_img_name,gallery_info_id) VALUES(?,?)";
        $prepareStmt = $database->prepare($query);
        $prepareStmt->bind_param('si',$galleryImagesInsertable,$id);

        if($prepareStmt->execute()){
          $response['success'] = true;
          $response['message'] = "Gallery image uploaded successfully";

        }else{
          $response['success'] = false;
          $response['message'] = "Please check your internet connection.";

        }

        header("Content-Type:application/json");
        echo json_encode($response);

      }
    }
