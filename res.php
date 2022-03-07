<?php
  include_once "db.php";

  try{
    $query = "CREATE TABLE sns(
      idx INT NOT NULL AUTO_INCREMENT,
      nickname VARCHAR(50),
      content VARCHAR(255),
      photo VARCHAR(255),
      profile VARCHAR(255),
      date date,
      PRIMARY KEY(idx)
    )";
    mysqli_query($connect,$query);
  }catch(Exception $e) {}

  if(isset($_POST['mode'])){
    $mode = $_POST['mode'];
    if($mode === 'insert'){
      $nickname = $_POST['nickname'];
      $content = $_POST['content'];
      $photo = $_FILES['photo'];
      $profile = $_FILES['profile'];
      $date = date('y-m-d');

      $uploadDir = "./assets/img/";
      $fileName = $photo['name'];
      $tmpName = $photo['tmp_name'];

      $fileNames = array();

      for($i=0; $i<count($fileName); $i++){
        move_uploaded_file($tmpName[$i], $uploadDir.$fileName[$i]);
        array_push($fileNames, $fileName[$i]);
        $arrayString = implode(",", $fileNames);
      }

      $fileName2 = $profile['name'];
      $tmpName2 = $profile['tmp_name'];

      move_uploaded_file($tmpName2, $uploadDir.$fileName2);

      $query = "insert into sns(nickname,content,photo,profile,date) values ('$nickname','$content','$arrayString','$fileName2','$date')";
    }else if($mode === 'update'){
      $index = $_POST['index'];
      $nickname = $_POST['nickname'];
      $content = $_POST['content'];
      $photo = $_FILES['photo'];
      $profile = $_FILES['profile'];
      $date = date('y-m-d');

      $uploadDir = "./assets/img/";
      $fileName = $photo['name'];
      $tmpName = $photo['tmp_name'];

      $fileNames = array();

      $fileName2 = $profile['name'];
      $tmpName2 = $profile['tmp_name'];

      if(!empty($fileName)){
        if(!empty($fileName2)){
          $query = "select * from sns where idx='$index'";
          $result = mysqli_query($connect,$query);
          $row = mysqli_fetch_array($result);

          @unlink('./assets/img/'.$row['fileName']);
          @unlink('./assets/img/'.$row['fileName2']);

          move_uploaded_file($tmpName,'./assets/img/'.$fileName);
          move_uploaded_file($tmpName2,'./assets/img/'.$fileName2);

          for($i=0; $i<count($fileName); $i++){
            move_uploaded_file($tmpName[$i], $uploadDir.$fileName[$i]);
            array_push($fileNames, $fileName[$i]);
            $arrayString = implode(",", $fileNames);
          }

          $query = "update sns set nickname='$nickname', content='$content', photo='$arrayString', profile='$fileName2', date='$date' where idx='$index'";
        }else{
          $query = "select * from sns where idx='$index'";
          $result = mysqli_query($connect,$query);
          $row = mysqli_fetch_array($result);

          @unlink('./assets/img/'.$row['fileName']);

          move_uploaded_file($tmpName,'./assets/img/'.$fileName);

          for($i=0; $i<count($fileName); $i++){
            move_uploaded_file($tmpName[$i], $uploadDir.$fileName[$i]);
            array_push($fileNames, $fileName[$i]);
            $arrayString = implode(",", $fileNames);
          }

          $query = "update sns set nickname='$nickname', content='$content', photo='$arrayString', date='$date' where idx='$index'";
        }
      }else{
        if(!empty($fileName2)){
          $query = "select * from sns where idx='$index'";
          $result = mysqli_query($connect,$query);
          $row = mysqli_fetch_array($result);

          @unlink('./assets/img/'.$row['fileName2']);

          move_uploaded_file($tmpName2,'./assets/img/'.$fileName2);
          $query = "update sns set nickname='$nickname', content='$content', profile='$fileName2', date='$date' where idx='$index'";
        }else{
          $query = "update sns set nickname='$nickname', content='$content', date='$date' where idx='$index'";
        }
      }
    }
  }else{
    $index = $_GET['index'];
    $query = "delete from sns where idx='$index'";
  }

  mysqli_query($connect,$query);
?>
<script>
  location.href = "index.php";
</script>