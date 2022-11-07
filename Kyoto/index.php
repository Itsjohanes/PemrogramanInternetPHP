<?php
?>
<!DOCTYPE html>
<html>
<head>
<link rel = "icon" href = "bendera.png" >
<title>Seputar Kyoto</title>
<script>
  function pesan()
  {
    document.getElementById("pesanatuh").innerHTML("Data Anda Telah Terekap");
  }
  </script>
<link rel = "stylesheet" href = "style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href='https://css.gg/youtube.css' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style\web.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Grechen+Fuemen&family=Stick+No+Bills&display=swap" rel="stylesheet">
</head>
<body>
<script>
  window.alert("Konichiwa welcome to All About Kyoto Website - This website was made by Johannes Alexander Putra");
  </script>
<div class="header">
  <img src = "logo edit.png" href = "logo"  height="151px">
  <h3>All About Kyoto</h3>
</div>

<div class="navbar">
<a href = "https://www.instagram.com/johannesap_/"><i class="fa fa-instagram"></i>&nbsp instagram</a>
<a href="https://www.youtube.com/channel/UCJt8jJjUdqog035rA596UIg"><i class="fa fa-youtube-play" aria-hidden="true"></i>&nbspYoutube</a>
<a href="#Album" class="right">Album</a>
<a href="#about" class="right">About Kyoto</a>



</div>

<div class="row">
  <div class="side">
    <h1>Introduction</h1>
    <img class = "img" src = "kyotopic.jpg" alt = "kyoto awal">
    <p>Kyoto is one of the cities in Japan, this city is a city that maintains traditional Japanese culture.</p>
    
  </div>
  <div class="main">
    <header id  = "about">
    <h1><b>About Kyoto</b></h1>
    <img src = "kyotomeiji.jpg" width="500" height="300">
    <p>Kyoto is one of the oldest municipalities in Japan, Heian-kyō was chosen as the new seat of Japan's imperial court by Emperor Kanmu. The original city was arranged in accordance with traditional Chinese feng shui following the model of the ancient Chinese capital of Chang'an. The emperors of Japan ruled from Kyoto in the following eleven centuries until 1869. It was the scene of several key events of the Muromachi period, Sengoku period, and the Boshin War, such as the Ōnin War, the Honnō-ji Incident, the Kinmon incident and the Battle of Toba–Fushimi. Upon the Imperial Court victory over the Tokugawa shogunate, the capital was relocated to Tokyo after the Meiji Restoration. The modern municipality of Kyoto was established in 1889. The city was spared from large-scale destruction during World War II and as a result, its prewar cultural heritage has mostly been preserved.
    <p>
  
  </header>
    <br>
  <header id  = "Album">
      <h1>Album</h1>
      <h2>Video</h2>
      <embed src = "https://www.youtube.com/embed/qJhyK_Kpg3k"> </embed>
      <embed src = "https://www.youtube.com/embed/iEK9kSHmdgo"> </embed>
      <embed src = "https://www.youtube.com/embed/9Yf7tDyoyfk"> </embed>
  </header>
<br>
<h2>Photo</h2>
<h3>Food/Culinary</h3>
<img src = "yudofu.jpeg" width="500px" height = "300px" alt = "yudofu">
<p> Yudofu is a typical Kyoto dish consisting of good quality tofu. The tofu is mixed with Kyoto's special spices. This typical Kyoto cuisine is most often coveted by tourists.</p>
<img src = "kamonasu.jpg" width = "500px" height = "300px" alt ="kamonasu">
<p>Kamonasu is a typical Kyoto food that is quite popular when summer arrives. Consists of eggplant inside which is usually filled with various kinds of spices and other foods. Make this food menu so rich in taste.
</p>
<img src = "nama.jpg" width="500px" height="300px" alt = "nama">
<p>Nama Yatsuhashi is  typical Kyoto cake is most often used as a souvenir for Kyoto tourists. The shape is small, but it tastes sweet and delicious. This cake will make you miss Kyoto all the time.</p>
<h3>Destination</h3>
<img src = "kizo.jpg" width = "500px" height="300px" alt = "kizo">
<p>Kiyomizu-dera is an ancient Buddhist temple that dates back to 798.However, this shrine is often under repair due to frequent natural disasters in Japan.Kiyomizu Temple will be very crowded with visitors who want to see the view of Kyoto city from above.</p>
<img src = "fushimi.jpg"width = "500px" height="300px" alt = "fushimi">
<p>For those of you who want to take pictures and enjoy the beauty of Shinto shrines in Japan, you can choose Fushimi Inari Taisha as a favorite tourist spot.
This shrine is located in Fushimi-ku, Kyoto, Japan.The uniqueness of the Fushimi Inari Taisha tour is that there are rows of red gates on the side of the entrance of this shrine.The afternoon before sunset is the best time to visit and take pictures of one of the most beautiful temples.In addition, visitors can rest and enjoy typical food from restaurants around here.Interested in a vacation to one of the famous tourist attractions in Kyoto?</p>
<img src = "ysaka.jpg" width="500px" height="300px" alt = "ysaka">
<p>Yasaka Shrine is a Shinto shrine complex located in the Gion area of ​​Kyoto.This shrine is often known for its extraordinary Gion festival.
Gion Festival to welcome summer in Kyoto in mid-July. You can visit Yasaka Shrine at night, there are many sparkling and very beautiful lanterns in this tourist area.
In addition, you can also enjoy snacks in the temple area.</p>
  </div>

</div>

<div style ="text-align:center;background-color: #FADFA8">
  <h1>Registration</h1>
  <h5>After you register via this form you will be contacted</h5>
  <form action = "actionpage.php" method = "post" target = "_blank">
  <label for = "nama">Name:</label><br>
  <input type = "text" id = "nama" name = "nama"></br>
  <label for = "Email">Email:</label><br>
  <input type = "email" id = "email" name = "email"></br>
  <label for = "notlp" id = "notlp">No telepon</label><br>
  <input type = "tel" id = "tel" name = "tel" placeholder="081934172542"></br>
  <input type = "submit" value  = "submit">
  <input type = "reset" value  = "reset">
  </form>
</div>
<div class="footer">
  <marquee style = "color:white">Copyright Johannes Alexander Putra</marquee>
</div>
</body>
</html>
