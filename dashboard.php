<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barera Dealer Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style>
        /* Additional Styles */
        body {
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        .section {
            padding: 20px 0;
        }

        .box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .header h1 a {
            color: #fff;
            text-decoration: none;
        }

        .header ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        .header ul li {
            margin: 0 10px;
        }

        .header ul li a {
            color: #fff;
            text-decoration: none;
        }

        .welcome-text {
            margin-top: 0;
        }

        .footer {
            background: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer small {
            color: #bbb;
        }

        .social-icons a {
            color: #fff;
            text-decoration: none;
            margin: 0 5px;
        }

        /* Centering the video */
        .box video {
            display: block;
            margin: 0 auto;
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
            <h3>Dashboard</h3>
            <div class="box">
                <h4 class="welcome-text">Selamat Datang di Barera Dealer Shop!</h4>
                <p>
                    Kami sangat senang menyambut Anda di sini. Terima kasih telah meluangkan waktu untuk mengunjungi situs kami. Di sini, kami berkomitmen untuk menyediakan informasi dan layanan terbaik yang bisa kami tawarkan.

                    Website kami dirancang untuk memberikan pengalaman yang menyenangkan dan informatif. Apakah Anda mencari informasi terbaru, layanan unggulan, atau hanya ingin mengeksplorasi berbagai hal menarik yang kami tawarkan, Anda berada di tempat yang tepat.

                    Kami memahami bahwa setiap pengunjung memiliki kebutuhan dan tujuan yang unik, oleh karena itu kami telah mengatur situs ini agar mudah dinavigasi dan penuh dengan konten yang relevan. Jangan ragu untuk menjelajahi setiap halaman dan menemukan apa yang Anda cari. Jika Anda memiliki pertanyaan atau membutuhkan bantuan, tim kami selalu siap membantu Anda.

                    Nikmati waktu Anda di sini dan temukan sesuatu yang luar biasa. Terima kasih telah menjadi bagian dari komunitas kami. Selamat berselancar!
                </p>
            </div>
        </div>
    </div>

    <!-- Video -->
    <div class="section">
        <div class="container">
            <h3>Video</h3>
            <div class="box">
                <video width="500px" controls>
                    <source src="img/vidiomobil.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <small>&copy; 2024 - Barera Dealer Shop.</small>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-Tiktok"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
