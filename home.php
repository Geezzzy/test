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
    <title>MissMe Ice Cream - home page</title>
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <!-- slider section -->
    <div class="slider-container" id="home">
        <div class="slider">
            <div class="slideBox active">
                <div class="textBox">
                    <h1>Selamat Datang di<br>
                    MissMe!
                </h1>
                    <a href="" class="btn">shop now</a>
                </div>
                <div class="imgBox">
                    <img src="image/slider.jpg" alt="">
                </div>
            </div>
            <div class="slideBox">
                <div class="textBox">
                <h1>Badmood? Manisin dulu <br> pakai MissMe~</h1>
                    <a href="" class="btn">shop now</a>
                </div>
                <div class="imgBox">
                    <img src="image/slider0.jpg" alt="">
                </div>
            </div>
            
        </div>
        <ul class="controls">
            <li onclick="nextSlide();" class="next"><i class='bx bx-right-arrow-alt'></i></li>
            <li onclick="prevsSlide();" class="prev"><i class='bx bx-left-arrow-alt'></i></li>
        </ul>
    </div>
    
    <!-- categories -->
    <div class="categories">
        <div class="heading">
            <h1>Our Ice Cream</h1>
            <img src="image/separator-img.png" alt="">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/krim.jpeg" alt="" width="430px" height="495px">
                <a href="" class="btn">Sweet Cream</a>
            </div>
            <div class="box">
                <img src="image/s3.jpeg" alt="" width="430px" height="495px">
                <a href="" class="btn">Cones Cream</a>
            </div>
            <div class="box">
                <img src="image/s2.jpg" alt="" width="430px" height="495px">
                <a href="" class="btn">Fruit Cream</a>
            </div>
        </div>
    </div>
    
    <!-- container -->
    <div class="ice-container">
        <div class="overlay"></div>
        <div class="detail">
            <h1>Hidup ini terlalu singkat <br> untuk melewatkan es krim </h1>
            <p>Es krim merupakan simbol kebahagiaan yang dapat dinikmati setiap saat, <br>
            seperti seni hidup yang perlu dihargai sebelum hilang. Ini adalah cara manis <br>
            untuk merayakan momen-momen kecil dalam hidup.</p>
            <a href="menu.php" class="btn">shop now</a>
        </div>
    </div>
    <!-- container
    <div class="taste2">
        <div class="t-banner">
            <div class="overlay"></div>
            <div class="detail">
                <h1>Find Your Taste of Desserts</h1>
                <p>Treat them to a delicious treat and send them some Luck 'o the Irish too!</p>
                <a href="menu.php" class="btn">shop now</a>
            </div>
        </div>
        <div class="box-container">
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type4.jpg" alt="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>Find Your Taste of Desserts</p>
                    <a href="menu.php" class="btn">explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type.avif" alt="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>Find Your Taste of Desserts</p>
                    <a href="shop.php" class="btn">explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type0.jpg" alt="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>Find Your Taste of Desserts</p>
                    <a href="shop.php" class="btn">explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type1.png" alt="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>Find Your Taste of Desserts</p>
                    <a href="shop.php" class="btn">explore more</a>
                </div>
            </div>
        </div>
    </div>
     -->
    <div class="pride">
        <div class="detail">
            <h1>Dengan es krim, setiap hari bisa <br> menjadi hari yang istimewa</h1>
            <p>Temukan berbagai pilihan rasa yang menggugah selera dan <br>
            nikmati kelezatan dalam setiap gigitan. Jadikan setiap hari <br> 
            Anda lebih manis dengan ice cream kami.</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>