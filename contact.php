<?php 
	include 'components/connect.php';
	if(isset($_COOKIE['user_id'])){
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

	//send message

	if (isset($_POST['send_message'])) {
		if ($user_id != '') {
			$id = unique_id();
			$name = $_POST['name'];
			$name = filter_var($name, FILTER_SANITIZE_STRING);

			$email = $_POST['email'];
			$email = filter_var($email, FILTER_SANITIZE_STRING);

			$subject = $_POST['subject'];
			$subject = filter_var($subject, FILTER_SANITIZE_STRING);

			$message = $_POST['message'];
			$message = filter_var($message, FILTER_SANITIZE_STRING);

			$verify_message = $conn->prepare("SELECT * FROM `message` WHERE user_id=? AND name = ? AND email = ? AND subject = ? AND message = ?");
			$verify_message->execute([$user_id, $name, $email, $subject, $message]);

			if ($verify_message->rowCount() > 0) {
				$warning_msg[] = 'message already exist';
			}else{
				$insert_message = $conn->prepare("INSERT INTO `message`(id,user_id,name,email,subject,message) VALUES(?,?,?,?,?,?)");
				$insert_message->execute([$id, $user_id, $name, $email, $subject, $message]);
				$success_msg[] = 'comment inserted successfully';

			}


		}else{
			$warning_msg[] = 'please login first';
		}
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
	<title>MissMe Ice Cream - contact us page</title>
</head>
<body>
	<?php include 'components/user_header.php'; ?>
	
	<div class="banner">
        <div class="detail">
            <h1>contact us</h1>
            <span><a href="home.html">home</a><i class='bx bx-right-arrow-alt'></i>contact us</span>
        </div>
    </div>
	
	<div class="address">
		<div class="heading">
            <h1>our contact details</h1>
            <p style="text-align: center;">Hubungi Kami Untuk Membuat Reservasi Online</p>
            <img src="image/separator-img.png" alt="">
        </div>
		<div class="box-container">
			<div class="box">
				<i class="bx bxs-map-alt"></i>
				<div>
					<h4>address</h4>
					<p>Jl. Alpukat 4 No.32<br>Tanjung Duren, <br> West Jakarta</p>
				</div>
			</div>
			<div class="box">
				<i class="bx bxs-phone-incoming"></i>
				<div>
					<h4>phone number</h4>
					<p>+6281393359919</p>
					<p>+6281234526642</p>
				</div>
			</div>
			<div class="box">
				<i class="bx bxs-envelope"></i>
				<div>
					<h4>email</h4>
					<p>tiara@gmail.com</p>
					<p>grace@gmail.com</p>
				</div>
			</div>
		</div>
	</div>
	<?php include 'components/footer.php'; ?>
	<!-- sweetalert cdn link  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<!-- custom js link  -->
	<script type="text/javascript" src="js/script.js"></script>

	<?php include 'components/alert.php'; ?>
</body>
</html>