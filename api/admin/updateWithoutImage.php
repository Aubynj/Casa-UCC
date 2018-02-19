<?php
    include "../dbConfig.php";

    $response = array();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $post_id = intval($_POST["updatePostId"]);
      $title = mysqli_real_escape_string($database,trim($_POST["updateTitle"]));
      $msg = mysqli_real_escape_string($database,trim($_POST["updateMsg"]));

      $query = "UPDATE frontpost SET post_title = ?,post_message = ?,post_date= NOW() WHERE post_id = ?";
      $prepareStmt = $database->prepare($query);
      $prepareStmt->bind_param('ssi',$title,$msg,$post_id);

      if($prepareStmt->execute()){
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

    }
