<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barera Digital Shop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }
        header h1 a {
            color: #fff;
            text-decoration: none;
        }
        header ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        header ul li {
            display: inline;
            margin-right: 10px;
        }
        header ul li a {
            color: #fff;
            text-decoration: none;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            flex: 1;
        }
        .section {
            padding: 20px 0;
            text-align: center;
        }
        .box {
            background-color: #fff;
            padding: 20px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        .box h3 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .input-control[type="file"] {
            padding: 0;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #333;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #555;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: #fff;
        }
        img {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Barera Digital Shop</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="input-control" name="kategori" required>
                            <option value="">--Pilih--</option>
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($r = mysqli_fetch_array($kategori)){
                            ?>
                            <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id) ? 'selected' : ''; ?>><?php echo $r['category_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo number_format($p->product_price, 0, ',', '.') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label><br>
                        <img src="produk/<?php echo $p->product_image ?>" width="100px"><br>
                        <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                        <input type="file" name="gambar" class="input-control">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="input-control" name="status">
                            <option value="">--Pilih--</option>
                            <option value="1" <?php echo ($p->product_status == 1) ? 'selected' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo ($p->product_status == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </div>

                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php 
                if(isset($_POST['submit'])) {
                    // Data inputan dari form
                    $kategori   = $_POST['kategori'];
                    $nama       = $_POST['nama'];
                    $harga      = str_replace('.', '', $_POST['harga']); // Remove the dot for proper integer format
                    $deskripsi  = $_POST['deskripsi'];
                    $foto       = $_POST['foto'];

                    // Data gambar yang baru
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    // Jika admin ganti gambar
                    if($filename != '') {
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        $newname = 'produk'.time().'.'.$type2;

                        // Menampung data format file yang diizinkan 
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        // Validasi format file
                        if(!in_array($type2, $tipe_diizinkan)) {
                            // Jika format file tidak ada didalam tipe diizinkan
                            echo '<script>alert("Format File Tidak Diizinkan")</script>';
                        } else {
                            unlink('./produk/'.$foto);
                            move_uploaded_file($tmp_name, './produk/'.$newname);
                            $namagambar = $newname;
                        }
                    } else {
                        // Jika admin tidak ganti gambar
                        $namagambar = $foto;
                    }

                    // Query update data produk
                    $update = mysqli_query($conn, "UPDATE tb_product SET 
                                                    category_id = '".$kategori."',
                                                    product_name = '".$nama."',
                                                    product_price = '".$harga."',
                                                    product_description = '".$deskripsi."',
                                                    product_image = '".$namagambar."',
                                                    product_status = '".$_POST['status']."'
                                                    WHERE product_id = '".$p->product_id."' ");
                    if($update) {
                        echo '<script>alert("Ubah Data Berhasil")</script>';
                        echo '<script>window.location="data-produk.php"</script>';
                    } else {
                        echo 'Gagal'.mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>&copy; 2024 - Barera Digital Shop.</small>
        </div>
    </footer>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>
