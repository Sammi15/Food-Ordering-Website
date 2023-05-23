<?php

session_start();
if(!isset($_SESSION['authadmin']))
{
    // header('Location:../Risotto Login-Register.php');
?>
<script>
    window.location.href="../loginpage.php";
</script>
<?php
}

?>
<?php include "../../conn.php"; ?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noimageindex, noarchive">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ffffff">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canteen | Admin Dashboard</title>
    <link rel="icon" href="../../../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/style-asset.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>










    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Full-width input fields */
        input {
            width: 50%;
            align-items: center;
            margin-left: 25%;
            padding: 6px 10px;
            /* margin: 8px 0; */
            /* margin-top: 2px; */
            border-radius: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: grey;
        }

        .tblinput {
            width: 50%;
            /* align-items: center; */
            margin-left: 25%;
            /* padding: 6px 10px; */
            /* margin: 8px 0; */
            margin-top: 10px;
            margin-bottom: -1%;
            /* border-radius: 5px; */
            /* display: inline-block; */
            /* border: 1px solid #ccc; */
            /* box-sizing: border-box; */
            /* background-color: grey; */
        }

        .form-control {
            width: 50%;
            align-items: center;
            margin-left: 25%;
            padding: 6px 10px;
            /* margin: 8px 0; */
            /* margin-top: 8px; */
            border-radius: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
            /* display: flex; */
            align-items: center;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: transparent;
            backdrop-filter: blur(10px);
            /* Fallback color */
            background-color: transparent;
            backdrop-filter: blur(10px);
            /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: transparent;
            backdrop-filter: blur(5px);
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            /* border: 1px solid black; */
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
            width: 50%;
            height: 70%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

        /*******************************************************************************************************/
        .popup .overlay {
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 350px;
            background: transparent;
            border: 1px solid black;
            backdrop-filter: blur(3px);
            z-index: 1;
            display: none;
        }

        .popup .content {
            position: absolute;
            top: 80%;
            left: 45%;
            transform: translate(-50%, -50%) scale(0);
            background: transparent;
            /* border:1px solid black; */
            /* backdrop-filter:blur(3px); */
            width: 49%;
            height: 90%;
            z-index: 2;
            text-align: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .popup h1 {
            text-align: center;
            color: #06032e;
            text-shadow: 2px 2px 5px rgb(78, 74, 74);
        }

        .popup .close-btn {
            position: absolute;
            cursor: pointer;
            right: 5px;
            top: 5px;
            width: 30px;
            height: 30px;
            color: red;
            font-size: 30px;
            font-weight: bolder;
            line-height: 30px;
            text-align: center;
        }

        .popup.active .overlay {
            display: block;
        }

        .popup.active .content {
            transition: all 300ms ease-in-out;
            transform: translate(-50%, -50%);
        }



        /*******************************************************************************************************/
    </style>












</head>

<body>
    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <div class="area" id="body1">
        <div class=" main-divi" id="body1">
            <div class=" card_container m-1 row" id="body1">
                <div class="heading1">Category :
                    <button onclick="document.getElementById('id01').style.display='block'" class=" btn btn1">Add Category</button>
                </div>
                <br>
                <input class="searchbox" id="myInput" style="line-height: 20px;" type="text" placeholder="Search...">


                <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->










                <div class="tables">

                    <?php
                    error_reporting(0);

                    $sql = "select * from foodcategory order by categoryname";
                    $result = $conn->query($sql);
                    $username = array();
                    echo "<table class='tbl1'><br>";
                    echo "<tr>
                          <th style='width:10%;'>Category ID</th>
                          <th>Category Image</th>
                          <th>Category Name</th>
                          <th colspan='2'>Category Status</th>
                          <th colspan='2'>Action</th></tr>";
                          $sno = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tbody id="myTable">
                                <?php
                                echo "
            
            <tr  class='rowitem'><td style='text-align:center; font-weight:bold; justify-content:center; align-items:center;'>" . $sno . "</td>
            ";
                                ?>


                                <td width="140px" style='text-align:center; font-weight:bold; justify-content:center; align-items:center;'> <img src='../category/<?php print $row["categoryimage"]; ?>' height="100px" width="100px" class="img12" /> </td>
                                <?php
                                echo "
            <td style='text-align:center;  justify-content:center; align-items:center; font-size:xx-large;'>" . $row['categoryname'] . "</td>
            ";
                                ?>



                                <?php if ($row['categorystatus'] == 0) { ?>
                                    <?php
                                    echo "
                <td style='text-align:center; font-weight:bold; border-right:none; width:145px;' class='cat_hideen'> Disabled </td>
                <td style='text-align:center; font-weight:bold; border-left:none;' class='cat_hideen'> <a href='enablecategory.php?cn=$row[id]&cname=$row[categoryname]' class='bt1'  title='Enable this Category'>  <i class='fa fa-toggle-off' aria-hidden='true'></i>

                </a> </td>
                ";
                                    ?>
                                <?php } else {
                                    echo "
                <td style='text-align:center; font-weight:bold; border-right:none; width:145px;' class='cat_availed'> Enabled </td>
                <td style='text-align:center; font-weight:bold; border-left:none;' class='cat_availed'> <a href='disablecategory.php?cn=$row[id]&cname=$row[categoryname]' class='bt1' title='Disable this Category'>  <i class='fa fa-toggle-on' aria-hidden='true'></i> </a> </td>
                ";
                                } ?>



                        <?php
                            echo "

                            <td style='text-align:center; font-size:x-large;'> <a href='updatecategory.php?cn=$row[id]&cname=$row[categoryname]&cim=$row[categoryimage]'> <i class='fa fa-pencil' aria-hidden='true'></i> </a> </td>

            <td style='text-align:center; font-size:x-large;'> <a href= 'deletecategory.php?cn=$row[id]&cname=$row[categoryname]'> <i class='fa fa-trash' aria-hidden='true'></i> </a> </td></tr>
            
                ";
                $sno++;


                            $categoryname[] = $row["categoryname"];
                        }
                    }
                    $n = sizeof($categoryname);
                    for ($i = 0; $i < $n - 1; $i++) {
                        $pos = $i;
                        for ($j = $i + 1; $j < $n; $j++) {
                            if ($categoryname[$pos] < $categoryname[$j]) {
                                $pos = $j;
                            }
                        }
                        if ($pos != $i) {
                            $temp = $categoryname[$i];
                            $categoryname[$i] = $categoryname[$pos];
                            $categoryname[$pos] = $temp;
                        }
                    }
                    $categorystatus = [];
                    $categoryimage = [];
                    $id = [];
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            for ($i = 0; $i < $n; $i++) {
                                if ($row["categoryname"] == $categoryname[$i]) {
                                    // $categorystatus[$i]=$row["categorystatus"];
                                    $id[$i] = $row["id"];
                                    $categoryimage[$i] = $row["categoryimage"];
                                }
                            }
                        }
                    }
                    echo "</tbody>";
                    echo "</table>";


                        ?>

                </div>













                <?php

                if (isset($_POST['submit'])) {

                    $file = $_FILES['categoryimage']['name'];

                    $categoryname = $_POST['categoryname'];
                    $categorystatus = $_POST['categorystatus'];

                    $query = "INSERT INTO foodcategory(categoryimage,categoryname,categorystatus) VALUES('$file','$categoryname','$categorystatus')";

                    $res = mysqli_query($conn, $query);

                    if ($res) {
                        move_uploaded_file($_FILES['categoryimage']['tmp_name'], "$file");


                ?>
                        <script>
                            window.location.href = "category.php";
                            alert("Category Added Successfully..!");
                        </script>
                    <?php

                    }


                    ?>
                    <script>
                        window.location.href = "category.php";
                        alert("Adding Category Failed..!");
                    </script>
                <?php
                }
                $conn->close();

                ?>





                <div id="id01" class="modal">

                    <form class="modal-content animate" method="post" enctype="multipart/form-data">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                        </div>

                        <div class="container">

                            <h2 style="text-align: center; font-family:cursive; text-shadow: 2px 2px 4px rgba(0,0,0,0.7)">Add Category </h2>
                            <label for="cat_name" class="tblinput">Category Name</label>
                            <input type="text" name="categoryname" class="tblinput" id="categoryname t1" placeholder="Enter Category Name" pattern="[a-z A-Z]{1,55}" title="Table name must contain letters..! 50 characters only..!" autocomplete="off" required>
                            <br><br>
                            <label for="categoryimage" class="tblinput">Category Image</label>
                            <input type="file" name="categoryimage" class="tblinput" id="categoryimage" autocomplete="off" required>

                            <input type="hidden" name="categorystatus" class="tblinput" id="categorystatus" value="1">

                            <br><br>
                            <center>
                                <input type="submit" name="submit" value="Submit" class=" btn1" id="btn">
                            </center>


                        </div>

                        <div class="container" style="background-color:transparent">

                        </div>
                    </form>
                </div>







































                <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
            </div>
        </div>
        
    </div>
    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


    <nav class="main-menu">
        <ul>
            <img src="../../../images/logo.png" class="logo" width="90px" height="90px" style="z-index: 10;">
            <li>
                <a href="../../admindash.php">
                    <i class="fa fa-tasks"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="../users.php">
                    <i class="fa fa-group"></i>
                    <span class="nav-text">
                        Users
                    </span>

                </a>

            </li>

            <li>
                <a href="../staff.php">
                    <i class="fa fa-user " aria-hidden="true"></i>
                    <span class="nav-text">
                        Staff
                    </span>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-th-large" aria-hidden="true"></i>
                    <span class="nav-text">
                        Category
                    </span>
                </a>
            </li>
            <li>
                <a href="../food/food.php">
                    <i class="fa fa-coffee fa-2x" aria-hidden="true"></i>
                    <span class="nav-text">
                        Food-Item
                    </span>
                </a>
            </li>
            <li>
                <a href="../orders.php">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span class="nav-text">
                        Orders
                    </span>
                </a>
            </li>
            <!-- <li>
                <a href="../feedback.php">
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <span class="nav-text">
                        Feedback
                    </span>
                </a>
            </li> -->

        </ul>

        <ul class="logout">
            <li style="padding-top: 5px; padding-bottom: 5px;">
                <a href="#">
                    <i class="fa fa-user-secret" style="font-size: 2.5em;" aria-hidden="true"></i>

                    <!-- ########################################################################################################################################################### -->

                    <div class='user-info'>
                    <span class='nav-text'> <?php print $_SESSION['adminname']; ?> </span>
                        <span class='nav-text'> <?php print  $_SESSION['admintype'] ?> </span>
                    </div>

                    <!-- ########################################################################################################################################################### -->
                </a>
            </li>
            <li style="border-top: 1px solid black; ">
                <a href="../../logout.php">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>



    <script src="../../../js/jquery-3.5.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>