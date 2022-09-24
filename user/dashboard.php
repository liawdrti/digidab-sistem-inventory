<?php
include("../resources/user-access.php");
include("../resources/connection.php");

$id_user = $_SESSION['user']['id_user'];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../assets/css/dashboard-style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Dashboard - <?php echo $_SESSION['user']['company_user']; ?></title>
    <link rel="shortcut icon" href="../assets/img/logo-1.svg">
</head>

<body>
    <nav class="container-fluid">
        <div class="nav-cont d-flex align-items-center justify-content-between">
            <img src="../assets/img/Dashboard-logo.svg" style="margin-left: 15px;">

            <div class="company-name" style="margin-right: 15px;">
                <?php echo $_SESSION['user']['company_user']; ?>
            </div>
        </div>


    </nav>

    <div class="d-flex">
        <div class="sidebar col-2 pt-4">
            <div class="wrapper">
                <div class="button mb-4">
                    <button class="add btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addModal" style="border-radius: 10px; height: 45px; background-color: #5E48E8; border-color: #5E48E8;">
                        <i class="bi bi-plus"></i>
                        Add Product
                    </button>
                </div>

                <div class="link">
                    <div class="active d-flex align-items-center p-2 mb-2">
                        <ul class="navbar-nav">
                            <li class="nav-item d-flex align-items-center">
                                <a href="dashboard.php" class="nav-link" style="color: #5e48e8;">
                                    <i class="bi bi-grid" style="font-size: 20px; margin-right: 15px;"></i>
                                    <span style="font-weight: 500;">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="n-active d-flex align-items-center p-2 mb-2">
                        <ul class="navbar-nav" style="color: #B5B5B5;">
                            <li class="nav-item d-flex align-items-center">
                                <a href="product.php" class="nav-links">
                                    <i class="bi bi-box" style="font-size: 20px; margin-right: 15px;"></i>
                                    <span style="font-weight: 500;">Product</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="n-active d-flex align-items-center p-2">
                        <ul class="navbar-nav" style="color: #B5B5B5;">
                            <li class="nav-item d-flex align-items-center">
                                <a href="../resources/sign-out-process.php" class="nav-links" onclick="return confirm('Anda Yakin Akan Logout?')">
                                    <i class="bi bi-box-arrow-right" style="font-size: 20px; margin-right: 15px;"></i>
                                    <span style="font-weight: 500;">Sign Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="content col-10 vh-100">
            <div class="container p-4">
                <div class="row mb-4">
                    <div class="col-lg-4">
                        <div class="card" style="border: 2px solid #E5E5E5; border-radius: 10px;">
                            <div class="card-body">
                                <div class="c-tittle text-center mb-2">
                                    Total Of Products
                                </div>
                                <div class="c-value d-flex justify-content-center align-items-center">
                                    <img src="../assets/img/total-product-icon.svg" alt="" width="64">
                                    <div class="c-value-text">
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_user = $id_user");
                                        $total = mysqli_num_rows($query);

                                        echo $total;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card" style="border: 2px solid #E5E5E5; border-radius: 10px;">
                            <div class="card-body">
                                <div class="c-tittle text-center mb-2">
                                    Out Of Stock Products
                                </div>
                                <div class="c-value d-flex justify-content-center align-items-center">
                                    <img src="../assets/img/out-stock-icon.svg" alt="" width="64">
                                    <div class="c-value-text">
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_user = $id_user AND stock_product = 0");
                                        $total = mysqli_num_rows($query);

                                        echo $total;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card" style="border: 2px solid #E5E5E5; border-radius: 10px;">
                            <div class="card-body">
                                <div class="c-tittle text-center mb-2">
                                    Low Stock Products
                                </div>
                                <div class="c-value d-flex justify-content-center align-items-center">
                                    <img src="../assets/img/low-stock-icon.svg" alt="" width="64">
                                    <div class="c-value-text">
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_user = $id_user AND stock_product BETWEEN 1  AND 5");
                                        $total = mysqli_num_rows($query);

                                        echo $total;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card" style="border: 2px solid #E5E5E5; border-radius: 10px;">
                            <div class="card-header c-tittle mb-3 d-flex align-items-center" style="color: #5e48e8; background-color: #f1efff;">
                                New Added Products
                            </div>

                            <div class="card-body">
                                <div class="container">
                                    <input class="form-control w-25 mb-2" type="search" id="search_field_input" onkeyup="search_table()" placeholder="Search all">
                                    <table class="table table-bordered" id="table_id">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">In Stock</th>
                                                <th scope="col">Cost Price</th>
                                                <th scope="col">Selling Price</th>
                                                <th scope="col">Notes </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $show = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_user = $id_user ORDER BY id_product DESC LIMIT 10");

                                            if (mysqli_num_rows($show) == 0) {
                                                echo '<tr><td colspan="6" class="text-center">No Product</td></tr>';
                                            } else {
                                                while ($data = mysqli_fetch_array($show)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data['name_product'] ?></td>
                                                        <td><?= $data['stock_product'] ?></td>
                                                        <td><?= $data['cost_price'] ?></td>
                                                        <td><?= $data['selling_price'] ?></td>
                                                        <td><?= $data['notes_product'] ?></td>
                                                    </tr>

                                            <?php }
                                            } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal add -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="../resources/add-product-process.php" method="POST">
                        <div class="name mb-3">
                            <label for="name_product" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name_product" id="name_product" placeholder="">
                        </div>

                        <div class="stock mb-3">
                            <label for="stock_product" class="form-label">Stock Product</label>
                            <input type="text" class="form-control" name="stock_product" id="stock_product" placeholder="">
                        </div>

                        <div class="cost mb-3">
                            <label for="cost_price" class="form-label">Cost Price</label>
                            <input type="text" class="form-control" name="cost_price" id="cost_price" placeholder="">
                        </div>

                        <div class="selling mb-3">
                            <label for="selling_price" class="form-label">Selling Price</label>
                            <input type="text" class="form-control" name="selling_price" id="selling_price" placeholder="">
                        </div>

                        <div class="notes mb-3">
                            <label for="notes_product" class="form-label">Notes</label>
                            <textarea class="form-control" name="notes_product" id="notes_product" cols="30" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" style="color: #5E48E8; border-radius: 10px; height: 45px; background-color: white; border: 2px solid #5E48E8;" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button class="btn btn-primary" style="border-radius: 10px; height: 45px; background-color: #5E48E8; border-color: #5E48E8;">
                                Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function search_table() {
            // Declare variables 
            var input, filter, table, tr, td, i;
            input = document.getElementById("search_field_input");
            filter = input.value.toUpperCase();
            table = document.getElementById("table_id");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    let tdata = td[j];
                    if (tdata) {
                        if (tdata.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>