<?php require "../conn.php"; ?>
<?php

session_start();
if (!isset($_SESSION['authfac'])) {
?>
    <script>
        window.location.href = "../loginpage.php";
    </script>
<?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noimageindex, noarchive">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ffffff">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canteen | Service</title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-home.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            /* height: auto; */
        }

        @media (max-width : 1000px) {
            input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="main_container">

        <nav class="navbar navbar-expand-md navbar-expand-lg  navBar">
            <div class="navDiv">
                <button class="navbar-toggler navBtn" data-target="#navbarToggler" type="button" data-toggle="collapse">
                    <span class="btnText"><i class="bx bx-menu bx-xs bx-border"></i></span>
                </button>
                <span class="btnText" onclick={window.scrollTo(0,0)}> <img src="../images/logo.png" width="50px" height="50px" alt="logo"> SDM Cafeteria</span>
            </div>
            <h2 class="headerText" onclick={window.scrollTo(0,0)}> <img src="../images/logo.png" alt="logo" width="50px" height="50px"> SDM Cafeteria</h2>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav  ml-auto" listItem>

                    <li class="nav-item  active">
                        <a href="./home.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">HOME</span>
                            </div>
                        </a>
                    </li>





                    <li class="nav-item ">
                        <a href="./about.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">ABOUT</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">MENU</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="checkout.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">PAYMENT</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="./cart.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></span>
                                <span class="navLinkText">ORDERED ITEMS</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="./profile.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"><i class="fa fa-user-circle" aria-hidden="true"></i> </span>
                                <span class="navLinkText" style="color: transparent;"> <?php echo " -"; ?> </span>
                                <span class="navLinkText"> <?php echo " " . strtoupper($_SESSION['username']); ?> </span>
                            </div>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>






        <br>




        <input class="searchBar" id="myInput" type="text" placeholder="Search Food Item..." onselect="return true">

        <div class="containService">


            <div class="container">
                <div id="message"></div>
                <div class="row mt-2 pb-3" id="myFood">
                    <?php
                    // include 'config.php';
                    error_reporting(0);
                    $stmt = $conn->prepare('SELECT * FROM ffooditem WHERE foodstatus="1" ');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-2" >
                            <div class="card-deck">
                                <div class="card p-2 border-secondary mb-2">
                                    <img src="../admin/assets/food/<?= $row['foodimage'] ?>" class="card-img-top" height="200">
                                    <div class="card-body p-1" >
                                        <h4 class="card-title text-center text-info"><?= $row['foodname'] ?></h4>
                                        <h6 class="card-title text-center ">Category : <span class="text-secondary"> <?= $row['categoryname'] ?> </span> </h6>
                                        <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['price'], 2) ?>/-</h5>

                                    <!-- </div> -->
                                    <!-- <div class="card-footer p-1"> -->
                                        <form action="" class="form-submit">
                                            <!-- <div class="row p-2"> -->
                                                <!-- <div class="col-md-6 py-1 pl-4"> -->
                                                    <fieldset  style="display:inline-flex;">
                                                        <label class="col-md-6 py-1 pl-4"> <b>Quantity : </b></label>
                                                        <input type="number" min="1" class="form-control pqty lapQty col-md-6 py-1 pl-4" value="1">
                                                    </fieldset>
                                                <!-- </div> -->
                                                <!-- <div class="col-md-6"> -->
                                                <!-- </div> -->
                                            <!-- </div> -->
                                            <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                            <input type="hidden" class="pname" value="<?= $row['foodname'] ?>">
                                            <input type="hidden" class="pprice" value="<?= $row['price'] ?>">
                                            <input type="hidden" class="pimage" value="<?= $row['foodimage'] ?>">
                                            <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                                            <br>
                                            <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                                                cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>


            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

            <script type="text/javascript">
                $(document).ready(function() {

                    // Send product details in the server
                    $(".addItemBtn").click(function(e) {
                        e.preventDefault();
                        var $form = $(this).closest(".form-submit");
                        var pid = $form.find(".pid").val();
                        var pname = $form.find(".pname").val();
                        var pprice = $form.find(".pprice").val();
                        var pimage = $form.find(".pimage").val();
                        var pcode = $form.find(".pcode").val();

                        var pqty = $form.find(".pqty").val();

                        $.ajax({
                            url: 'action.php',
                            method: 'post',
                            data: {
                                pid: pid,
                                pname: pname,
                                pprice: pprice,
                                pqty: pqty,
                                pimage: pimage,
                                pcode: pcode
                            },
                            success: function(response) {
                                $("#message").html(response);
                                window.scrollTo(0, 0);
                                load_cart_item_number();
                            }
                        });
                    });

                    // Load total no.of items added in the cart and display in the navbar
                    load_cart_item_number();

                    function load_cart_item_number() {
                        $.ajax({
                            url: 'action.php',
                            method: 'get',
                            data: {
                                cartItem: "cart_item"
                            },
                            success: function(response) {
                                $("#cart-item").html(response);
                            }
                        });
                    }
                });
            </script>



        </div>


    </div>


    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myFood div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>


</body>

</html>