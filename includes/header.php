<?php
    if (!session_id())
        session_start();

    // echo $_SESSION['root'];
    ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=<?php echo $_SESSION['root'].'/files/css/header.css' ?> media="screen" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">

</head>

<body>
    <header class="header">
        <div class='elemental-shift'>Elemental Shift</div>
        <?php
            // if ( $_SESSION['pagename'] == "contact" ) {
            //     echo "<div class='elemental-shift'>Contact Kirsten</div>";
            // } else {
            //     echo "<div class='elemental-shift'>Elemental Shift</div>";
            // }
        ?>

        <nav>
            <div class="wide-menu">
                <ul>
                    <li><a href=<?php echo $_SESSION['root'].'/index.php' ?>>Home</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn">Services</a>
                        <div class="dropdown-content">
                            <a href=<?php echo $_SESSION['root'].'/files/php/counsel.php' ?>>Counseling</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/psychk.php' ?>>PSYCH-K</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/chakra.php' ?>>Chakra Clearing & Balancing</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/reiki.php' ?>>Reiki</a>
                            </div>
                    </li>
                    <li><a href=<?php echo $_SESSION['root'].'/files/php/about.php' ?>>About</a></li>
                    <li><a href=<?php echo $_SESSION['root'].'/files/php/contact.php' ?> target="_blank">Contact</a></li>
                </ul>
            </div>

            <div class="narrow-menu">
                <ul>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn">
                            <div class="hamburger"></div>
                            <div class="hamburger"></div>
                            <div class="hamburger"></div>
                        </a>
                        <div class="dropdown-content">
                            <a href=<?php echo $_SESSION['root'].'/index.php' ?>>Home</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/counsel.php' ?>>Counseling</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/psychk.php' ?>>PSYCH-K</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/chakra.php' ?>>Chakra Clearing & Balancing</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/reiki.php' ?>>Reiki</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/about.php' ?>>About</a>
                            <a href=<?php echo $_SESSION['root'].'/files/php/contact.php' ?> target="_blank">Contact</a>
                        </div>
                    </li>
                </ul>

                <!--                        <div class="topnav">
                                                <a href="#home" class="active">Logo</a>
                                                 Navigation links (hidden by default) 
                                                <div id="myLinks">
                                                    <a href="#news">News</a>
                                                    <a href="#contact">Contact</a>
                                                    <a href="#about">About</a>
                                                </div>
                                                 "Hamburger menu" / "Bar icon" to toggle the navigation links 
                                                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                                                    <i class="fa fa-bars"></i>
                                                </a>
                                            </div>-->
            </div>

        </nav>


    </header>

    <script>
        /* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
        function myFunction() {
            var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>


</body>

</html>