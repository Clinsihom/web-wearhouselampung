<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login Bukatoko</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <style type="text/css">
        /* New CSS for login form background color */
        .box-login {
            background-color: #333; /* Dark gray color */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #ccc; /* Light gray color for text */
        }
        /* New CSS for input fields and button */
        .input-control {
            background-color: #444; /* Dark gray color */
            color: #ccc; /* Light gray color for text */
            border: 1px solid #666; /* Medium gray border */
            border-radius: 3px;
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
        }
        .btn {
            background-color: #555; /* Slightly lighter gray color */
            color: #fff; /* White text color */
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #666; /* Darker gray color on hover */
        }
        /* Optional: Additional styles for the body background */
        body#bg-login {
            background-color: #e0e0e0; /* Light gray background for the body */
        }
    </style>
</head>
<body id="bg-login">
    
    <div class="box-login">
        <h2>Login Barera Dealer Shop</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control"><br>
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
                if(mysqli_num_rows($cek) > 0){
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->admin_id;
                    echo '<script>window.location="dashboard.php"</script>';
                }else{
                    echo '<script>alert("Username atau Password anda salah!")</script>';
                }
            }
        ?>
    </div>
</body>
</html>
