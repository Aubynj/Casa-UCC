<?php
    include "../dbConfig.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      session_start();
      $adminUserSessionId = intval($_SESSION['adminId']);
      $response = array();
      $imageDirectory = "../../uploads/images/frontpost/";


      $id = intval($_GET["id"]);
      $title = mysqli_real_escape_string($database,$_GET["title"]);
      $msg = mysqli_real_escape_string($database,$_GET["message"]);

      //Select every images from post which is the process to be updatePostId
      $queryImage = "SELECT post_image From frontpost WHERE post_id = '$id'";
      $result = $database->query($queryImage);

      //If result is going to be fetch truly, then
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $oldImage = $row["post_image"];
        }
      }
      //Let free storage from delete old image from DB
    //  unlink("../../uploads/images/frontpost/".$oldImage);

      if(isset($_FILES["newImage"])){
        $fileExt = explode(".",$_FILES["newImage"]["name"]);
        $newFileEXT = end($fileExt);

        if($newFileEXT == "jpg" || $newFileEXT == "png" || $newFileEXT == "jpeg"){
          //Let free storage from delete old image from DB
          unlink("../../uploads/images/frontpost/".$oldImage);

          //Rename image and save in DB
          $newImageName = "Image_".$adminUserSessionId."_".time().".".end($fileExt);
          $targetDirectory = $imageDirectory.basename($newImageName);

          //Upload images successfully in DB
          if(move_uploaded_file($_FILES["newImage"]["tmp_name"],$targetDirectory)){
            $query = "UPDATE frontpost SET post_title = ?,post_message = ?,post_image = ?,post_date= NOW() WHERE post_id = ?";
            $prepareStatement = $database->prepare($query);
            $prepareStatement->bind_param('sssi',$title,$msg,$newImageName,$id);

            //If query returns true
            if($prepareStatement->execute()){
              $response["success"] = true;
              $response["message"] = "Post updated successfully";
              header('Content-Type: application/json');
              echo json_encode($response);
            }else{
              $response["success"] = false;
              $response["message"] = "Ooops there was a problem.";

              header('Content-Type: application/json');
              echo json_encode($response);
            }
          }else{
            $response["success"] = false;
            $response["message"] = "There was problem updating image!";
            header('Content-Type: application/json');
            echo json_encode($response);
          }

        }else{
          $response["success"] = false;
          $response["message"] = "Image format is not supported!";
          header('Content-Type: application/json');
          echo json_encode($response);
        }

      }else{
        $response["success"] = false;
        $response["message"] = "We can't process your request at this time. Contact support service";
        header('Content-Type: application/json');
        echo json_encode($response);
      }


    }
