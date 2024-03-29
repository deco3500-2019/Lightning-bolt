<!DOCTYPE html>
<head>
    <title>Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>

<html>
  <body>
    <div id="iphonex"></div>
    <div id="screen" class="container">
    <div id="head">
        <div id="time">1:3</div>
        <div id="status_icon">
            <img src="images/network.png" alt="network" style="width: 15px;">
            <img src="images/wifi.png" alt="wifi" style="width: 18px;">
            <img src="images/battery.png" alt="battery" style="width: 20px;;">
        </div>
        </div>
        <div id="content" class="container">
            <div id="profile_pic" class="row">
                <img src="images/profile_pic.jpg">
            </div>
            <div id="info" class="row">
                <p><strong>Name:</strong> name</p>
                <p><strong>Username:</strong> username</p>
                <p><strong>DOB:</strong> dob</p>
            </div>
            <hr class="line">
            <h3>Mood tracker</h3>
            <canvas id="chart" width="315px" height="240px"></canvas>
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

<?php
  echo "<script>var happy = [1,2,1,3,1,0,0];";
  echo "var energetic = [3,2,1,4,0,1,0];";
  echo "var tired = [2,0,3,2,1,1,0];";
  echo "var angry = [0,0,3,2,0,2,0];";
  echo "var sad = [0,2,1,2,4,2,0];</script>";
  
  include 'conn.php';
  $db = new MySQLDatabase();
  $db->connect();
  $entry = $db->query("SELECT * FROM 3500website");
  if (mysqli_num_rows($entry)) {
    while ($row = $entry->fetch_array()):
      $mood = $row['Mood'];
      switch($mood) {
        case 1:
          echo "<script>sad[6]++;</script>";
          break;
        case 2:
          echo "<script>angry[6]++;</script>";
          break;
        case 3:
          echo "<script>tired[6]++;</script>";
          break;
        case 4:
          echo "<script>energetic[6]++;</script>";
          break;
        case 5:
          echo "<script>happy[6]++;</script>";
          break;
      }
    endwhile;
  }
?>

<script>
  
  var dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  var dayName;
  var days = [];
  for (var i=0; i<7; i++) {
    var d = new Date();
    d.setDate(d.getDate() - i);
    dayName = dayNames[d.getDay()];
    days.unshift(dayName);
  }
  
  let chart = document.getElementById('chart').getContext('2d');
  let moodChart = new Chart(chart, {
    height: 200,
    type:'line',
    data:{
      labels: days,
      datasets:[{
        label: 'Sad',
        backgroundColor: '#7AB1FF',
        borderColor: '#7AB1FF',
        pointRadius: 5,
        borderWidth:2,
        pointBackgroundColor: '#a3c9ff',
        data:sad,
        fill:false
      }, {
        label: 'Angry',
        backgroundColor: '#f0848c',
        borderColor: '#EE5D68',
        pointRadius: 5,
        borderWidth:2,
        pointBackgroundColor: '#f0848c',
        data:angry,
        fill:false
      }, {
        label: 'Tired',
        backgroundColor: '#ffc978',
        borderColor: '#FFAD32',
        pointRadius: 5,
        borderWidth:2,
        pointBackgroundColor: '#ffc978',
        data:tired,
        fill:false
      }, {
        label: 'Energetic',
        backgroundColor: '#8aff8f',
        borderColor: '#32e339',
        pointRadius: 5,
        borderWidth:2,
        pointBackgroundColor: '#8aff8f',
        data:energetic,
        fill:false
      }, {
        label: 'Happy',
        backgroundColor: '#fcff4a',
        borderColor: '#e5e800',
        pointRadius: 5,
        borderWidth:2,
        pointBackgroundColor: '#fcff4a',
        data:happy,
        fill:false
      }],
    },
    options:{
      responsive: false,
      legend: {
        position: 'bottom'
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            stepSize: 1,
            suggestedMin: 0.5
          }
        }]
      }
    }
  });
</script>
<script src="js/journal.js"></script>
</html>