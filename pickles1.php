<?php
if (!session_id())
    session_start();
$_SESSION['pagename'] = "pickles";
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
    <title>Slice 'O Country | Sarah Brewer's small batch jams & preserves</title>
    <meta name="description" content="Locally gathered blueberries, raspberries, strawberries & rhubarb transformed to deliciousness! Available in 3 sizes. Seasonal & custom orders available upon request. ">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/pickles0.css" media="screen" rel="stylesheet" type="text/css">
    <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Allura|Dancing+Script|Zeyada" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">

    <?php

    function pickleBlock($image, $title, $trad, $copy, $code)
    {
        echo '<div class="pickle-block">';
            echo '<div class="jam-box image">';
                echo '<img src="./images/' . $image . '" alt="">';
            echo '</div>';
            echo '<div class="pickle-box1 pickle-copy">';
                require './includes/small-logo.php';
                echo '<div class="traditional">' . $trad . '</div>';
                echo '<div class="name">';
                    echo $title;
                echo '</div>';
                echo '<div class="text">';
                    echo $copy;
                echo '</div>';

                echo '<div class="button-box">';
                    echo '<div class="text text-centered">8 ounce jar $7</div>';
                    echo '<button class="button" onclick="openAdd2CartForm' . $code . '()">Order from Sarah</button>';
                echo '</div>';

            echo '</div>';
        echo '</div>';
    }


    function genAdd2CartForm($baseCode, $ext1, $ext2, $ext3)
    {
        echo '<div class="button-box">';
        echo '<button class="button" onclick="openAdd2CartForm' . $baseCode . '()">Order from Sarah</button>';
        echo '</div>';

        echo '<div class="add2cart-popup" id="add2cart-form' . $baseCode . '">';
        echo '<form method="post" action="shopping-cart.php?action=add" class="form-container">';
        echo '<label for="quantity">Quantity</label>';
        echo '<input type="number" id="quantity" min="1" value="1" name="quantity">';
        echo '<br>';
        echo '<label for="code">Select Size</label>';
        echo '<select name="code" id="code-id">';
        echo '<option value="' . $baseCode . $ext1 . '">1.5 ounce</option>';
        echo '<option value="' . $baseCode . $ext2 . '">4.0 ounce</option>';
        echo '<option value="' . $baseCode . $ext3 . '">8.0 ounce</option>';
        echo '</select>';
        echo '<br><br>';
        echo '<button type="submit" class="btn">Add to Cart</button>';
        echo '<br><br>';
        echo '<button type="button" class="btn cancel" onclick="closeAdd2CartForm()">Cancel</button>';
        echo '</form>';
        echo '</div>';

        echo '<script>';
        echo 'function openAdd2CartForm' . $baseCode . '() {';
        echo 'document.getElementById("add2cart-form' . $baseCode . '").style.display = "block";';
        echo '}';

        echo 'function closeAdd2CartForm' . $baseCode . '() {';
        echo 'document.getElementById("add2cart-form' . $baseCode . '").style.display = "none";';
        echo '}';
        echo '</script>';
    }

    ?>
</head>

