<?php

session_start();
if (!isset($_SESSION['email']) && $_SESSION['email'] !== true) {
    header("location: ./index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Hire</title>
    <link rel="stylesheet" type="text/css" href="./css/w3.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <div class="w3-bar w3-padding w3-blue">
        <a href="#" class="w3-bar-item">BIKE SALES / HIRE</a>
        <div class="w3-right">
            <a href="./index.php" class="w3-bar-item">Home</a>
            <a href="./bikes.php" class="w3-bar-item">Bikes</a>
            <?php

            if (!isset($_SESSION['email']) && $_SESSION['email'] !== true) {
            ?>

                <div class="w3-dropdown-click w3-right">
                    <button class="w3-button w3-hover-none" onclick="loginDrop('demo')">
                        Login <i class="fa fa-caret-down"></i>
                    </button>
                    <div id="demo" class="w3-dropdown-content w3-bar-block w3-card" style="right: 0px;">
                        <form id="frmlogin" class="w3-container">
                            <h5>Log In</h5>
                            <input type="text" id="loginEmail" name="loginEmail" placeholder="email" class="w3-input w3-border w3-round"><br>
                            <input id="loginPassword" name="loginPassword" type="password" placeholder="password" class="w3-input w3-border w3-round"><br>
                            <button type="button" onclick="login()" class="w3-button w3-blue w3-block w3-round">Log in</button><br>


                        </form>
                    </div>
                </div>
                <div class="w3-dropdown-click w3-right">
                    <button class="w3-button w3-hover-none" onclick="loginDrop('demo2')">
                        Register <i class="fa fa-caret-down"></i>
                    </button>
                    <div id="demo2" class="w3-dropdown-content w3-bar-block w3-card" style="right: 0px;">
                        <form id="frmSignup" class="w3-container">
                            <h5>Sign Up</h5>
                            <input name="fullName" id="fullName" type="text" placeholder="Full Name" class="w3-input w3-border w3-round"><br>
                            <input name="email" id="email" type="text" placeholder="email" class="w3-input w3-border w3-round"><br>
                            <input name="password" id="password" type="password" placeholder="password" class="w3-input w3-border w3-round"><br>
                            <input name="confiirmPassword" id="confirmPassword" type="password" placeholder="Confirm Password" class="w3-input w3-border w3-round"><br>
                            <input type="text" name="phone" id="phone" placeholder="Phone" class="w3-input w3-border w3-round"><br>

                            <button type="button" onclick="registerUser();" class="w3-button w3-blue w3-block w3-round">Register</button><br>


                        </form>
                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="w3-dropdown-click w3-right">
                    <button class="w3-button w3-hover-none" onclick="loginDrop('demo')">
                        Welcome <?php echo $_SESSION['fullName']; ?><i class="fa fa-caret-down"></i>
                    </button>
                    <div id="demo" class="w3-dropdown-content w3-bar-block w3-card" style="right: 0px;">
                        <a href="logout.php" class="w3-bar-item">Log Out</a>
                    </div>
                </div>

            <?php
            }

            ?>

        </div>

    </div>
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-white w3-padding">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h4>New Bike</h4>
                <form action="<?php echo htmlspecialchars("./api/bikeUpload.php?bikeupload=true") ?>" enctype="multipart/form-data" method="post">
                    <div class="w3-row-padding w3-stretch">
                        <div class="w3-col l6">
                            <label for="">Bike Name</label>
                            <input type="text" required id="bikeName" name="bikeName" class="w3-input w3-border w3-round">
                        </div>
                        <div class="w3-col l3">
                            <label for="">Registration Number</label>
                            <input type="text" required id="bikeModel" name="bikeModel" class="w3-input w3-border w3-round">
                        </div>
                        <div class="w3-col l3">
                            <label for="">Purpose</label>
                            <select required name="purpose" id="purpose" class="w3-select w3-border w3-round">
                                <option value="sale">Sale</option>
                                <option value="rent">Rent</option>
                            </select>
                        </div>
                    </div>
                    <div class="w3-row-padding w3-stretch">
                        <div class="w3-col l6">
                            <label for="">Date Bought</label>
                            <input required type="date" id="dateBought" name="dateBought" class="w3-input w3-border w3-round">
                        </div>
                        <div class="w3-col l6">
                            <label title="The total distance that the bike has travelled" for="">Mileage (meters)</label>
                            <input required type="number" id="mileage" name="mileage" class="w3-input w3-border w3-round">
                        </div>
                    </div>
                    <div class="w3-row-padding w3-stretch">
                        <div class="w3-col l6">
                            <label for="">image</label>
                            <input required type="file" id="bikeImage" name="bikeImage" class="w3-input w3-border w3-round">
                        </div>
                        <div class="w3-col l6">
                            <label for="">Price</label>
                            <input required type="number" id="bikePrice" name="bikePrice" class="w3-input w3-border w3-round">
                        </div>
                    </div>
                    <br>
                    <div class="w3-center">
                        <button class="w3-button w3-blue w3-round" type="submit">Confirm Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="w3-bar w3-padding w3-light-grey">
        <div class="w3-auto">
            <div class="w3-right">
                <button class="w3-button w3-round" style="background-color: #95b5dc; color: white;" onclick="openModal('id01')">New Bike</button>
                <button class="w3-button w3-round" style="background-color: #95b5dc; color: white;" onclick="window.location.href='./managebikes.php'">Manage Bikes</button>
            </div>
        </div>
    </div><br>
    <div class="w3-auto">
        <div class="w3-row-padding w3-stretch">

            <?php
            require "./api/crud.php";

            $crud = new Crud("localhost", "root", "Felabs@6986", "bikehire");
            $fetch = $crud->fetch_data("SELECT * FROM bikes WHERE id = '" . $_GET['id'] . "'");
            foreach ($fetch as $row) {
            ?>
                <form action="<?php echo htmlspecialchars("./api/bikeUpload.php?editbike=" . $_GET["id"]); ?>" method="post">
                    <div class="w3-row-padding w3-stretch">
                        <div class="w3-col l6">
                            <label for="">Bike Name</label>
                            <input type="text" value="<?php echo $row['bikeName']; ?>" required id="bikeName" name="bikeName" class="w3-input w3-border w3-round">
                        </div>
                        <div class="w3-col l3">
                            <label for="">Registration Number</label>
                            <input type="text" value="<?php echo $row['bikeModel']; ?>" required id="bikeModel" name="bikeModel" class="w3-input w3-border w3-round">
                        </div>
                        <div class="w3-col l3">
                            <label for="">Purpose</label>
                            <select required name="purpose" id="purpose" class="w3-select w3-border w3-round">
                                <?php
                                if ($row['purpose'] === 'rent') {
                                ?>
                                    <option value="sale">Sale</option>
                                    <option value="rent" selected>Rent</option>
                                <?php
                                } else {
                                ?>
                                    <option value="sale" selected>Sale</option>
                                    <option value="rent">Rent</option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="w3-row-padding w3-stretch">
                        <div class="w3-col l6">
                            <label for="">Date Bought</label>
                            <input required type="date" value="<?php echo $row['dateBought']; ?>" id="dateBought" name="dateBought" class="w3-input w3-border w3-round">
                        </div>
                        <div class="w3-col l6">
                            <label title="The total distance that the bike has travelled" for="">Mileage (meters)</label>
                            <input required type="number" id="mileage" value="<?php echo $row['mileage']; ?>" name="mileage" class="w3-input w3-border w3-round">
                        </div>
                    </div>
                    <div class="w3-row-padding w3-stretch">
                        <div class="w3-col l6">
                            <label for="">Status</label>
                            <select name="bikestatus" id="bikestatus" class="w3-select w3-border w3-round">
                                <?php
                                if ($row['status'] === 'unavailable') {
                                ?>
                                    <option value="available">available</option>
                                    <option value="unavailable" selected>unavailable</option>
                                <?php
                                } else {
                                ?>
                                    <option value="available" selected>available</option>
                                    <option value="unavailable">unavailable</option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                        <div class="w3-col l6">
                            <label for="">Price</label>
                            <input required type="number" value="<?php echo $row['price']; ?>" id="bikePrice" name="bikePrice" class="w3-input w3-border w3-round">
                        </div>
                    </div>
                    <br>
                    <div class="w3-center">
                        <button class="w3-button w3-blue w3-round" type="submit">Confirm Add</button>
                    </div>

                </form>

            <?php
            }
            ?>
        </div>

        <?php
        if ($row['purpose'] === "rent") {
            $transactions = $crud->fetch_data("SELECT * FROM hire WHERE bikeId = '" . $_GET['id'] . "'");
        ?>
            <span class="w3-large">Rent Transactions</span>
            <table class="w3-table w3-small w3-bordered">
                <tr>
                    <th>Client Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Return Date</th>
                    <th>Reason</th>
                    <th>Price</th>
                </tr>
                <?php
                foreach ($transactions as $trow) {
                ?>
                    <tr>
                        <td><?php echo $trow['hireFullName']; ?></td>
                        <td><?php echo $trow['hireAddress']; ?></td>
                        <td><?php echo $trow['hireContact']; ?></td>
                        <td><?php echo $trow['hireReturnDate']; ?></td>
                        <td><?php echo $trow['hireReason']; ?></td>
                        <td><?php echo $trow['hireAmount']; ?></td>
                    </tr>
                <?php
                }

                ?>
            </table>

        <?php
        } else {
            $transactions = $crud->fetch_data("SELECT * FROM sales WHERE bikeId = '" . $_GET['id'] . "'");

        ?>
            <span class="w3-large">Sales Transactions</span>

            <table class="w3-table w3-small w3-bordered">
                <tr>
                    <th>Client Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Price</th>
                    <th>Date Sold</th>
                </tr>



                <?php
                foreach ($transactions as $trow) {
                ?>
                    <tr>
                        <td><?php echo $trow['saleFullName']; ?></td>
                        <td><?php echo $trow['saleAddress']; ?></td>
                        <td><?php echo $trow['saleContact']; ?></td>
                        <td><?php echo number_format($trow['saleAmount'], 2); ?></td>
                        <td><?php echo $trow['saleDate']; ?></td>
                    </tr>

                <?php
                }
                ?>
            </table>
        <?php

        }
        ?>
    </div>




    <script src="./js/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script>

    </script>

</body>

</html>