<?php
    include "../dbConfig.php";
    ini_set('display_errors', 1);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      echo "Nice </br>";


      if(is_array($_FILES)){
        foreach ($_FILES['files']['name'] as $name => $fileArray) {

          $file_name = explode(".",$_FILES['files']['name'][$name]);
          $allow_ext = array("jpg","jpeg","png");
          print_r($file_name[0]);

          if(in_array($file_name[1],$allow_ext)){
            //echo "Yes it all going";
          }

        }

      }else{
        echo "few";
      }



    }else{
      echo "Nothing now";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Uploads</title>
  </head>
  <body><br><br><br>
    <form action="check.php" method="post">
      <input type="file" name="files[]" value="" multiple>
      <button type="submit" name="button">Uploads</button>
    </form>
  </body>
</html>
