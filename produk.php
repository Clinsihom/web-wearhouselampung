<?php 
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barera Dealer Shop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
	<style type="text/css">
		header {
			background-color: #333; /* Gray color */
		}
		/* New CSS for changing the button color */
		.search input[type="submit"] {
			background-color: #333; /* Change button color to #333 */
			color: #fff; /* Ensure the text color is white for contrast */
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		/* New CSS for table background color */
		.section .box {
			background-color: #f0f0f0; /* Light gray color */
			padding: 20px;
			border-radius: 5px;
		}
		/* CSS for resizing WhatsApp image */
		.footer img.whatsapp {
			width: 24px; /* Adjust width as needed */
			height: auto; /* Maintain aspect ratio */
		}
	</style>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="index.php">Barera Dealer Shop</a></h1>
			<ul>
				<li><a href="index.php">Kembali</a></li>
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

	<!-- new produk -->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
				<?php 
					if($_GET['search'] != '' || $_GET['kat'] != ''){
						$where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
					}

					$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC ");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>
					<a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
						<div class="col-4">
							<img src="produk/<?php echo $p['product_image'] ?>">
							<p class="nama"><?php echo substr($p['product_name'], 0, 30)  ?></p>
							<p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Produk Tidak Ada</p>
				<?php } ?>
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
			<!-- WhatsApp image -->
			<p>
				<a href="https://wa.me/<?php echo $a->admin_telp ?>" target="_blank">
					<img src="images/whatsapp.png" class="whatsapp" alt="WhatsApp">
				</a>
			</p>
			<small>&copy; 2024 - Barera Dealer Shop.</small>
		</div>
	</div>		
</body>
</html>
