<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign Up - DigiDab</title>
    <link rel="shortcut icon" href="assets/img/logo-1.svg">

    <style>
        * {
            font-family: Poppins;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-6 mb-5 vh-100">
                <div class="container">
                    <div class="logo mt-3" style="margin-bottom: 6rem;">
                        <img src="assets/img/Logo.svg" alt="" style="height : 2.5rem;">
                    </div>
                </div>


                <div class="row justify-content-md-center">
                    <div class="col-9">
                        <div class="content mb-4">
                            <h1 style="font-weight: 600;">Sign In</h1>
                            <p>Hi, Welcome Back!</p>
                        </div>

                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "gagal") {
                                echo '<div class="alert alert-danger text-center">Email atau password salah!</div>';
                            } else if ($_GET['pesan'] == "logout") {
                                echo '<div class="alert alert-success text-center">Anda telah berhasil logout</div>';
                            } else if ($_GET['pesan'] == "belum_login") {
                                echo '<div class="alert alert-danger text-center">Anda harus login untuk mengakses halaman admin</div>';
                            } else if ($_GET['pesan'] == "return") {
                                echo '<div class="alert alert-success text-center">Sign In Now</div>';
                            }
                        }
                        ?>

                        <form action="resources/sign-in-process.php" method="POST">
                            <div class="email mb-3">
                                <label for="email_user" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email_user" id="email_user" placeholder="example@mail.com">
                            </div>

                            <div class="password mb-5">
                                <label for="password_user" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password_user" id="password_user" placeholder="●●●●●●">
                            </div>

                            <div class="button mb-3">
                                <button class="btn btn-primary" style="width : 100%;border-color: #5E48E8; background-color: #5E48E8;">Sign In</button>
                            </div>

                            <div class="note mb-5" style="font-weight: 500; font-size: 12px;">
                                Don't have an account? <a href="sign-up.php" style="color: #5E48E8; text-decoration : none;">Sign Up here</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col col-lg-6 d-flex align-items-center justify-content-center" style="background-color: #EEF4FF;">
                <img src="assets/img/Sign-In-Illustration.svg" alt="">
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>