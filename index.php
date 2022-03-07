<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script defer src="./assets/js/main.js"></script>

  <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/main.css">
  <title>Let me POST</title>
</head>
<body>
  <section>
    <div class="title">
      <img src="assets/img/post-it.png" alt="Let me POST" />
      <h1>Let me POST</h1>
    </div>
    <div class="newPost mainBtnWrap">
      <a href="./write.php" class="mainBtn">New POST</a>
    </div>
    <div class="switchViewType">
      <span class="material-icons-outlined list">
        format_list_bulleted
      </span>
      <span class="material-icons-outlined grid">
        apps
      </span>
    </div>
    <div class="postWrap">
      <ul>
        <?php
          include_once "db.php";
          $query = "select * from sns";
          $result = mysqli_query($connect,$query);
          while($row = mysqli_fetch_array($result)){
        ?>
        <li>
          <div class="bigContainer">
            <div class="container">
              <div class="slideWrap">
                <?php
                $photoArr = explode(",",$row['photo']);
                for($i=0; $i<count($photoArr); $i++){
                  echo "
                  <figure class='slide'><img src='./assets/img/{$photoArr[$i]}' alt='img' /></figure>";
                }
                ?>
              </div>
            </div>
            <div class="pagination">
              <!-- <span></span> -->
            </div>
            <div class="prevBtn">
              <span></span>
            </div>
            <div class="nextBtn">
              <span></span>
            </div>
          </div>
          <div class="textField">
            <figure>
              <img src="./assets/img/<?php echo $row['profile']?>" alt="profile" />
            </figure>
            <div class="text">
              <p class="nickname"><?php echo $row['nickname']?></p>
              <p class="content"><?php echo $row['content']?></p>
            </div>
            <div class="button">
              <div class="showBtn">
                <span class="material-icons-outlined plusBtn">
                  add_circle_outline
                </span>
                <span class="material-icons-outlined minusBtn">
                  remove_circle_outline
                </span>
              </div>              
              <div class="flyBtn">
                <a href="update.php?index=<?php echo $row['idx']?>">EDIT</a>
                <a href="res.php?index=<?php echo $row['idx']?>">DELETE</a>
              </div>
            </div>
          </div>
        </li>
        <?php }?>
      </ul>
    </div>
  </section>
</body>
</html>