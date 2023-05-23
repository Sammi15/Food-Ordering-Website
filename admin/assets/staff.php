<?php

session_start();
if (!isset($_SESSION['authadmin']) && $_SESSION['username']) {
    $_SESSION['username'] = 'username';
    $_SESSION['usertype'] = $row['usertype'];

    // header('Location:../Risotto Login-Register.php');
?>
    <script>
        window.location.href = "../loginpage.php";
    </script>
<?php
}

?>

<?php require "../conn.php"; ?>

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
    <link rel="icon" href="../../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style-asset.css">
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
            margin-top: 8px;
            border-radius: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: grey;
        }

        .form-control {
            width: 50%;
            align-items: center;
            margin-left: 25%;
            padding: 6px 10px;
            /* margin: 8px 0; */
            margin-top: 8px;
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
                <div class="heading1">Staffs :
                    <button onclick="document.getElementById('id01').style.display='block'" class=" btn btn1">Add Staff</button>
                </div>
                <!-- <hr> -->
                <br>
                <input class="searchbox" id="myInput" style="line-height: 20px;" type="text" placeholder="Search...">

                <!-- <h3 id="head12">Users :</h3> -->
                <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
                <!-- <input class="searchbox" id="myInput" type="text" placeholder="Search.."> -->










                <div class="tables">

                    <?php
                    error_reporting(0);
                    $sql = "select * from management where usertype='Staff' order by username";
                    $result = $conn->query($sql);
                    $username = array();
                    echo "<table class='tbl1'><br>";
                    echo "<tr><th>User ID</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th colspan='3'>Time Created / Last Updated</th>
                          <th >Action</th></tr>";
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tbody id="myTable">
                        <?php
                            echo "
            
            <tr class='rowitem'><td style='padding-left:15px;'>" . $row['uid'] . "</td>
			<td style='padding-left:15px;text-transform:capitalize;'>" . $row['username'] . "</td>
			<td style='padding-left:15px;'>" . $row['email'] . "</td>
			<td style='padding-left:15px;'>" . $row['phone'] . "</td>
			<td style='padding-left:15px;'>" . date('d/M/Y ',strtotime($row['timeupdated'])) . "</td>
			<td style='padding-left:15px;'>" . date('h:i:s A',strtotime($row['timeupdated'])) . "</td>
			<td style='padding-left:15px;'>" . date('l',strtotime($row['timeupdated'])) . "</td>
           ";

            // <td style='text-align:center;'> <a href= 'editstaff.php?rn=$row[id]&un=$row[username]&em=$row[email]&ph=$row[phone]'> <i class='fa fa-pencil' aria-hidden='true'></i>
            // </a> </td>
           echo "
            <td style='text-align:center;'> <a href= 'deletestaff.php?rn=$row[id]'> <i class='fa fa-trash' aria-hidden='true'></i> </a> </td>

            ";

                            $username[] = $row["username"];
                        }
                    }
                    $n = sizeof($username);
                    for ($i = 0; $i < $n - 1; $i++) {
                        $pos = $i;
                        for ($j = $i + 1; $j < $n; $j++) {
                            if ($username[$pos] < $username[$j]) {
                                $pos = $j;
                            }
                        }
                        if ($pos != $i) {
                            $temp = $username[$i];
                            $username[$i] = $username[$pos];
                            $username[$pos] = $temp;
                        }
                    }
                    $email = [];
                    $phone = [];
                    $id = [];
                    $timeupdated = [];
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            for ($i = 0; $i < $n; $i++) {
                                if ($row["username"] == $username[$i]) {
                                    $email[$i] = $row["email"];
                                    $id[$i] = $row["id"];
                                    $phone[$i] = $row["phone"];
                                    $timeupdated[$i] = $row["timeupdated"];
                                }
                            }
                        }
                    }
                    echo "</tbody>";
                    echo "</table>";


                        ?>

                </div>














                <div id="id01" class="modal">

                    <form class="modal-content animate" action="addstaff.php" method="POST">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                        </div>

                        <div class="container">

                            <h2 style="text-align: center; font-family:cursive; text-shadow: 2px 2px 4px rgba(0,0,0,0.7)">Add Staff </h2>
                            <input type="text" name="username" id="username t1" placeholder="Enter Username" pattern="[a-z .A-Z]{1,15}" title="Username must contain letters..! 15 characters only..!" autocomplete="off" required>
                            <!-- <input type="email" name="email" id="email t1" placeholder="Enter Email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autocomplete="off" required> -->
                            <input type="tel" name="phone" id="phone t1" placeholder="Enter Phone Number" pattern="[0-9]{10}" title="Must be a 10 digit Phone Number..!" autocomplete="off" required>
                            <input type="password" name="password" id="password t1" placeholder="Enter Password" pattern=".{6,}" title="Six or more characters required..!" autocomplete="off" required>
                            <!-- <input type="hidden" name="role" id="role" value="User"> -->
                            <!-- <select style="background-color: grey; color:white;" class="form-control" id="role" name="role">
                                <option value="Chef">Chef</option>
                                <option value="Waiter">Waiter</option>
                            </select><br> -->
                            <input type="hidden" name="usertype" id="usertype" value="Staff">
                            <br>
                            <br>
                            <center>
                                <input type="submit" value="Submit" class="btn1" id="btn">
                            </center>


                        </div>

                        <div class="container" style="background-color:transparent">
                            <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> -->

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
            <img src="../../images/logo.png" class="logo" width="90px" height="90px" style="z-index: 10;">
            <li>
                <a href="../admindash.php">
                    <i class="fa fa-tasks"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="./users.php">
                    <i class="fa fa-group"></i>
                    <span class="nav-text">
                        Users
                    </span>

                </a>

            </li>
            <li class="has-subnav">
                <!-- <a href="">
                    <i class="fa fa-sitemap" aria-hidden="true"></i>

                    <span class="nav-text">
                        Department
                    </span>
                </a> -->

            </li>

            <li>
                <a href="./staff.php">
                    <i class="fa fa-user " aria-hidden="true"></i>
                    <span class="nav-text">
                        Staff
                    </span>
                </a>
            </li>

            <li>
                <a href="./category/category.php">
                    <i class="fa fa-th-large" aria-hidden="true"></i>
                    <span class="nav-text">
                        Category
                    </span>
                </a>
            </li>
            <li>
                <a href="./food/food.php">
                    <i class="fa fa-coffee fa-2x" aria-hidden="true"></i>
                    <span class="nav-text">
                        Food-Item
                    </span>
                </a>
            </li>
            <li>
                <a href="./orders.php">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span class="nav-text">
                        Orders
                    </span>
                </a>
            </li>
            <!-- <li>
                <a href="./assets/feedback.php">
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
                <a href="../logout.php">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>



    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
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