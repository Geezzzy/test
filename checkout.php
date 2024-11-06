<?php 
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
    exit();
}

if (isset($_POST['place_order'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $method = filter_var($_POST['method'], FILTER_SANITIZE_STRING);
    $qty = filter_var($_POST['qty'], FILTER_SANITIZE_NUMBER_INT);

    if (isset($_GET['get_id'])) {
        $get_product = $conn->prepare("SELECT * FROM `products` WHERE id=? LIMIT 1");
        $get_product->execute([$_GET['get_id']]);
        if ($get_product->rowCount() > 0) {
            while ($fetch_p = $get_product->fetch(PDO::FETCH_ASSOC)) {
                $seller_id = $fetch_p['seller_id'];
                // Cek apakah produk sudah ada di pesanan
                $check_order = $conn->prepare("SELECT * FROM `orders` WHERE user_id=? AND product_id=?");
                $check_order->execute([$user_id, $fetch_p['id']]);
                if ($check_order->rowCount() > 0) {
                    // Jika produk sudah ada, perbarui kuantitasnya
                    $update_order = $conn->prepare("UPDATE `orders` SET qty=? WHERE user_id=? AND product_id=?");
                    $update_order->execute([$qty, $user_id, $fetch_p['id']]);
                } else {
                    // Jika produk belum ada, tambahkan entri baru
                    $insert_order = $conn->prepare("INSERT INTO `orders` (id, user_id, seller_id, name, number, email, method, product_id, price, qty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $insert_order->execute([unique_id(), $user_id, $seller_id, $name, $number, $email, $method, $fetch_p['id'], $fetch_p['price'], $qty]);
                }
                header('location:order.php');
                exit();
            }
        } else {
            $warning_msg[] = 'Something went wrong';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/user_style.css">
    <title>MissMe Ice Cream - Checkout Page</title>
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>Checkout</h1>
            <span><a href="home.php">home</a><i class='bx bx-right-arrow-alt'></i>checkout</span>
        </div>
    </div>
    <section class="checkout">
        <div class="heading">
            <h1>Checkout Summary</h1>
            <img src="image/separator-img.png" alt="">
        </div>
        <div class="row">
            <form method="post" class="form">
                <input type="hidden" name="p_id" value="<?= isset($_GET['get_id']) ? $_GET['get_id'] : ''; ?>">
                <input type="hidden" name="qty" value="<?= isset($_GET['qty']) ? $_GET['qty'] : 1; ?>"> <!-- Ambil qty dari URL -->
                <h3>Billing Details</h3>
                <div class="flex">
                    <div class="box">
                        <div class="input-field">
                            <p>Your Name <span>*</span></p>
                            <input type="text" name="name" required maxlength="50" placeholder="Enter your name" class="input">
                        </div>
                        <div class="input-field">
                            <p>Your Number <span>*</span></p>
                            <input type="number" name="number" required maxlength="12" placeholder="Enter your number" class="input">
                        </div>
                        <div class="input-field">
                            <p>Your Email <span>*</span></p>
                            <input type="email" name="email" required maxlength="50" placeholder="Enter your email" class="input">
                        </div>
                        <div class="input-field">
                            <p>Payment Method <span>*</span></p>
                            <select name="method" class="input">
                                <option value="Cash">Cash</option>
                                <option value="Credit/Debit card">Credit or Debit Card</option>
                                <option value="Transfer Bank">Transfer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="place_order" class="btn">Place Order</button>
            </form>
            <div class="summary">
                <h3>My Order</h3>
                <div class="box-container">
                    <?php 
                        $grand_total = 0;
                        if (isset($_GET['get_id'])) {
                            $select_get = $conn->prepare("SELECT * FROM `products` WHERE id=? LIMIT 1");
                            $select_get->execute([$_GET['get_id']]);
                            while ($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)) {
                                $qty = isset($_GET['qty']) ? $_GET['qty'] : 1; // Ambil nilai qty dari URL
                                $sub_total = $fetch_get['price'] * $qty; // Kalkulasi sub total
                                $grand_total += $sub_total;
                    ?>
                    <div class="flex">
                        <img src="uploaded_files/<?=$fetch_get['image']; ?>" class="image">
                        <div>
                            <h3 class="name"><?=$fetch_get['name']; ?></h3>
                            <p class="price" style="color:#FCB14E"><b><?=$fetch_get['price']; ?> x <?=$qty; ?></b></p>
                        </div>
                    </div>
                    <?php 
                            }
                        }
                    ?>
                </div>
                <div class="grand-total"><span>Total amount payable: </span>Rp <?= $grand_total ?> </div>
            </div>
        </div>
    </section>
    <?php include 'components/footer.php'; ?>
    <!-- SweetAlert CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Custom JS Link -->
    <script type="text/javascript" src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>
