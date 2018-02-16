<?php
    include "../dbConfig.php";


      if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username = mysqli_real_escape_string($database, $_POST["username"]);
      $password = mysqli_real_escape_string($database,$_POST["password"]);
      $response = array(); #An Array to hold the response variables

      #Let send a transaction hashcode into db
      $query = "SELECT * FROM administrator WHERE admin_username = ? AND admin_password = ?";
      $prepareStmt = $database->prepare($query);  #Prepare the query
      $prepareStmt->bind_param('ss',$username,$password); #Bind the parameters of the variables
      $prepareStmt->execute(); #Now let execute the transactin code
      $result = $prepareStmt->get_result(); #Get the result of the transaction

      if($result -> num_rows > 0 ){  #Return true if more or one rows were fetch
        $row = $result->fetch_assoc();  #Fetch the result into an array

        session_start();    #Begin the session
        $_SESSION["adminId"] = $row["admin_id"]; #Store session of admin id
        $_SESSION["adminUser"] = $row["admin_username"]; #session of admin username

        $response['success'] = true;
        $response['message'] = "Login is successfully";

        header('Content-Type: application/json');
        echo json_encode($response);

      }else{
        $response['success'] = false;
        $response['message'] = "Wrong username and password";
        header('Content-Type: application/json');
        echo json_encode($response);
      }
    }
