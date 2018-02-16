<?php
    include "../dbConfig.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      session_start();
      $adminSession = intval($_SESSION['adminId']);
      $response = array();
      $postDate = date('Y-m-d');

      //Variables to hold images in database
      $imageDirectory = "../../uploads/images/";

      $postTitle = mysqli_real_escape_string($database,trim($_GET['title']));
      $postMessage = mysqli_real_escape_string($database,trim($_GET['message']));

      #Check for a successfull image uploads, then continue with the script
      if(isset($_FILES["postImage"])){
        $postImageEXT = explode(".",$_FILES["postImage"]["name"]);
        $postImageNameStore = "Image_".$adminSession."_".time().".".end($postImageEXT);
        $targetImgFile = $imageDirectory.basename($postImageNameStore);
        $newFileEXT = end($postImageEXT);

        if($newFileEXT == 'jpg' || $newFileEXT == 'png' || $newFileEXT == 'jpeg'){
          move_uploaded_file($_FILES["postImage"]["tmp_name"],$targetImgFile);

          $query = "INSERT INTO frontpost(post_title,post_message,post_image,post_date) VALUES (?,?,?,NOW())";

          $prepareStatement = $database->prepare($query);
          $prepareStatement->bind_param('sss',$postTitle,$postMessage,$postImageNameStore);

          if($prepareStatement->execute()){
            $response["success"] = true;
            $response["message"] = "Thanks your post is posted!";
            header('Content-Type: application/json');
            echo json_encode($response);
          }else{
            $response["success"] = false;
            $response["message"] = "Oops there is a problem with your post";
            header('Content-Type: application/json');
            echo json_encode($response);
          }
        }else{
          $response["invalid"] = "File format is not supported!";
          header('Content-Type: application/json');
          echo json_encode($response);
       }
      }
    }
