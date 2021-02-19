<?php
if (!session_id())
    session_start();
$_SESSION['pagename'] = "jams";
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
    <title>Slice 'Small Batch Jams & Preserves | Slice O' Country'</title>
    <meta name="description" content="Small Batch Jams & Preserves made from locally gathered blueberries, raspberries, strawberries & rhubarb. Available in 3 sizes. ">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/jams.css" media="screen" rel="stylesheet" type="text/css">
    <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Allura|Dancing+Script|Zeyada" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">

    <?php
        function genAdd2CartForm( $baseCode, $ext1, $ext2, $ext3 )
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
                    echo '<button type="button" class="btn cancel" onclick="closeAdd2CartForm' . $baseCode . '()">Cancel</button>';
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

                <h1 class="top-box tag-line1">
                    <span>A&nbsp;Taste&nbsp;of&nbsp;Home </span>
                    <span>and&nbsp;a </span>
                    <span>Touch&nbsp;of&nbsp;Country</span>
                    <div class="spacer20"></div>
                </h1>

                <div class="top-box jams-heading">
                    <div class="jams-heading__text">JAMS & PRESERVES</div>
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

        <div class="middle-section">
            <h2>Available in three sizes:</h2>

            <div class="middle-box">
                <div class="jar-size">
                    <!-- small -->
                    <img src="./images/rhubarb.jpg" alt="1 & 1/2 oz jar.">
                    <div class="spec-text">1.5 ounces</div>
                    <div class="spec-text">$3.50</div>
                </div>
                <div class="jar-size">
                    <!-- medium -->
                    <img src="./images/raspberry_4oz1.jpg" alt="4 oz jar.">
                    <div class="spec-text">4 ounces</div>
                    <div class="spec-text">$5.00</div>
                </div>
                <div class="jar-size">
                    <!-- large -->
                    <img src="./images/straw_rhubard_8oz1b.jpg" alt="8 ounce jar">
                    <div class="spec-text">8 ounces</div>
                    <div class="spec-text">$8.75</div>
                </div>
            </div>
        </div>

        <div class="jams1">

            <!-- 1 -->
            <div class="jam-block">
                <div class="jam-box image">
                    <img src="./images/blueberry.jpg" alt="Jar of wild Maine blueberry&nbsp;jam." <?php echo $styleSarah ?>>
                </div>
                <div class="jam-box1 jam-copy">
                    <?php
                    require './includes/small-logo.php'
                    ?>
                    <div class="name">Wild Maine Blueberry Jam</div>
                    <div class="text">
                        Wild Maine berries gathered locally and gently processed in
                        small batches make my blueberry spread delicious.
                        Great for perking up that morning toast or drizzled on top
                        of vanilla ice cream for a sweet finish to the day.
                        <br>
                    </div>
                    <div class="spacer10"></div>
                    <div class="spacer10"></div>

                    <?php genAdd2CartForm("JamWildMaineBlueberry", "1_5", "4", "8"); ?>

                </div>
            </div>


            <!-- 2 -->
            <div class="jam-block">
                <div class="image">
                    <img src="./images/strawberry_8oz.jpg" alt="Jar of farm fresh stawberry jam." <?php echo $styleSarah ?>>
                </div>
                <div class="jam-box1 jam-copy">
                    <?php
                    require './includes/small-logo.php'
                    ?>
                    <div class="name">Farm Fresh Strawberry Jam</div>
                    <div class="text">
                        Farm Fresh strawberries gathered locally and gently processed
                        in small batchs make our delicious jam. Great for bringing
                        the sunshine to morning breakfast or coupled with peanut
                        butter for the best PB&J ever!
                    </div>
                    <div class="spacer10"></div>
                    <div class="spacer10"></div>

                    <?php genAdd2CartForm("JamFarmFreshStrawberry", "1_5", "4", "8"); ?>

                </div>
            </div>

            <!-- 3 -->
            <div class="jam-block">
                <div class="jam-box image">
                    <img src="./images/raspberry.png" alt="Jar of wild Maine raspberry jam." <?php echo $styleSarah ?>>
                </div>
                <div class="jam-box1 jam-copy">
                    <?php
                    require './includes/small-logo.php'
                    ?>
                    <div class="name">Wild Maine Raspberry Jam</div>
                    <div class="text">
                        Wild Maine Raspberry Jam Wild Maine
                        berries gathered locally and gently processed in small
                        batches make our beautiful red jam. Pure country summer in a jar!
                        <div class="spacer10"></div>
                        <div class="spacer10"></div>
                        <!-- <div class="button-box">
                            <button class="button">Order from Sarah</button>
                        </div> -->
                    </div>

                    <?php genAdd2CartForm("JamWildMaineRaspberry", "1_5", "4", "8"); ?>

                </div>
            </div>


            <!-- 4 -->
            <div class="jam-block">
                <div class="jam-box image">
                    <img src="./images/rhubarb_8oz.jpg" alt="Jar of heirloom rhubarb jam." <?php echo $styleSarah ?>>
                </div>
                <div class="jam-box1 jam-copy">
                    <?php
                    require './includes/small-logo.php'
                    ?>
                    <div class="name">Heirloom Rhubarb Jam</div>
                    <div class="text">
                        Harvested from the 200 year old family
                        Rhubarb patch and cooked up in my own kitchen
                        this jam has been my family favorite for generations.
                        Sure to please!
                        <div class="spacer10"></div>
                        <div class="spacer10"></div>
                        <!-- <div class="button-box">
                            <button class="button">Order from Sarah</button>
                        </div> -->
                    </div>

                    <?php genAdd2CartForm("JamHeirloomRhubarb", "1_5", "4", "8"); ?>

                </div>
            </div>


            <!-- 5 -->
            <div class="jam-block">
                <div class="jam-box image">
                    <img src="./images/strawrhubard300.jpg" alt="Jar of strawberry rhubarb jam." <?php echo $styleSarah ?>>
                </div>
                <div class="jam-box1 jam-copy">

                    <?php
                    require './includes/small-logo.php'
                    ?>
                    <div class="name">Strawberry Rhubarb Jam</div>
                    <div class="text">
                        The merging of to two great flavors: Heirloom Rhubarb
                        and Farm Fresh Strawberries produces a taste that
                        brings back fond memories of grandma’s kitchen.
                        <div class="spacer10"></div>
                        <!-- <div class="button-box">
                            <button class="button">Order from Sarah</button>
                        </div> -->
                        <div class="spacer10"></div>
                    </div>
                    <?php genAdd2CartForm("JamStrawberryRhubarb", "1_5", "4", "8"); ?>
                </div>
            </div>


            <!-- 6 -->
            <!-- <div class="jam-block">
                <div class="jam-box image">
                    <img src="./images/pickles1.jpg" alt="Jars of Slice O Country pickles." <?php echo $styleSarah ?>>
                </div>
                <div class="jam-box1 jam-copy">

                    <?php
                    require './includes/small-logo.php'
                    ?>
                    <div class="name">Don’t see what you're looking for?</div>
                    <div class="spacer10"></div>
                    <div class="other-products__text">

                        <div class="text--special">
                            <div class="spacer10"></div>
                            <div>
                                Seasonal Items
                            </div>
                            <div class="spacer10"></div>
                            <div>
                                Local Offerings
                            </div>
                            <div class="spacer10"></div>
                            <div>
                                Custom Orders
                            </div>
                            <div class="spacer10"></div>
                            <br>
                            <div>
                                <div class="button-box">
                                    <button class="button">Email me!</button>
                                </div>
                            </div>
                            <div class="spacer10"></div>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="bottom-block">
                <div>
                    <div class="looking">Don’t see what you are looking for?</div>
                    <!-- <div class="email-me"><a href="mailto:SliceOCountry@gmail.com">Email me!</a></div> -->
                    <a class="email-me" href="contact.php">Email me!</a>
                    <!-- <div>Seasonal Items Local Offerings Custom Orders</div> -->

                    <div class="text--special">
                        <!-- <div class="spacer10"></div> -->
                        <div>
                            Seasonal Items<br>
                            Local Offerings<br>
                            Custom Orders<br>
                        </div>
                        <!-- <br>
                        <div class="button-box">
                            <button class="button">Email me!</button>
                        </div> -->
                    </div>

                </div>
                <img src="./images/pickles.png" alt="">
            </div>



            <div class="spacer30"></div>
    </main>

    <?php
    require './includes/footer1.php'
    ?>

</body>

</html>