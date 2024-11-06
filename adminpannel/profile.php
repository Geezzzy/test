<?php

   include '../components/connect.php';

   if(isset($_COOKIE['seller_id'])){
      $seller_id = $_COOKIE['seller_id'];
   }else{
      $seller_id = '';
      header('location:login.php');
   }

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ?");
   $select_products->execute([$seller_id]);
   $total_products = $select_products->rowCount();

   $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ?");
   $select_orders->execute([$seller_id]);
   $total_orders = $select_orders->rowCount();

?>
<style>
   <?php include '../css/admin_style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>

   <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
<div class="main-container">
<?php include '../components/admin_header.php'; ?>
   
<section class="seller-profile"> 
   <div class="heading">
      <h1>Profile Details</h1>
         <!-- <img src="image/icecreamy.png" width="100"> -->
   </div>
   <div class="details">
      <div class="tutor">
         <img src="image/icecreamy.png" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>Admin</span>
         <a href="update.php" class="btn">Update Profile</a>
      </div>
      <div class="flex">
         <div class="box">
            <span><?= $total_products; ?></span>
            <p>Total Products</p>
            <a href="view_posts.php" class="btn">View Products</a>
         </div>
         <div class="box">
            <span><?= $total_orders; ?></span>
            <p>Total Orders Placed</p>
            <a href="admin_order.php" class="btn">View Orders</a>
         </div>
      </div>
   </div>

</section>
</div>



<script src="script.js"></script>

</body>
</html>