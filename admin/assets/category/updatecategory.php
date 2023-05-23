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
<?php

include "../../conn.php";
error_reporting(0);
$cn = $_GET['cn'];
$cname = $_GET['cname'];
$cim = $_GET['cim'];

?>

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
    <title>GoFoodie||Admin Dashboard</title>
    <link rel="icon" href="../../../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../../css/style-asset.css"> -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            height: 100%;
            background-color: rgba(65, 65, 65, 0.3);
            overflow: hidden;
        }


        #mu1 {
            font-size: 50px;
            text-align: center;
            /* font-family: cursive; */
            width: 100%;
        }

        input {
            width: 35%;
            align-items: center;
            /* margin-left: 25%; */
            padding: 6px 10px;
            /* margin: 8px 0; */
            margin-top: 10px;
            border-radius: 5px;
            display: block;
            color: white;
            line-height: 30px;
            background-color: grey;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        label {
            width: 35%;
            text-align: left;
            margin-top: 15px;
            border-radius: 5px;
            display: block;
            box-sizing: border-box;
        }

        .form {
            position: relative;
            width: 35%;
            align-items: center;
            /* margin-left: 25%; */
            padding: 6px 10px;
            /* margin: 8px 0; */
            margin-top: 10px;
            border-radius: 5px;
            display: block;
            line-height: 30px;
            background-color: rgba(65, 65, 65, 0.3);
            border: 1px solid #ccc;
            box-sizing: border-box;
            z-index: 300;
        }

        #btn {
            color: white;
            margin: 1px;
            margin-right: 0%;
            outline: none;
            border: none;
            /* box-shadow: none; */
            box-shadow: 2px 2px 6px rgba(83, 81, 81, 0.768);
            background: linear-gradient(45deg, #000000, #3f4041);
        }

        #btn:hover {
            color: white;
            margin: 1px;
            margin-right: 0%;
            outline: none;
            border: none;
            box-shadow: 2px 2px 6px rgba(83, 81, 81, 0.768);
            background: linear-gradient(45deg, #3f4041, #000000);
        }

        #btn:focus {
            border: none;
            outline: none;
            box-shadow: none;
        }

        .cpryt1234 {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 11px;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.2);
            color: rgba(2, 7, 34, 0.829);
            padding: 5px;
            bottom: 0;
            width: 100%;
            z-index: 3;
            /* margin-top: 26%; */
            /* left: 13%; */
            /* float: right; */
            overflow: hidden;
        }

        .img_edt {
            border-radius: 10%;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.9);
        }

        .cadrs {
            width: 100%;
            height: 100%;
        }

        .main-divis {
            position: relative;
            right: 0;
            /* float: right; */
            width: 100%;
            height: auto;
            padding: 0.5%;
            /* display: flex; */
        }

        .areas {
            /* float: right; */
            /* background: #981111; */
            /* background: linear-gradient(145deg, #ffffff,rgb(120, 120, 120)); */
            /* overflow: scroll; */
            width: 100%;
            height: 100%;
        }

        .picas {
            justify-content: center;
            position: absolute;
            top: 0%;
            left: 25%;
            width: 100vh;
            /* height: 100%; */
            /* object-fit: cover; */
            /* overflow: hidden; */
            border-radius: 15px;
            background-attachment: fixed;
            position: fixed;
            opacity: 0.17;
        }
    </style>

</head>

<body>
    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <div class="areas" id="body1">
        <img src="../../../images/logo_transparent.png" class="picas" alt="">
        <div class=" main-divis" id="body1">

            <div class="cadrs" id="body1">

                <h1 id="mu1" style="text-align: center;  text-shadow: 2px 2px 4px rgba(0,0,0,0.7)">Update Category</h1>

                <hr>


                <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->












                <center>

                    <form action="" method="GET">

                        <div>
                            <img src='../category/<?php print "$cim"; ?>' width="190px" height="150px" class="img_edt" />
                        </div>

                        <input type="hidden" name="id" id="id" value="<?php echo "$cn" ?>" placeholder="Enter Username" title="Username must contain letters..! 15 characters only..!" autocomplete="off" required>

                        <label for="categoryname">Category Name</label>
                        <input type="text" name="categoryname" id="categoryname" value="<?php echo "$cname" ?>" placeholder="Enter categoryname" title="Category Name must contain letters..! 15 characters only..!" autocomplete="off" required>
                        
                        <input type="text" name="categorynameOld" id="categoryname" value="<?php echo "$cname" ?>" placeholder="Enter categoryname" hidden readonly title="Category Name must contain letters..! 15 characters only..!" autocomplete="off" required>

                        <!-- <label for="categoryimage">Category Image</label> -->
                        <!-- <input type="file" name="categoryimage" id="categoryimage" value="" placeholder="Enter categoryimage"  autocomplete="off" required> -->

                        <br>
                        <input type="submit" name="submit" value="Update" id="btn" class="btn">

                    </form>

                </center>


















            </div>







































            <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
        </div>
    </div>
   
    </div>
    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->






    <script src="../../../js/jquery-3.5.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>

</body>

</html>


<?php

if ($_GET['submit']) {


    $id       = $_GET['id'];
    $categoryname = $_GET['categoryname'];
    $categorynameOld = $_GET['categorynameOld'];

    $query = "UPDATE foodcategory SET categoryname='$categoryname' WHERE id='$id' ";
    $data = mysqli_query($conn, $query);

    $query2 = "UPDATE ffooditem SET categoryname='$categoryname' WHERE categoryname='$categorynameOld' ";
    $data2 = mysqli_query($conn, $query2);

    if ($data2 && $data) {
?>
        <script>
            window.location.href = "category.php";
            alert("Category Updated Successfully..!");
        </script>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "category.php";
            alert("Category Updation Failed..!");
        </script>
<?php
    }
}


?>