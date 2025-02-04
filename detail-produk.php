<?php 
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barera Dealer Shop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        header h1 a {
            color: #fff;
            text-decoration: none;
        }
        header ul {
            list-style: none;
            padding: 0;
        }
        header ul li {
            display: inline;
            margin-left: 20px;
        }
        header ul li a {
            color: #fff;
            text-decoration: none;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .search {
            background: #333;
            padding: 20px 0;
            color: #fff;
            text-align: center;
        }
        .search form input[type="text"] {
            width: 70%;
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            margin-right: -5px;
        }
        .search form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        .section {
            padding: 20px 0;
        }
        .section h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
        }
        .col-2 {
            width: 48%;
        }
        .col-2 img {
            width: 100%;
            border-radius: 5px;
        }
        .col-2 h3 {
            margin-top: 0;
        }
        .footer {
            background: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .footer h4 {
            margin-bottom: 10px;
            color: #4CAF50;
        }
        .footer p, .footer small {
            margin: 5px 0;
        }
        .footer small {
            color: #bbb;
        }
        .footer p {
            color: #fff;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">Barera Dealer Shop</a></h1>
            <ul>
                <li><a href="produk.php">Kembali</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- product detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" alt="<?php echo $p->product_name ?>">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <p>Deskripsi:<br>
                        <?php echo $p->product_description ?>
                    </p>
                    <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, Saya Tertarik Dengan Produk Anda." target="_blank">
                        Hubungi Via WhatsApp Dibawah:<br>
                        <img src="img/wa.png" width="px" alt="WhatsApp"></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>
            <h4>No. HP</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2024 - Barera Dealer Shop.</small>
        </div>
    </div>        
</body>
</html>
