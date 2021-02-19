<?php
if (!session_id())
    session_start();
$_SESSION['pagename'] = "index";
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
    ?>
    <!-- <title>Slice 'O Country | Homemade jams, preserves & cutting boards</title> -->
    <title>Homemade Jams, Prserves and Pickles | Slice 'O Country </title>
    <meta name="description" content="Homemade jams, preserves and pickles made from the freshest ingredients. A tast of home and touch of country.">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/index.css" media="screen" rel="stylesheet" type="text/css">
    <!--<link href=".files/fonts/Wizards Magic.ttf" rel="stylesheet">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Allura|Dancing+Script|Zeyada" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">

</head>

<body>

    <?php
    require './includes/banner.php';
    ?>
    <main>

        <div class="content">
            <div class="inner-box">
                <div class="box box0">
                    <!-- box0 -->
                </div>

                <h1 class="box box1">
                    <div class="tag-line">
                        <!-- <span>A&nbsp;Taste&nbsp;of&nbsp;Home </span>
                        <span>and&nbsp;a </span>
                        <span>Touch&nbsp;of&nbsp;Country</span> -->

                        A Taste of Home and a Touch&nbsp;of&nbsp;Country
                        
                    </div>
                </h1>

                <div class="box box2">
                    <img src="./images/products.png" alt="Cutting board and jars of jam." <?php echo $styleSarah; ?>>
                </div>

                <div class="box box21">
                    <div class="outside-box">
                        <div class="inside-box">
                            Local<br>Specials
                        </div>
                    </div>
                </div>
                <div class="box box3">
                    <img src="./images/sarah_circle.png" alt="Sarah Brewer owner of Slice o' Country." <?php echo $styleSarah; ?>>
                    <div class="box32">
                        <div class="small">Sarah Brewer, </div>
                        <div class="small">certified home&nbsp;processor</div>
                    </div>
                </div>
                <div class="box box31">
                    <img src="./images/sarah_circle.png" alt="Sarah Brewer" <?php echo $styleSarah; ?>>
                    <div class="box32">
                        <div class="small">Sarah Brewer, </div>
                        <div class="small">certified home&nbsp;processor</div>
                    </div>
                    <div class="spacer20"></div>
                </div>
                <div class="box box4">
                    <div>Wild Gathered and Farm&nbsp;Fresh Ingredients&nbsp;are&nbsp;My&nbsp;Secret.</div>
                    <!-- <div class="small">Sarah Brewer, certified home processor</div> -->
                </div>
                <!-- <div class="box box5">
                    <div class="small">Sarah Brewer, </div>
                    <div class="small">certified home&nbsp;processor</div>
                </div> -->
            </div>
        </div>

        <!-- Lower content -->

        <div class="links">
            <div class="link-block">
                <a href="jams.php">
                    <img src="./images/jamsa.jpg" alt="">
                    <h2>Jams & Preserves</h2>
                </a>
            </div>
            <div class="link-block">
                <a href="pickles.php">
                    <img src="./images/pickles_group3.png" alt="">
                    <h2>Pickles & Condiments</h2>
                </a>
            </div>
        </div>

        <div class="content-lower">
            <div class="spacer10"></div>
            <div class="box-lower visit">
                <div class="heading">
                    Visit Sarah!
                </div>
                <br>

                <div>
                    Sarah offers seasonal specials & baked goods at festivals and holiday events!
                    <br><br>

                    Follow her on Facebook
                    <a href="https://www.facebook.com/Slice-O-Country-2291668391082762/">
                        <img src="./images/facebook_2.png" alt="FB" style="width: 25px">
                    </a>
                    <div class="fix357">&nbsp;and Twitter</div>
                    <a href="https://twitter.com/country_o">
                        <img id="twitter-image" src="./images/twitter-small-cropped.png" alt="Twitter">
                    </a>
                    for updates!
                    <br><br>

                    <div class="visit-links">
                        <!-- Slice O’Country  -->
                        <?php
                        require './includes/small-logo.php'
                        ?>

                        products are available at these shops:
                        <br>
                        <a class="visit-link" href="https://www.woodsongmarket.com/">Woodsong Market</a> 25&nbsp;Route 1, Edgecomb,
                        <br>
                        <a class="visit-link" href="https://www.coastalmainepopcorn.com">Coastal Maine Popcorn Co.</a> Boothbay&nbsp;Harbor
                        <br>
                        and seasonally at 
                        <a class="visit-link" href="https://www.happycow.net/reviews/browns-farm-stand-boothbay-harbor-94233">
                            Browns Farm Stand</a> Boothbay&nbsp;Harbor
                    </div>
                </div>

                <br>

            </div>
        </div>
    </main>
    <div class="spacer20"></div>

    <?php
    require './includes/footer1.php'
    ?>

</body>

</html>