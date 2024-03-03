<?php 
include "app/boot.php"; 
?>
<!doctype html>
<html lang="en">

<head>
     <title>Login Form</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="icon" href="img/enter.png">

     <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <link rel="stylesheet" href="css/style.css">

</head>

<body>
     <section class="ftco-section">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-md-6 text-center ">
                         <h2 class="heading-section"></h2>
                    </div>
               </div>
               <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                         <div class="login-wrap p-4 p-md-5">
                              <div class="mb-5 icon d-flex align-items-center justify-content-center" bg-light
                                   style="background-color:white;">
                                   <img src="img/demographics.png" alt="" style="width: 100%; height: 100%;">

                              </div>
                              <h3 class="text-center mb-4 # color-primary"></h3>
                              <form action="#" class="login-form" action="" method="POST">
                                   <div class="form-floating mb-2">
                                        <input type="text" class="form-control rounded-left" id="floatingInput" name="user"
                                             placeholder="" required>
                                             <label for="floatingInput">Username</label>
                                   </div>
                                   <div class="form-floating mb-2">
                                        <input type="text" class="form-control rounded-left" id="floatingInput" name="pass"
                                             placeholder="" required>
                                             <label for="floatingInput">Password</label>
                                   </div>
                                   <div class="form-group">
                                        <button type="submit" class="btn rounded submit p-3 px-5" name="login"
                                             value="Login" style="background-color:dodgerblue;">Login</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <script src="js/jquery.min.js"></script>
     <script src="js/popper.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/main.js"></script>

</body>

</html>
<?php
session_start();

if (isset($_POST['login'])) {
    include "app/koneksi.php";
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $cari = $konek->query("SELECT * FROM login WHERE user='$user' AND pass='$pass'");
    $cek = $cari->num_rows;

    if ($cek == 0) {
        echo "Maaf, data user atau password tidak ditemukan";
    } else {
        $_SESSION['user'] = $user;
        header('Location: app/index.php');
        exit();
    }
}
?>