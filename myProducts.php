<?php

session_start();
include "connection.php";

if (isset($_SESSION["u"])){
    $email = $_SESSION["u"]["email"];
    $pageno;

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Products | glee</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />


</head>

<body style="background-color:#dbd4cf ;background-image: linear-gradient(170deg,#dbd4cf 20%,#ffd4a2 80%);">

    <div class="container-fluid">
        <div class="row">

            <!-- header -->
            <div class="col-12 footer p-3">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-lg-4 mt-1 mb-1 text-center">
                            <?php
                                    $img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");
                                    $img_num = $img_rs->num_rows;

                                    if ($img_num == 1) {
                                        $img_data = $img_rs->fetch_assoc();
                                    ?>
                                        <img src="<?php echo $img_data["path"]; ?>" width="90px" height="90px" class="rounded-circle" />
                                    <?php
                                    } else {
                                    ?>
                                        <img src="resources/new_user.svg" width="90px" height="90px" class="rounded-circle" />
                                    <?php
                                    }
                                    ?>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="row text-center text-lg-start">
                                    <div class="col-12 mt-0 mt-lg-4">
                                        <span class="text-white fw-light h5">
                                            <?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?>
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-white "><?php echo $email; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-12 col-lg-8 mt-2 my-lg-4">
                                <h1 class="offset-4 offset-lg-2 text-white fw-bold">My Products</h1>
                            </div>
                            
                            <div class="col-8 col-lg-2 mx-2 mb-2 my-lg-4 mx-lg-0 d-grid">
                                <button class="btn btn-outline-light fw-semibold fs-5" onclick="window.location='addProduct.php'">Add Product</button>
                            </div>

                            <div class=" col-3 col-lg-2 align-items-end  mx-2 mb-2 my-lg-4 mx-lg-0 d-grid">

                                <a href="adminPanel.php" class="form-floating text-white ">
                                <i class="bi bi-shop-window" style="font-size: 20px; margin-left:50px ;"></i>
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- header -->

            <!-- body -->
            <div class="col-12">
                <div class="row">
                    <!-- filter -->
                    <div class="col-11 col-lg-2 mx-3 my-3 border border-secondary rounded">
                        <div class="row">
                            <div class="col-12 mt-3 fs-5">
                                <div class="row ">

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Sort Products</label>
                                    </div>
                                    <div class="col-11">
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" placeholder="Search..." class="form-control" id="s" />
                                            </div>
                                            <div class="col-1 p-1">
                                                <label class="form-label"><i class="bi bi-search fs-5"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold ">Active Time</label>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input fs-5" type="radio" name="r1" id="n">
                                            <label class="form-check-label fs-6" for="n">
                                                Newest to oldest
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input fs-5" type="radio" name="r1" id="o">
                                            <label class="form-check-label fs-6" for="o">
                                                Oldest to newest
                                            </label>
                                        </div>
                                    </div>
                                    <br><br>

                                    <div class="col-12 mt-3">
                                        <label class="form-label fw-semibold">By quantity</label>
                                    </div>
                                    

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r2" id="h">
                                            <label class="form-check-label fs-6" for="h">
                                                High to low
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r2" id="l">
                                            <label class="form-check-label fs-6" for="l">
                                                Low to high
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label class="form-label fw-semibold">By condition</label>
                                    </div>
                                   
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r3" id="b">
                                            <label class="form-check-label fs-6" for="b">
                                            hand made
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r3" id="u">
                                            <label class="form-check-label fs-6" for="u">
                                            import
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center mt-3 mb-3">
                                        <div class="row g-2">
                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="btnSub fw-semibold" onclick="sort1(0);">Sort</button>
                                            </div>
                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="btnMain fw-semibold" onclick="clearSort();">Clear</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- filter -->

                    <!-- product -->
                    <div class="col-12 col-lg-9 mt-3 mb-3 " id="sort">

                        <div class="row" >

                            <div class=" col-12 text-center ">

                                <div class="row justify-content-center">

                                    <?php

                                    if (isset($_GET["page"])) {
                                        $pageno = $_GET["page"];
                                    } else {
                                        $pageno = 1;
                                    }

                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                                    $product_num = $product_rs->num_rows;

                                    $results_per_page = 5;
                                    $number_of_pages = ceil($product_num / $results_per_page);

                                    $page_results = ($pageno - 1) * $results_per_page;
                                    $selected_rs = Database::search ("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                                    LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                    $selected_num = $selected_rs->num_rows;
                                    for ($x = 0; $x < $selected_num; $x++) {
                                        $selected_data = $selected_rs->fetch_assoc();

                                    ?>

                                        <!-- card -->
                                        <div class="card mb-3 mt-3 col-11 col-lg-5 ms-3  ">

                                            <div class="row">

                                                <div class="col-md-4 mt-2">

                                                    <?php
                                                    $product_img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                                                    $product_img_data = $product_img_rs->fetch_assoc();
                                                    ?>
                                                    <img src="<?php echo $product_img_data["img_path"]; ?>" class="img-fluid rounded-start shadow-lg" />
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title fw-bold"><?php echo $selected_data["title"]; ?></h5>
                                                        <span class="card-text fw-bold text-dark fs-5">Rs. <?php echo $selected_data["price"]; ?> .00</span><br />
                                                        <span class="card-text fw-bold text-dark"><?php echo $selected_data["qty"]; ?> Items left</span>

                                                        <div class="form-check form-switch">

                                                            <input class="form-check-input" type="checkbox" role="switch" id="toggle<?php echo $selected_data["id"]; ?>" 
                                                            onchange="changeStatus(<?php echo $selected_data['id']; ?>);" 
                                                            <?php if ($selected_data["status_status_id"] == 2) { ?> checked <?php } ?> />
                                                            
                                                            <label class="form-check-label fw-bold text-secondary" for="toggle<?php echo $selected_data["id"]; ?>">
                                                                <?php if ($selected_data["status_status_id"] == 1) { ?>
                                                                    Make Your Product Deactive
                                                                <?php } else { ?>
                                                                    Make Your Product Active
                                                                <?php } ?>
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row g-1">
                                                                  
                                                                        <button class="btnSub col-12 d-grid  fw-bold btnmain " onclick="sendId(<?php echo $selected_data['id']; ?>);">
                                                                            Update
                                                                        </button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card -->

                                    <?php
                                    }

                                    ?>


                                </div>
                            </div>

                            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3  ">
                                <nav aria-label="Page navigation example ">
                                    <ul class="pagination pagination-lg justify-content-center ">
                                        <li class="page-item  ">
                                            <a class="page-link" href="
                                            <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                                echo "?page=" . ($pageno - 1);
                                            } ?>
                                            " aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        <?php
                                        for ($x = 1; $x <= $number_of_pages; $x++) {
                                            if ($x == $pageno) {
                                        ?>
                                                <li class="page-item active ">
                                                    <a class="page-link  paginationColor" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                </li>
                                        <?php
                                            }
                                        }
                                        ?>

                                        <li class="page-item">
                                            <a class="page-link" href="
                                            <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                                echo "?page=" . ($pageno + 1);
                                            } ?>
                                            " aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <!-- product -->

                </div>
            </div>
            <!-- body -->

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>

<?php

}else {
    header("Location:home.php");
}

?>