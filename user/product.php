<?php
include("../resources/connection.php");
include("../resources/user-access.php");

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

    <title>Product - <?php echo $_SESSION['user']['company_user']; ?></title>
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
                    <div class="n-active d-flex align-items-center p-2 mb-2">
                        <ul class="navbar-nav">
                            <li class="nav-item d-flex align-items-center">
                                <a href="dashboard.php" class="nav-links">
                                    <i class="bi bi-grid font-weight-bold" style="font-size: 20px; margin-right: 15px;"></i>
                                    <span style="font-weight: 500;">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="active d-flex align-items-center p-2 mb-2">
                        <ul class="navbar-nav" style="color: #B5B5B5;">
                            <li class="nav-item d-flex align-items-center">
                                <a href="product.php" class="nav-link" style="color: #5e48e8;">
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

        <div class="content col-10  vh-100">
            <div class="container p-4">
                <div class="row">
                    <div class="col">
                        <div class="card" style="border: 2px solid #E5E5E5; border-radius: 10px;">
                            <div class="card-header c-tittle mb-3 d-flex align-items-center justify-content-between" style="color: #5e48e8; background-color: #f1efff;">
                                Data Product
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col" style="width: 6%;">No.</th>
                                            <th class="text-center" scope="col" style="width: 25%;">Product Name</th>
                                            <th class="text-center" scope="col" style="width: 10%;">In Stock</th>
                                            <th class="text-center" scope="col" style="width: 12%;">Cost Price</th>
                                            <th class="text-center" scope="col" style="width: 12%;">Selling Price</th>
                                            <th class="text-center" scope="col" style="width: 15%;">Notes </th>
                                            <th class="text-center" scope="col" style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        // $id_user = $_SESSION['user']['id_user'];
                                        $show = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_user = $id_user ORDER BY id_product DESC");

                                        if (mysqli_num_rows($show) == 0) {
                                            echo '<tr><td colspan="6" class="text-center">No Product</td></tr>';
                                        } else {
                                            while ($data = mysqli_fetch_array($show)) {
                                        ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['name_product'] ?></td>
                                                    <td><?= $data['stock_product'] ?></td>
                                                    <td><?= "Rp." . $data['cost_price'] ?></td>
                                                    <td><?= "Rp." . $data['selling_price'] ?></td>
                                                    <td><?= $data['notes_product'] ?></td>

                                                    <td>
                                                        <div class="text-center">
                                                            <a href="edit-product-process.php?id_product=<?php echo $data['id_product']; ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $data['id_product']; ?>" style="width: 85px; height: 35px; font-size: 14px; background-color: #5E48E8; border-color: #5E48E8; border-radius: 8px;">
                                                                <i class="bi bi-pencil-fill"></i>
                                                                <span style="margin-left: 8px;">Edit</span>
                                                            </a>
                                                            <a href="../resources/delete-product-process.php?id_product=<?php echo $data['id_product']; ?>" onclick="return confirm('Anda Yakin Akan Menghapus Data?')" class="btn btn-primary" style="width: 100px; height: 35px; font-size: 14px; background-color: #5E48E8; border-color: #5E48E8; border-radius: 8px;">
                                                                <i class="bi bi-trash-fill"></i>
                                                                <span style="margin-left: 8px;">Delete</span>
                                                            </a>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal<?php echo $data['id_product']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">

                                                                <form action="../resources/edit-product-process.php" method="POST">
                                                                    <input type="hidden" name="id_product" value="<?php echo $data['id_product']; ?>">
                                                                    <div class="name mb-3">
                                                                        <label for="name_product" class="form-label">Product Name</label>
                                                                        <input type="text" class="form-control" value="<?php echo $data['name_product']; ?>" name="name_product" id="name_product" placeholder="">
                                                                    </div>

                                                                    <div class="stock mb-3">
                                                                        <label for="stock_product" class="form-label">Stock Product</label>
                                                                        <input type="text" class="form-control" value="<?php echo $data['stock_product']; ?>" name="stock_product" id="stock_product" placeholder="">
                                                                    </div>

                                                                    <div class="cost mb-3">
                                                                        <label for="cost_price" class="form-label">Cost Price</label>
                                                                        <input type="text" class="form-control" value="<?php echo $data['cost_price']; ?>" name="cost_price" id="cost_price" placeholder="">
                                                                    </div>

                                                                    <div class="selling mb-3">
                                                                        <label for="selling_price" class="form-label">Selling Price</label>
                                                                        <input type="text" class="form-control" value="<?php echo $data['selling_price']; ?>" name="selling_price" id="selling_price" placeholder="">
                                                                    </div>

                                                                    <div class="notes mb-3">
                                                                        <label for="notes_product" class="form-label">Notes</label>
                                                                        <textarea class="form-control" name="notes_product" id="notes_product" cols="30" rows="3"><?php echo $data['notes_product']; ?></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" style="color: #5E48E8; border-radius: 10px; height: 45px; background-color: white; border: 2px solid #5E48E8;" data-bs-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button class="btn btn-primary" style="border-radius: 10px; height: 45px; background-color: #5E48E8; border-color: #5E48E8;">
                                                                            Save Changes
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>