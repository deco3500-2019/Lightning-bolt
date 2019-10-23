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
    <link rel="stylesheet" href="css/framework.css" />
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
                <a href="index.html"
                    ><img class="back_img" src="images/back.png" alt="back"
                /></a>

                <h2 id="prev_title"></h2>
            </div>

            <div id="prev_journal">
                <div class="jour">
                    <div class="jour_date">
                        <p>2</p>
                        <p class="prev_w">Wed</p>
                    </div>
                    <div class="jour_img jour_img_1">
                        <!-- <img src="images/2.jpg"> -->
                    </div>
                </div>
                <a href="entry.html">
                    <div class="jour">
                        <div class="jour_date">
                            <p>6</p>
                            <p class="prev_w">Sun</p>
                         </div>
                        <div class="jour_img jour_img_2"></div>
                    </div>
                </a>

                <div class="jour">
                    <div class="jour_date">
                        <p>10</p>
                        <p class="prev_w">Thu</p>
                    </div>
                    <div class="jour_img jour_img_3"></div>
                </div>
              
              <?php
              
              include 'conn.php';
              $db = new MySQLDatabase();
              $db->connect();

              $entry = $db->query("SELECT * FROM 3500website");
              if (mysqli_num_rows($entry)) {
                if ($row = mysqli_fetch_array($entry)) {
                  echo "<a href=\"view journal.php\">
                          <div class=\"jour\">
                            <div class=\"jour_date\">
                              <p>24</p>
                              <p class=\"prev_w\">Thu</p>
                            </div>
                            <div class=\"jour_img jour_img_4\"></div>
                          </div>
                        </a>";
                }
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
        <nav class="navbar navbar-dark bg-dark fixed-top ">
            <a
                class="navbar-brand"
                href="https://deco3801-computerised.uqcloud.net/"
                class="ml-sm-2"
                >App-Tivity</a
            >
            <div class="navbar-nav ml-auto mr-sm-2">
                <a href="#home" class="nav-link nav-item">home</a>
                <a href="#features" class="nav-link nav-item">about</a>
                <a href="#pricing" class="nav-link nav-item">video</a>
                <a href="#pricing" class="nav-link nav-item">team</a>
                <a href="data.php" class="nav-link nav-item">statistic</a>
            </div>
        </nav>
    </body>
</html>
