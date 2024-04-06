<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="style.css" />
    <title>Login Jasatitip</title>
</head>
<body>
   
<div class="global-container d-flex flex-column justify-content-center align-items-center">
    <div class="card login-form">
        <div class="card-body text-center">
            <h1 class="card-title text-container">L O G I N</h1>
        </div>
        <div class="card-text">
            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" name="user" aria-describedby="usernameHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
            <?php
if (isset($_POST['submit'])) {
    session_start(); // Menggunakan session_start() dengan benar
    include 'db.php';

    $user = mysqli_real_escape_string($conn, $_POST['user']); // Menambahkan $conn pada pemanggilan fungsi
    $pass = mysqli_real_escape_string($conn, $_POST['pass']); // Menambahkan $conn pada pemanggilan fungsi

    $cek = mysqli_prepare($conn, "SELECT * FROM tb_admin WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($cek, 'ss', $user, $pass);
    mysqli_stmt_execute($cek);
    $result = mysqli_stmt_get_result($cek);

    if(mysqli_num_rows($result) > 0){
        $d = mysqli_fetch_object($result);
        $_SESSION['status_login'] = true;
        $_SESSION['admin_global'] = $d;
        $_SESSION['ID'] = $d->admin_id;
        echo '<script>window.location="dashboard.php"</script>';
    }else{
        echo '<script>alert("Username atau password Anda salah!")</script>';
    }
}
?>

        </div>
    </div>
</div>

</body>
</html>
