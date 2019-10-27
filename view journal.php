<?php
              
              include 'conn.php';
              session_start();
              $db = new MySQLDatabase();
              $db->connect();
              
              if ($_POST['method'] == "post") {
                  
                  $uploaddir = 'uploads/';
                  $uploadfile = $uploaddir . basename($_FILES['image']['name']);

                  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>console.log(\"File is valid, and was successfully uploaded.\");</script>";
                  } else {
                    echo "<script>console.log(\"Upload failed\");</script>";
                  }
                  
                  $title = $_POST["title"];
                  $what = $_POST["what"];
                  $why = $_POST["why"];
                  $mood = $_POST["mood"];
                  $db ->query("INSERT INTO 3500website(Title, Image, What, Why, Mood) VALUES('$title', '$uploadfile', '$what', '$why', '$mood')");
                  
                  $entry = $db->query("SELECT * FROM 3500website ORDER BY id DESC LIMIT 1;");
              } else if($_POST['method'] == "view"){
              
              $id = $_POST['id'];
          
              $entry = $db->query("SELECT * FROM 3500website WHERE id = ".$id."");
              }
              if (mysqli_num_rows($entry)) {
                if ($row = mysqli_fetch_array($entry)) {
                  $title = $row['Title'];
                  $image = $row['Image'];
                  $what = $row['What'];
                  $why = $row['Why'];
                  $mood = $row['Mood'];
                  
                  switch($mood) {
                    case 1:
                      $mood_name = "Sad";
                      $label_id = "sad-label";
                      break;
                    case 2:
                      $mood_name = "Angry";
                      $label_id = "angry-label";
                      break;
                    case 3:
                      $mood_name = "Tired";
                      $label_id = "tired-label";
                      break;
                    case 4:
                      $mood_name = "Energetic";
                      $label_id = "energetic-label";
                      break;
                    case 5:
                      $mood_name = "Happy";
                      $label_id = "happy-label";
                      break;
                  }
                }
            
?>
<!DOCTYPE html>
<head>
    <title>Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/write.css" />
    <script src="js/journal.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
    ></script>
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
    />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
</head>
<style>
  .journal_view > textarea {
    padding: 10px;
    border-radius: 10px;
    background-color: white;
  }
</style>
<html>
    <body>
        <div id="iphonex"></div>
        <div id="screen" class="container">
            <div id="head">
                <div id="time">1:3</div>
                <div id="status_icon">
                    <img
                        src="images/network.png"
                        alt="network"
                        style="width: 15px;"
                    />
                    <img
                        src="images/wifi.png"
                        alt="wifi"
                        style="width: 18px;"
                    />
                    <img
                        src="images/battery.png"
                        alt="battery"
                        style="width: 20px;;"
                    />
                </div>
            </div>
            <div class="title">
                <a href="journal list.php"
                    ><img class="back_img" src="images/back.png" alt="back"
                /></a>
                <h4>
                  <?php echo $title; ?>
                </h4>
            </div>

          <?php
                  echo "<div class=\"col\">
                          <div class=\"fb-post\">
                            <img id=\"post_img\" src=".$image.">
                          </div>
                          <div class=\"journal_view\">
                            <h4>What did you feel</h4>
                            <textarea disabled=\"disabled\">".$what."</textarea>
                            <h4>Why did you feel that way</h4>
                            <textarea disabled=\"disabled\">".$why."</textarea>
                            <h4>Mood</h4>
                            <div id=".$label_id." class=\"mood_view\">
                              <span>".$mood_name."</span>
                            </div>
                          </div>
                          
                        </div>";
                }
            ?>
            

            <nav class="row footer-bar">
                <div class="col">
                    <a href="index.html"
                        ><img
                            class="footer-img"
                            src="images/Room.png"
                            alt="Home"
                    /></a>
                </div>
                <div class="col">
                    <a href="profile.php"
                        ><img
                            class="footer-img"
                            src="images/Meter.png"
                            alt="Meter"
                    /></a>
                </div>
                <div class="col">
                    <a href="framework.html"
                        ><img
                            class="footer-img"
                            src="images/Journal.png"
                            alt="Journal"
                    /></a>
                </div>
                <div class="col">
                    <a
                        ><img
                            class="footer-img"
                            src="images/Forum.png"
                            alt="Forum"
                    /></a>
                </div>
                <div class="col">
                    <a href="support.html"
                        ><img
                            class="footer-img"
                            src="images/Support.png"
                            alt="Support"
                    /></a>
                </div>
            </nav>
        </div>
    </body>
  <script>
    window.onload = function() {
      var img = document.getElementById('post_img');
      img.style.width = 'auto';
      img.style.maxWidth = '100%';
    }
  </script>
</html>