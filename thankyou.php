<?php
if (!session_id())
    session_start();
$_SESSION['pagename'] = "about";
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
<?php
    require './includes/globalSiteTag.html';
    // require 'files/includes/keywords.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/thankyou.css" media="screen" rel="stylesheet" type="text/css">
    <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
    <!--<link href=".files/fonts/Wizards Magic.ttf" rel="stylesheet">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Allura|Dancing+Script|Zeyada" rel="stylesheet">
    <!--<link rel="icon" href="./images/Image7.gif">-->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">

    <script>
        function normEmailFunction() {
            var email = document.getElementById("norm-email-input");
            emailFunction(email);
        }

        function janeEmailFunction() {
            var email = document.getElementById("jane-email-input");
            emailFunction(email);
        }

        function emailFunction(node) {
            node.select();
            node.setSelectionRange(0, 99999)
            document.execCommand("copy");
            // alert("Email copied to clipboard" + email.value);
            alert("Email copied to clipboard");
        }
    </script>

</head>

<body>

    <?php
    require './includes/banner.php';
    $altStyle = 'style="text-align: center; display: block; font-size: 24px; 
                font-style: italic; font-family: Arial; font-weight: normal; text-decoration: none; color: black;"';
    ?>
    <main>

        <div class="about">
            <div class="box box1">
                <div class="heading">
                    Thank You For Contacting Us!
                </div>
                <div class="spacer20"></div>
                <div class="text">
                    We will be getting back to you promptly.
                </div>
            </div>
            <div class="box box3">
                <!-- Put the Magic of the&nbsp;web to&nbsp;work
                <div class="spacer20"></div>
                Contact Us. -->
                <?php
                // require './includes/magic1.php';
                ?>
            </div>

        </div>
        </div>
    </main>

    <?php require './includes/footer1.php' ?>

</body>

</html>