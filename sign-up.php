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

            <div class="col col-lg-6" style="background-color: #EEF4FF;">
                <div class="col">
                    <div class="container">
                        <div class="logo mt-3" style="margin-bottom: 8rem;">
                            <img src="assets/img/Logo.svg" alt="" style="height : 2.5rem;">
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <img src="assets/img/Sign-Up-Illustration.svg" alt="">
                </div>

            </div>

            <div class="col col-lg-6 mb-5">

                <div class="row justify-content-md-center mt-5 pt-3">
                    <div class="col-9">
                        <div class="text-center content mb-5">
                            <h1 style="font-weight: 600;">Sign Up</h1>
                            <p>Lets Come Join With Us!</p>
                        </div>

                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "gagal") {
                                echo '<div class="alert alert-danger text-center">Your Email Have Been Registered</div>';
                            } else if ($_GET['pesan'] == "logout") {
                                echo '<div class="alert alert-success text-center">Anda telah berhasil logout</div>';
                            } else if ($_GET['pesan'] == "belum_login") {
                                echo '<div class="alert alert-danger text-center">Anda harus login untuk mengakses halaman admin</div>';
                            }
                        }
                        ?>

                        <form action="resources/sign-up-process.php" method="POST">
                            <div class="name mb-3">
                                <label for="name_user" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name_user" id="name_user" placeholder="Lia Widirti">
                            </div>

                            <div class="email mb-3">
                                <label for="email_user" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email_user" id="email_user" placeholder="example@mail.com">
                            </div>

                            <div class="password mb-3">
                                <label for="password_user" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password_user" id="password_user" placeholder="●●●●●●">
                            </div>

                            <div class="company mb-3">
                                <label for="company_user" class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company_user" id="company_user" placeholder="Digi Store">
                            </div>

                            <div class="location mb-5">
                                <label for="location_user" class="form-label">Business Location</label>
                                <input type="text" class="form-control" name="location_user" id="location_user" placeholder="Indonesia">
                            </div>

                            <div class="button mb-3">
                                <button class="btn btn-primary" style="width : 100%;border-color: #5E48E8; background-color: #5E48E8;">Make Account</button>
                            </div>

                            <div class="note mb-5" style="font-weight: 500; font-size: 12px;">
                                Already have an account? <a href="sign-in.php" style="color: #5E48E8; text-decoration : none;">Sign In here</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>