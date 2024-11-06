<?php

   include 'components/connect.php';

   if(isset($_COOKIE['user_id'])){
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/user_style.css">
    <title>MissMe Ice Cream - about us page</title>
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>about us</h1>
            <p>Setiap produk kami dirancang untuk membawa <br> kebahagiaan dan memanjakan lidah Anda. <br> 
            Bergabunglah dengan kami untuk merasakan pengalaman <br> es krim premium yang tak terlupakan.</p>
            <span><a href="home.html">home</a><i class='bx bx-right-arrow-alt'></i>about us</span>
        </div>
    </div>
    <div class="chef">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    
                    <h1>About Us</h1>
                    <img src="image/separator-img.png" alt="">
                </div>
                <p>Didirikan pada tahun 2024, toko kami telah menjadi favorit lokal yang dicintai, dikenal karena teksturnya yang lembut dan kombinasi rasa yang inovatif. Terinspirasi oleh tradisi keluarga dan kecintaan terhadap segala sesuatu yang manis, kami berusaha untuk membawa sedikit keajaiban dalam setiap cone dan cup yang kami sajikan.</p>
                <div class="flex-btn">
                    <a href="" class="btn">explore our menu</a>
                    <a href="" class="btn">visit our shop</a>
                </div>
            </div>
            <div class="box">
                <img src="image/icecreamy.png" alt="" class="img">
            </div>
        </div>
    </div>
    <div class="story">
        <div class="heading">
            <h1>Our Story</h1>
            <img src="image/separator-img.png" alt="">
        </div>
        <p> 
        MissMe dimulai dari cinta pada kelezatan dan kebahagiaan. Kami menciptakan ice <br>
        cream terbaik dengan bahan-bahan segar dan rasa inovatif. Kami bangga memberikan <br>
        pengalaman ice cream premium yang menggembirakan. Bergabunglah dengan kami untuk <br>
        menikmati keajaiban ice cream bersama MissMe.</p>
    </div>
    <!-- -----------------team----------------- -->
    <div class="team">
        <div class="heading">
            <span>Software Development</span>
            <h1>Kelompok 7</h1>
            <img src="image/separator-img.png" alt="">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/gladys.jpg" alt="" class="img" style="width: 530px; height: 650px; display: flex">
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap">
                    <h2>Gladys Anawai Ohyver</h2>
                    <p>825220154</p>
                </div>
            </div>
            <div class="box">
                <img src="image/grace.jpg" alt="" class="img" style="width: 530px; height: 650px; display: flex">
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap">
                    <h2>Grace Apriliani P.S</h2>
                    <p>825220161</p>
                </div>
            </div>
            <div class="box">
                <img src="image/fasia.jpg" alt="" class="img" style="overflow: hidden; width: 530px; height: 650px; display: flex">
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap">
                    <h2>Fasia Meta Sefira</h2>
                    <p>825220162</p>
                </div>
            </div>
            <div class="box">
                <img src="image/tiara.jpg" alt="" class="img" style="overflow: hidden; width: 530px; height: 650px; display: flex">
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap">
                    <h2>Tiara Zahro</h2>
                    <p>825220183</p>
                </div>
            </div>
            <div class="box">
                <img src="image/hyzel.jpg" alt="" class="img" style="width: 530px; height: 650px; display: flex">
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap">
                    <h2>Muhammad Hyzel Hallvi Y</h2>
                    <p>825220174</p>
                </div>
            </div>
        </div>
    </div>
   
   
    <!-- <div class="mission">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    <h1>our mission</h1>
                    <img src="image/separator-img.png" alt="">
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission.webp">
                    </div>
                    <div>
                        <h2>Mexican Chocolate</h2>
                        <p>A childhood favorite made larger than life, our celebration sheet cake features delicious homemade sprinkles.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission1.webp">
                    </div>
                    <div>
                        <h2>Vanila With Honey</h2>
                        <p>Layers of shaped marshmallow candies — bunnies, chicks, and simple flowers — make a memorable gift in a beribboned box</p>
                    </div>
                </div>
               <div class="detail">
                    <div class="img-box">
                        <img src="image/mission0.jpg">
                    </div>
                    <div>
                        <h2>Peppermint Chip</h2>
                        <p>Layers of shaped marshmallow candies — bunnies, chicks, and simple flowers — make a memorable gift in a beribboned box</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission2.webp">
                    </div>
                    <div>
                        <h2>Raspberry Sorbet</h2>
                        <p>Layers of shaped marshmallow candies — bunnies, chicks, and simple flowers — make a memorable gift in a beribboned box</p>
                    </div>
                </div>

            </div>
            <div class="box">
                <img src="image/form.png" class="img">
            </div>
        </div>
    </div> -->
    <?php include 'components/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>