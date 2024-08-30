<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> recent | glee</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body style="background-color:#dbd4cf ;background-image: linear-gradient(170deg,#dbd4cf 20%,#ffd4a2 80%);">


    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";

            include "connection.php";

            if (isset($_SESSION["u"])) {

                $recent_rs = Database::search("SELECT DISTINCT * FROM `recent` INNER JOIN `product` ON 
                recent.product_id=product.id INNER JOIN `product_has_color` ON 
                product_has_color.product_id=product.id INNER JOIN `color` ON 
                product_has_color.color_clr_id=color.clr_id INNER JOIN `condition` ON 
                product.condition_condition_id=condition.condition_id INNER JOIN `user` ON 
                product.user_email=user.email WHERE recent.user_email='" . $_SESSION["u"]["email"] . "'");

                $recent_num = $recent_rs->num_rows;

            ?>
            <hr style="height: 5px;" class=" bg-black" />

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 rounded mb-2">
                            <div class="row">

                                <div class="col-12  mb-2">
                                    <div class="row">
                                        <div class="offset-lg-4 col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="mt-2 mb-2 logo" style="height: 80px;"></div>
                                                </div>
                                                <div class="col-10 text-center">
                                                    <P class=" fs-1 mt-3 pt-2 letter1 text-dark">RESENT</P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        

            <hr style="height: 5px;" class=" bg-black" />
                                

                                

                                <div class="col-10 col-lg-2 offset-1 border-0 border-end border-1 border-dark border-start mb-5 offset-lg-0 ">
                                    
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active">Watchlist</li>
                                        </ol>
                                    </nav>
                                    <nav class="nav nav-pills flex-column">
                                        <a class=" btn3 fw-semibold mb-3   fs-5" href="watchlist.php">My Watchlist</a>
                                        <a class=" btn3 fw-semibold mb-3 fs-5" href="cart.php">My Cart</a>
                                        <a class=" btn3 fw-semibold mb-3   fs-5" href="resents.php">Recents</a>
                                    </nav>
                                </div>

                                <?php

                                if ($recent_num == 0) {

                                 ?>
                                    <!-- empty view -->
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 emptyView"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bold mt-5">You have no items in your Recent
                                                    yet.</label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-5 mt-5">
                                                <a href="home.php" class=" btnMain fs-3 fw-semibold text-center">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- empty view -->
                                <?php
                                } else {
                                ?>
                                    <!-- have products -->
                                    <div class="col-10 offset-1 offset-lg-0 col-lg-9">
                                        <div class="row">
                                            <?php
                                            for ($x = 0; $x < $recent_num; $x++) {
                                                $recent_data = $recent_rs->fetch_assoc();
                                                
                                            ?>

                                                <div class="card mb-3 mx-0 mx-lg-2 col-12 bg-transparent border border-2 border-secondary">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">

                                                            <?php


                                                            $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $recent_data["product_id"] . "'");
                                                            $img_data = $img_rs->fetch_assoc();

                                                            ?>

                                                            <img src="<?php echo $img_data["img_path"]; ?>" class="img-fluid rounded-start shadow mt-3" style="height: 200px;" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">

                                                                <h5 class="card-title fs-2 fw-bold text-dark"><?php echo $recent_data["title"]; ?></h5>

                                                                <span class="fs-5 fw-bold text-black-40">Colour : <?php echo $recent_data["clr_name"]; ?></span>                                                                
                                                                <br>
                                                                <span class="fs-5 fw-bold text-black-40">Condition : <?php echo $recent_data["condition_name"]; ?></span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-60">Price :</span>&nbsp;&nbsp;
                                                                <span class="fs-4 w-bold text">Rs. <?php echo $recent_data["price"]; ?> .00</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-40">Quantity
                                                                    :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 fw-bold text-black-40"><?php echo $recent_data["qty"]; ?> Items available</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-40">Seller :</span>
                                                                
                                                                <span class="fs-5 fw-bold text-black-40">
                                                                    <?php echo $recent_data["fname"] . " " . $recent_data["lname"]; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-5">
                                                            <div class="card-body d-lg-grid">
                                                                <a href="singleProductView.php" class="btnSub mb-2 text-center">Buy Now</a>
                                                                <a href="cart.php" class="btnMain mb-2 text-center ">Add to Cart</a>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- have products -->
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>
                <script>
                    window.location = "home.php";
                </script>
            <?php
            }

            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>