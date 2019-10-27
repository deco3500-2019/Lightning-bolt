<?php

include 'conn.php';
$db = new MySQLDatabase();
$db->connect();

if (isset($_POST["delete"])) {
  $delete_id = $_POST["id"];
  $db->query("DELETE FROM 3500website WHERE id=".$delete_id."");
}

?>
<!DOCTYPE html>
<head>
    <title></title>
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

    <script src="js/entry.js"></script>
</head>
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
                <a href="journal.php"
                    ><img class="back_img" src="images/back.png" alt="back"
                /></a>

                <h2 id="day_title"></h2>
            </div>
            <div id="prev_journal">
          
          <?php
              
          $entries = $db->query("SELECT * FROM 3500website");
          if (mysqli_num_rows($entries)) {
            while ($row = $entries->fetch_array()):
              $id = $row['id'];
              $timestamp = $row['TimeStamp'];
              $time = date('H:i', strtotime($row['TimeStamp']));
              $title = $row['Title'];
          ?>
              <div style="margin: 20px 25px 0 25px; font-size: 20px; display: flex;" class="row">
                <form method="post" action="view journal.php" style="flex-grow: 2;">
                  <input type="hidden" name="method" value="view">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                  <button type="submit" name="view_journal" style="width: 100%; max-width: 250px; border: none; padding: 0px; background-color: transparent; text-align: left;">
                    <p style="margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $title; ?></p>
                    <p style="font-family:'arial'; color: gray; font-size: 12px;"><?php echo $time; ?></p>
                  </button>
                </form>
                <form method="post">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                  <button type="submit" name="delete" style="border: none; padding: 0px; background-color: transparent;margin-top:10px;">
                    ❌
                  </button>
                </form>
              </div>
              <hr style="border-bottom: 1px solid #ccc; width: 86%; margin-top: 0; margin-bottom: 0;">
          
          <?php
                endwhile;
              }
          ?>

            </div>
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
    /*
    function confirm_delete(timestamp)
    {
      var overlay = document.createElement("div");
      overlay.className = "overlay";
      
      var div = document.createElement("div");
      
      var f = document.createElement("form");
      f.setAttribute('method',"post");

      var i = document.createElement("input"); //input element, text
      i.setAttribute('type',"hidden");
      i.setAttribute('name',"timestamp");
      i.setAttribute('value',timestamp);

      var s = document.createElement("button"); //input element, Submit button
      s.setAttribute('type',"submit");
      s.setAttribute('name',"delete");
      var text = document.createTextNode("Yes");
      s.appendChild(text);
      
      var b = document.createElement("button");
      b.className = "cancel_but";
      text = document.createTextNode("No");
      b.appendChild(text);

      var screen = document.getElementById("screen");
      screen.prepend(overlay);
      overlay.appendChild(div);
      div.appendChild(f);
      f.appendChild(i);
      f.appendChild(s);
      f.appendChild(b);
    }
    */
  </script>
</html>