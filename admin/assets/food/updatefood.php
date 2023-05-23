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
<?php

include "../../conn.php";
error_reporting(0);
$fn = $_GET['fn'];
$fname = $_GET['fname'];
$fim = $_GET['fim'];
$fcn = $_GET['fcn'];
$fp = $_GET['fp'];

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
    <title>Canteen | Admin Dashboard</title>
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
            /* overflow: hidden; */
        }


        #mu1 {
            font-size: 50px;
            text-align: center;
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

        .optxt {
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
    </style>

</head>

<body>
    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <div class="areas" id="body1">
        <div class=" main-divis" id="body1">

            <div class="cadrs" id="body1">

                <h1 id="mu1" style="text-align: center;  text-shadow: 2px 2px 4px rgba(0,0,0,0.7)">Update Food-Item</h1>

                <hr>


                <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->












                <center>

                    <form action="" method="GET">

                        <div>
                            <img src='../food/<?php print "$fim"; ?>' width="190px" height="150px" class="img_edt" />
                        </div>

                        <input type="hidden" name="id" id="id" value="<?php echo "$fn" ?>">

                        <label for="foodname">Food Name</label>
                        <input type="text" name="foodname" id="foodname" value="<?php echo "$fname" ?>" placeholder="Enter Food Name" title="Food Name must contain letters..! 15 characters only..!" autocomplete="off" required>

                        <label for="categoryname">Food Category </label>
                        <?php
                        // require "../../conn.php";
                        $sql = "select * from foodcategory ";
                        $result = $conn->query($sql);
                        $username = array();
                        echo " 
                            <select class='optxt' id='categoryname' name='categoryname'> ";
                        if ($result->num_rows > 0) {
                            ?>
                            <option class='optxt' name="categoryname" hidden selected ><?php echo "$fcn" ?></option>
                            <?php
                            while ($row = $result->fetch_assoc()) {

                                echo " <option class='optxt'>" . $row['categoryname'] . "</option> ";



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
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                for ($i = 0; $i < $n; $i++) {
                                    if ($row["categoryname"] == $categoryname[$i]) {
                                    }
                                }
                            }
                        }
                        echo " </select> ";
                        ?>

                        

                        <label for="price">Food Amount </label>
                        <input type="text" name="price" id="price" value="<?php echo "$fp" ?>" placeholder="Enter Food Price" autocomplete="off" required>





                        <br>
                        <input type="submit" name="submit" value="Update" id="btn" class="btn">



                    </form>
                    <br><br><br>
                    <div>

                    </div>
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
    $foodname = $_GET['foodname'];
    $categoryname = $_GET['categoryname'];
    $price = $_GET['price'];

    $query = "UPDATE ffooditem SET foodname='$foodname', categoryname='$categoryname',  price='$price' WHERE id='$id' ";

    $data = mysqli_query($conn, $query);

    if ($data) {
?>
        <script>
            window.location.href = "food.php";
            alert("Food-Item Updated Successfully..!");
        </script>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "food.php";
            alert("Food-Item Updation Failed..!");
        </script>
<?php
    }
}


?>