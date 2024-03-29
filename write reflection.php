<?php
include 'conn.php';
session_start();

?>

<!DOCTYPE html>
<head>
    <title>Write Reflection</title>
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
  #file_input {
    opacity: 0;
    width: 0.1px;
    height: 0.1px;
    z-index: -1;
  }
  
  .messagebox{
    max-width: 300px;
  }
  
  .messagebox > button {
    border: none;
    background-color: transparent;
  }
</style>
<html>
    <body>
        <script
            async
            defer
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"
        ></script>

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
            <form enctype="multipart/form-data" id="write" method="post" action="view journal.php">
              <input type="hidden" name="method" value="post">
                <!-- add handler! -->
                <div id="write-head">
                    <label for="exit-modal" class="clickable"
                        ><img src="images/cross.png" alt="Cancel!"
                    /></label>
                    <h4>
                        Social Media <br />
                        Reflection
                    </h4>
                    <input id="sub" type="image" src="images/tick.png" name="sub" value='Submit'>
                </div>
                <div class="fb-post" style="overflow: hidden;">
                  <input type="file" accept="image/*" onchange="show_img(event)" name="image" id="file_input" required oninvalid="no_img_popup()">
                  <label for="file_input"><img class="post_img" id="post_img" src="images/add.png" alt="upload social media screenshot"></label>
                    
                </div>
                <hr />
                <div id="write-body">
                    <h4>Title</h4>
                    <textarea
                        form="write"
                        name="title"
                        cols="43"
                        rows="2"
                        placeholder="...?"
                    ></textarea>
                    <h4>How do I feel about this post?</h4>
                    <textarea
                        form="write"
                        name="what"
                        cols="43"
                        rows="2"
                        placeholder="...?"
                    ></textarea>
                    <h4>Why do I feel this way?</h4>
                    <textarea
                        form="write"
                        name="why"
                        cols="43"
                        rows="4"
                        placeholder="...?"
                    ></textarea>

                    <h4>How are you feeling today?</h4>
                    <div id="mood">
                        <input type="radio" name="mood" id="happy" value="5" />
                        <label for="happy" id="happy-label" class="button">Happy</label>
                        <input type="radio" name="mood" id="tired" value="3" />
                        <label for="tired" id="tired-label" class="button">Tired</label>
                        <input type="radio" name="mood" id="angry" value="2" />
                        <label for="angry" id="angry-label" class="button">Angry</label>
                        <input
                            type="radio"
                            name="mood"
                            id="energetic"
                            value="4"
                        />
                        <label
                            for="energetic"
                            id="energetic-label"
                            class="button"
                            >Energetic</label
                        >
                        <input type="radio" name="mood" id="sad" value="1" />
                        <label for="sad" id="sad-label" class="button">Sad</label>
                    </div>
                </div>
            </form>

            <input type="checkbox" id="exit-modal" class="modal-state" hidden />
            <div class="overlay">
                <div>
                    <h3>Exit without saving?</h3>
                    <hr />
                    <a href="index.html"><h3>Yes</h3></a>
                    <label for="exit-modal" class="clickable"
                        ><h3>No</h3>
                    </label>
                </div>
            </div>
            <div class="overlay" id="no_img">
                <div class="messagebox">
                    <h3>Please upload a screenshot</h3>
                    <hr />
                    <button onclick="close_popup()"><h3>OK</h3></button>
                </div>
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
      var show_img = function(event) {
        var img = document.getElementById('post_img');
        var fbpost = document.getElementsByClassName('fb-post');
        
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.width = 'auto';
        img.style.maxWidth = '100%';
      };
      
      var no_img_popup = function() {
        var message = document.getElementById('no_img');
        message.style.opacity = 1;
        message.style.visibility = 'visible';
        message.style.pointerEvents = 'all';
      }
      
      var close_popup = function() {
        var message = document.getElementById('no_img');
        message.style.opacity = 0;
        message.style.visibility = 'invisible';
        message.style.pointerEvents = 'none';
      }
    </script>
    <script src="js/journal.js"></script>
</html>
