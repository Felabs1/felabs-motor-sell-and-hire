<?php
session_start();

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
    <div>
        <div class="mySlides w3-animate-opacity" style="width:100%; height: 400px; animation-duration: 5s; background-size: cover; background-position: center; background-image: url('./images/assets/4.jpg');">
            <br><br>
            <div class="w3-center w3-text-white">
                <h3 style="font-weight: 600;">Bike sales and hire system</h3>
                <p>Experience the ease in the sales and hire. Time management increased by 50%</p>
                <button class="w3-button w3-border w3-blue w3-round-large">Get Started</button>

            </div>

        </div>
        <div class="mySlides w3-animate-opacity" style="width:100%; height: 400px; animation-duration: 5s; background-size: cover; background-position: center; background-image: url('./images/assets/3.jpg');">
            <br><br>
            <div class="w3-center w3-text-white">
                <h3 style="font-weight: 600;">Bike sales and hire system</h3>
                <p>Experience the ease in the sales and hire. Time management increased by 50%</p>
                <button class="w3-button w3-border w3-blue w3-round-large">Get Started</button>

            </div>
        </div>
        <div class="mySlides w3-animate-opacity" style="width:100%; height: 400px; animation-duration: 5s; background-size: cover; background-position: center; background-image: url('./images/assets/2.jpg');">
            <br><br>
            <div class="w3-center w3-text-white">
                <h3 style="font-weight: 600;">Bike sales and hire system</h3>
                <p>Experience the ease in the sales and hire. Time management increased by 50%</p>
                <button class="w3-button w3-border w3-blue w3-round-large">Get Started</button>

            </div>
        </div>
        <div class="mySlides w3-animate-opacity" style="width:100%; height: 400px; animation-duration: 5s; background-size: cover; background-position: center; background-image: url('./images/assets/1.jpg');">
            <br><br>
            <div class="w3-center w3-text-white">
                <h3 style="font-weight: 600;">Bike sales and hire system</h3>
                <p>Experience the ease in the sales and hire. Time management increased by 50%</p>
                <button class="w3-button w3-border w3-blue w3-round-large">Get Started</button>

            </div>
        </div>
    </div><br>
    <div class="w3-auto">
        <h4><b>OUR CLIENTS</b></h4>
        <hr>
        <div class="w3-row-padding w3-stretch">
            <div class="w3-col l4">
                <div class="w3-card">
                    <div style="background-image: url('./images/assets/card1.png'); height: 150px; background-position: center; background-size:contain; background-repeat: no-repeat;"></div>
                    <div class="w3-center">
                    </div>
                </div>

            </div>
            <div class="w3-col l4">
                <div class="w3-card">
                    <div style="background-image: url('./images/assets/card2.png'); height: 150px; background-position: center; background-size:contain; background-repeat: no-repeat;"></div>
                    <div class="w3-center">

                    </div>
                </div>

            </div>
            <div class="w3-col l4">
                <div class="w3-card">
                    <div style="background-image: url('./images/assets/card3.png'); height: 150px; background-position: center; background-size:contain; background-repeat: no-repeat;"></div>
                    <div class="w3-center">
                    </div>
                </div>

            </div>


        </div>
    </div>
    <br>
    <div class="w3-auto" style="background-color: f3f5fe;">
        <h4 class="w3-large"><b>ABOUT US</b></h4>
        <hr>
        <div class="w3-row-padding w3-stretch">
            <div class="w3-col l6">
                <img src="./images/assets/2.jpg" style="width: 100%;" alt="">

            </div>
            <div class="w3-col l6 w3-padding">
                <h4>Lorem Ipsum</h4>
                <hr>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est, tempore exercitationem! Ipsa ducimus ut voluptatibus dicta, ex fugiat libero dolore soluta magni quos tempora! Ducimus consequuntur magni ullam rem eius?
            </div>
        </div>

    </div><br><br>
    <div class="w3-container w3-padding w3-grey">
        <div class="w3-center">&copy; Bike Hiring system</div>
    </div>



    <script src="./js/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1;
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 5000); // Change image every 2 seconds
        }
    </script>

</body>

</html>