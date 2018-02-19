<?php
    include "../dbConfig.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){

      $postId = intval($_POST["deletePostId"]);

      $queryImage = "SELECT post_image From frontpost WHERE post_id = '$postId'";
      $result = $database->query($queryImage);

      //If result is going to be fetch truly, then
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $oldImage = $row["post_image"];
        }
      }

      unlink("../../uploads/images/frontpost/".$oldImage);

      $query = "DELETE FROM frontpost WHERE post_id = ?";
      $prepareStmt = $database->prepare($query);
      $prepareStmt->bind_param('i',$postId);

      //If we have success then.
      if($prepareStmt->execute()){
        $response["success"] = true;
        $response["message"] = "Post deleted successfully";
        header('Content-Type: application/json');
        echo json_encode($response);
      }else{
        $response["success"] = false;
        $response["message"] = "Oops there is problem deleting post. Contact service providers";
        header('Content-Type: application/json');
        echo json_encode($response);
      }
    }
