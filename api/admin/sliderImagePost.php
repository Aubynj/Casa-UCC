<?php
    include "../dbConfig.php";
    ini_set('display_errors', 1);

    $imageDir = "../../uploads/images/slider/";
    $response = array();
    $imagePack = array();
    $title = mysqli_real_escape_string($database,trim($_GET["title"]));
    $message = mysqli_real_escape_string($database,trim($_GET["message"]));

    $tracking_post_id = md5(microtime()).rand(0,50);

    if($_SERVER['REQUEST_METHOD'] == "POST"){


      $firstquery = "INSERT INTO sliderpost(post_title, post_message, post_date,post_tracking_id) VALUES (?,?,NOW(),?)";
       $statement = $database->prepare($firstquery);
       $statement->bind_param('sss',$title,$message,$tracking_post_id);
       $statement->execute();

       $anotherQuery = "SELECT * FROM sliderpost WHERE post_tracking_id = '$tracking_post_id'";
       $result = $database->query($anotherQuery);

       $row = $result->fetch_assoc();
       $id = intval($row["post_id"]);


      if(is_array($_FILES)){

        foreach ($_FILES['files']['name'] as $key => $value) {

          $file_name = explode(".",$_FILES['files']['name'][$key]);
          $rand = substr(md5(microtime()),rand(0,25),10);
          $new_name = "slider".$rand.".".$file_name[1];
          $source = $_FILES['files']['tmp_name'][$key];
          $target = $imageDir.$new_name;

          if(move_uploaded_file($source, $target)){
            array_push($imagePack,$new_name);
          }else{
            $response['success'] = false;
            $response['message'] = "Oops something bad occur. Contact Administrator";
          }

        }

        $newImagesToBeInserted = serialize($imagePack);

        $ImageInsertQuery = "INSERT INTO sliderimage(slider_image_name,slider_image_info) VALUES(?,?)";
        $prepareStmt = $database->prepare($ImageInsertQuery);
        $prepareStmt->bind_param('si',$newImagesToBeInserted,$id);

        if($prepareStmt->execute()){
          $response['success'] = true;
          $response['message'] = "Slider post uploaded successfully";
        }else{
          $response['success'] = false;
          $response['message'] = "Please check your internet connection";
        }
      }

      header("Content-Type: application/json");
      echo json_encode($response);
  }