<body>

    <?php
    require './includes/banner.php';
    ?>

    <main>
        <section class="top-section">

            <div class="top-content">

                <div class="top-box tag-line1">
                    <span>A&nbsp;Taste&nbsp;of&nbsp;Home </span>
                    <span>and&nbsp;a </span>
                    <span>Touch&nbsp;of&nbsp;Country</span>
                    <div class="spacer20"></div>
                </div>

                <div class="top-box pickles-heading">
                    <div class="pickles-heading__text">SPECIALTY PICKLES</div>
                </div>

                <div class="top-box small-batches">
                    <div><span class="boothbay__span">Made in Small Batches</span></div>
                    <div><span class="boothbay__span">Packed with Fresh Picked&nbsp;Flavor</span></div>
                </div>

                <?php
                require './includes/sarah-info.php'
                ?>
            </div>
        </section>


        <div class="pickles">
            <!-- 1 -->

            <?php
            pickleBlock(
                "pickle.png",
                "Bread and Butter Pickles",
                "Traditional",
                "Very flavorful pickles made following an old family recipe for Bread and Butter Pickles.
                These sweet and juicy Bread and Butter Pickles are the tradition on our dinner table.",
                "PickleBreadButter8"
            );
            ?>

            <!-- 2 -->
            <?php
            pickleBlock(
                "sour_pickle.png",
                "Sour Pickles",
                "Award Winning",
                "My mother won awards at local fairs for the most sour pickles using her Grandmother’s Sour Pickle recipe. I follow that same recipe so you can experience these little sour bites of pucker-up fun. Guaranteed to thrill!",
                "PickleSour8"
            );
            ?>

            <!-- 3 -->
            <?php
            pickleBlock(
                "garlic_must_pickle.png",
                "Garlic Mustard Pickles",
                "Traditional",
                "Garlic Mustard Pickles are a robust flavor of garlic with the tang of mustard. Enjoy this flavorful variety with any deli sandwich or some smoked cheese and crackers.",
                "PickleGarlicMustard8"
            );
            ?>

            <!-- 4 -->
            <?php
            pickleBlock(
                "saltgarlic_dill.png",
                "Salted Garlic Dill Pickles",
                "Traditional",
                "Extra salty pickle with robust garlic and fresh dill flavors. These mouthwatering bite size pickles perk up any plate. Try Salted Garlic Dill pickles in fresh chicken salad or garnish a Bloody Mary!",
                "PickleSaltedGarlicDill8"
            );
            ?>

            <!-- 5 -->
            <?php
            pickleBlock(
                "zucchini_pickle_copy.png",
                "Zucchini Pickles",
                "",
                "These have a different texture from pickled cucumbers and add a robust flavor.
            A wonderful garnish for any meal.",
                "PickleZucchini8"
            );
            ?>

            <!-- 5 -->
            <?php
            pickleBlock(
                "sassy_salsa copy.png",
                "Sassy Salsa",
                "",
                "Sweet-N-Sassy Salsa is zucchini based and mildly spicy sweet. My tomato free salsa adds zing to a variety of foods; great as a dip, dressing for salads, in tacos or broiled over swordfish.",
                "SalsaSassy8"
            );
            ?>

            <!-- 6 -->
            <?php
            pickleBlock(
                "beets_greens.png",
                "Pickled Beets",
                "",
                "Thanks to my Great Grandmother who developed this recipe for sweet beets I can
            offer you this treat. Bite size pieces are terrific on sandwiches, salads or as a side dish.",
                "PickleBeets8"
            );
            ?>

            <!-- 7 -->
            <?php
            pickleBlock(
                "zucchini8oz-relish.png",
                "Zucchini Relish",
                "",
                "This is a more flavorful relish than most. My Zucchini Relish is an
            excellent accent for hot dogs, sausage, or a basic burger.",
                "RelishZucchini8"
            );
            ?>

            <!-- 8 -->
            <?php
            pickleBlock(
                "cuke_relish.png",
                "Ripe Cucumber Relish",
                "",
                "Ground ripe cucumbers mixed with my special blend of seasonings produce a
            relish to replace all the other condiments on a burger. Try this colorful relish on a bacon cheeseburger for the perfect flavor. ",
                "RelishRipeCucumber8"
            );
            ?>

            <!-- 9 -->
            <?php
            pickleBlock(
                "apple_sauce.png",
                "Applesauce",
                "",
                "My homemade Applesauce features fresh Red Astrakhan Apples, with just enough sugar & spice for a delicious apple pie flavor.  
            Cooked then grated, it has the perfect texture plus a delightful natural pink color. Children love it!",
                "Applesause8"
            );
            ?>

            <div class="bottom-block">
                <img src="./images/picking.png" alt="">
                <div>
                    <div>Don’t see what you are looking for?</div>
                    <!-- <div class="email-me"><a href="mailto:SliceOCountry@gmail.com">Email me!</a></div> -->
                    <a class="email-me" href="contact.php">Email me!</a>
                    <div>Seasonal Items Local Offerings Custom Orders</div>
                </div>
            </div>

        </div>

    </main>

    <?php
    require './includes/footer1.php'
    ?>

</body>

</html>