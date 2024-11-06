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
	<!-- box icon cdn link  -->
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="css/user_style.css">
	<title>MissMe Ice Cream - menu page</title>
</head>
<body>
	<?php include 'components/user_header.php'; ?>
	
	<div class="banner">
        <div class="detail">
            <h1>Our Menu</h1>
            <span><a href="home.html">Home</a><i class='bx bx-right-arrow-alt'></i>Our Menu</span>
        </div>
    </div>
	<section class="products">
		<div class="box-container">
		<?php 
			$select_products = $conn->prepare("SELECT * FROM `products` WHERE status = ?");
			$select_products->execute(['active']);
			if ($select_products->rowCount() > 0) {
				while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
		?>
		<form action="" method="post" class="box <?php if($fetch_products['stock'] == 0){echo 'disabled';}; ?>">
			<img src="uploaded_files/<?= $fetch_products['image']; ?>" class="image">
			<?php if ($fetch_products['stock'] > 9) { ?>
		         <span class="stock" style="color: green;"><i class="fas fa-check" style="margin-right: .5rem;"></i>In Stock</span>
		      <?php }elseif($fetch_products['stock'] == 0){ ?>
		         <span class="stock" style="color: red;"><i class="fas fa-times" style="margin-right: .5rem;"></i>Out Of Stock</span>
		      <?php }else{ ?>
		         <span class="stock" style="color: white;">Hurry, only <?= $fetch_products['stock']; ?> left</span>
		      <?php } ?>
			<div class="content">
				<img src="image/shape-19.png" alt="" class="shap">
				<div class="button">
					<div><h3 class="name" style="margin-left: 8px; text-align: left;"><?= $fetch_products['name']; ?></h3>
					<p class="product-detail" style="margin-left: 8px; text-align: left;"><?= $fetch_products['product_detail']; ?></p>
				</div>
				</div>
				<p class="price" style="color: #D14D72; ">Price Rp <?= $fetch_products['price']; ?></p>
				<input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
				<div class="flex-btn">
					<input type="number" style="text-align: center" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
					<a href="checkout.php?get_id=<?= $fetch_products['id']; ?>&qty=" onclick="this.href=this.href + document.querySelector('.qty').value" class="btn">Buy Now</a>
				</div>
			</div>
		</form>
		<?php 
				}
			}else{
				echo'
					<div class="empty">
						<p>No products added yet!</p>
					</div>
				';
			}
		?>
		</div>
	</section>
	<?php include 'components/footer.php'; ?>
	
	<!-- sweetalert cdn link  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- custom js link  -->
	<script type="text/javascript" src="js/script.js"></script>
	<?php include 'components/alert.php'; ?>
</body>
</html>
