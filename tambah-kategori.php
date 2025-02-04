<?php
	
	session_start();
	include 'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
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
		/* Additional Styles */
		.input-control {
			width: 100%;
			margin-bottom: 10px;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		.btn {
			width: 100%;
			padding: 10px;
			border: none;
			border-radius: 5px;
			background-color: #333;
			color: #fff;
			cursor: pointer;
		}

		header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
		}

		header ul li a {
			color: #333; /* Change red to grey */
		}
	</style>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Barera Dealer Shop</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href=""> | </a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href=""> | </a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href=""> | </a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href=""> | </a></li>
				<li><a href="index.php">Halaman Pembeli</a></li>
				<li><a href=""> | </a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>
	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Tambah Data Kategori</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control"  required>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
				if(isset($_POST['submit'])){

					$nama = ucwords($_POST['nama']);

					$insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
										null,
										'".$nama."') ");
					if($insert){
						echo '<script>alert("Tambah Data Berhasil")</script>';
						echo '<script>window.location="data-kategori.php"</script>';
					}else{
						echo 'gagal'.mydqli_error($conn);
					}

				}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2024 - Barera Dealer Shop.</small>
		</div>
	</footer>
</body>
</html>