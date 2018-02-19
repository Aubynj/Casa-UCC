<?php
    include "../dbConfig.php";
    ini_set('display_errors', 1);

    $imageDir = "../../uploads/images/gallery/";
    $response = array();
    $output_array = array();
    $subject = mysqli_real_escape_string($database,trim($_POST["subject"]));

    if($_SERVER['REQUEST_METHOD'] == "POST"){

      $firstquery = "INSERT INTO gallery_info(gallery_subject,gallery_date) VALUES(?,NOW())";
      $statement = $database->prepare($firstquery);
      $statement->bind_param('s',$subject);
      $statement->execute();

      $anotherQuery = "SELECT * FROM gallery_info WHERE gallery_subject = '$subject'";
      $result = $database->query($anotherQuery);

      while($row = $result->fetch_assoc()){
        $id = intval($row["gallery_id"]);
      }

      if(is_array($_FILES)){


        foreach ($_FILES['files']['name'] as $key => $value) {
          $file_name = explode(".",$_FILES['files']['name'][$key]);

          if($file_name[1] == "jpg" || $file_name[1] == "jpeg" || $file_name[1] == "png"){

            $rand = substr(md5(microtime()),rand(0,25),5);
            $new_name = "gallery".$rand.".".$file_name[1];
            $source = $_FILES['files']['tmp_name'][$key];
            $target = $imageDir.$new_name;

            if(move_uploaded_file($source,$target)){

              $query = "INSERT INTO gallery_images(gallery_img_name,gallery_info_id) VALUES(?,?)";
              $prepareStmt = $database->prepare($query);
              $prepareStmt->bind_param("ss",$new_name,$id);

              if($prepareStmt->execute()){
                $response['success'] = true;
                $response['message'] = "Gallery image uploaded successfully";

              }else{
                $response['success'] = false;
                $response['message'] = "There is a problem saving images.";

              }

            }else{
              $response['success'] = false;
              $response['message'] = "Images cannot be upload";

            }


          }else{
            $response['success'] = false;
            $response['message'] = "Images contains invalid format";

          }


        }
        header("Content-Type:application/json");
        echo json_encode($response);

      }else{
        echo "few";
      }



    }else{
      echo "Nothing now";
    }
