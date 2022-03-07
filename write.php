<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script defer src="./assets/js/write.js"></script>

  <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/write.css">
  <title>Let me POST</title>
</head>
<body>
  <section>
    <div class="title">
      <img src="assets/img/post-it.png" alt="Let me POST" />
      <h1>Let me POST</h1>
    </div>
    <form class="postWrap" action="res.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="mode" value="insert">
      <div class="post">
        <figure>
          <label for="photo" class="photo" id="photoZone">
            <span>ADD PHOTO</span>
          </label>
          <input type="file" name="photo[]" id="photo" accept="image/*" multiple />
        </figure>
        <div class="textField">
          <figure>
            <label for="profile" class="profile" id="profileZone">
              <span>ADD PROFILE</span>
            </label>
            <input type="file" name="profile" id="profile" accept="image/*" />
          </figure>
          <div class="text">
            <input type="text" name="nickname" placeholder="What's the title?" />
            <textarea name="content" placeholder="Tell me about the story."></textarea>
          </div>
        </div>
      </div>
      <div class="newPost mainBtnWrap">
        <input type="submit" value="Complete POST" class="mainBtn" />
      </div>
    </form>
  </section>
</body>
</html>