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

    <link href="./css/pickles.css" media="screen" rel="stylesheet" type="text/css">
    <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Allura|Dancing+Script|Zeyada" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">

    <?php

    //function pickleBlockOld($image, $title, $trad, $copy, $code)
    // {
    //     echo '<div class="pickle-block">'."\n";
    //         echo '<div class="jam-box image">'."\n";
    //             echo '<img src="./images/' . $image . '" alt="">'."\n";
    //         echo '</div>'."\n";
    //         echo '<div class="pickle-box1 pickle-copy">'."\n";
    //             require './includes/small-logo.php';
    //             echo '<div class="traditional">' . $trad . '</div>'."\n";
    //             echo '<div class="name">'."\n";
    //                 echo $title . "\n";
    //             echo '</div>'."\n";
    //             echo '<div class="text">'."\n";
    //                 echo $copy."\n";
    //             echo '</div>'."\n";

    //             echo '<div class="button-box">'."\n";
    //                 echo '<div class="text text-centered">8 ounce jar $7.45</div>'."\n";
    //                 echo '<button class="button" onclick="openAdd2CartForm' . $code . '()">Order from Sarah</button>'."\n";
    //             echo '</div>'."\n";

    //             echo '<div class="add2cart-popup" id="add2cart-form' . $code . '">'."\n";
    //                 echo '<form id="form-add2cart-form' . $code . '" method="post" action="pre-shopping-cart.php?action=add" class="form-container">'."\n";
    //                     echo '<label for="quantity">Quantity</label>'."\n";
    //                     echo '<input type="number" id="quantity" min="1" value="1" name="quantity">'."\n";
    //                     echo '<input type="hidden" id="code" value="' . $code . '" name="code">'."\n";
    //                     echo '<br>'."\n";
    //                     echo '<br><br>'."\n";
    //                     // echo '<button type="submit" class="btn">Add to Cart</button>';
    //                     echo '<button type="button" class="btn cancel" onclick="Add2Cart' . $code . '()">Add to Cart</button>'."\n";
    //                     echo '<br><br>'."\n";
    //                     echo '<button type="button" class="btn cancel" onclick="closeAdd2CartForm' . $code . '()">Cancel</button>'."\n";
    //                 echo '</form>'."\n";
    //             echo '</div>';        

    //                 echo '<script>'."\n";

    //                 echo 'function Add2Cart' . $code . '(token) {'."\n";
    //                     echo 'document.getElementById("add2cart-form' . $code . '").style.display = "none";'."\n";
    //                     echo 'document.getElementById("form-add2cart-form' . $code . '").submit();'."\n";
    //                     echo '}'."\n";
            
    //                 echo 'function openAdd2CartForm' . $code . '() {'."\n";
    //                 echo 'document.getElementById("add2cart-form' . $code . '").style.display = "block";'."\n";
    //                 echo '}'."\n";

    //                 echo 'function closeAdd2CartForm' . $code . '() {'."\n";
    //                 echo 'document.getElementById("add2cart-form' . $code . '").style.display = "none";'."\n";
    //                 echo '}'."\n";
    //                 echo '</script>'."\n";

    //         echo '</div>'."\n";
    //     echo '</div>'."\n";
    // }

    function pickleBlock($image, $title, $trad, $copy, $code)
    {
        echo '<div class="pickle-block">'."\n";
            echo '<div class="jam-box image">'."\n";
                echo '<img src="./images/' . $image . '" alt="">'."\n";
            echo '</div>'."\n";
            echo '<div class="pickle-box1 pickle-copy">'."\n";
                require './includes/small-logo.php';
                echo '<div class="traditional">' . $trad . '</div>'."\n";
                echo '<div class="name">'."\n";
                    echo $title . "\n";
                echo '</div>'."\n";
                echo '<div class="text">'."\n";
                    echo $copy."\n";
                echo '</div>'."\n";

                echo '<div class="button-box">'."\n";
                    echo '<div class="text text-centered">8 ounce jar $7.45</div>'."\n";
                    echo '<button class="button" onclick="openAdd2CartForm' . $code . '()">Order from Sarah</button>'."\n";
                echo '</div>'."\n";

                echo '<div class="add2cart-popup" id="add2cart-form' . $code . '">'."\n";
                    echo '<div class="form-container">'."\n";
                    // echo '<form id="form-add2cart-form' . $code . '" method="post" action="pre-shopping-cart.php?action=add" class="form-container">'."\n";
                        // echo '<input type="number" id="'.$code.'_quantity" min="1" value="1" name="quantity">'."\n";

                        echo '<div class="qty-block">'."\n";
                            echo '<label for="quantity">Quantity</label>'."\n";
                            echo '<div>'."\n";
                                echo '<div class="plus-minus-block">'."\n";
                                    echo '<button onclick="decrementQty' . $code . '()">-</button>'."\n";
                                echo '</div>'."\n";
                                echo '<div class="qty-input-block">'."\n";
                                    echo '<input type="text" id="'.$code.'_quantity-id" value="1" readonly value="0" size=1 name="quantity">'."\n";
                                echo '</div>'."\n";
                                echo '<div class="plus-minus-block">'."\n";
                                    echo '<button onclick="incrementQty' . $code . '()">+</button>'."\n";
                                echo '</div>'."\n";
                            echo '</div>'."\n";
                        echo '</div>'."\n";


                        echo '<input type="hidden" id="code" value="' . $code . '" name="code">'."\n";
                        echo '<br>'."\n";
                        echo '<br><br>'."\n";
                        echo '<button type="button" class="btn cancel" onclick="Add2Cart' . $code . '()">Add to Cart</button>'."\n";
                        echo '<br><br>'."\n";
                        echo '<button type="button" class="btn cancel" onclick="closeAdd2CartForm' . $code . '()">Cancel</button>'."\n";
                    // echo '</form>'."\n";
                    echo '</div>'."\n";
                echo '</div>';        

                echo '<script>'."\n";

                echo 'function incrementQty' . $code . '() {'."\n";
                    // echo 'alert("increment qty")';
                    echo 'var quantity = parseFloat(document.getElementById("'. $code . '_quantity-id").value);'."\n";
                    echo 'quantity += 1;'."\n";
                    echo 'document.getElementById("'. $code . '_quantity-id").value = quantity.toFixed(0);'."\n";
    
                echo '}'."\n";
    
                echo 'function decrementQty' . $code . '() {'."\n";
                    // echo 'alert("decrement qty")';
                    echo 'var quantity = parseFloat(document.getElementById("'. $code . '_quantity-id").value);'."\n";
                    echo 'if (quantity >= 1) {'."\n";
                        echo 'quantity -= 1;'."\n";
                    echo '}'."\n";
                    echo 'document.getElementById("'. $code . '_quantity-id").value = quantity.toFixed(0);'."\n";
                echo '}'."\n";


                echo 'function Add2Cart' . $code . '(token) {'."\n";
                        echo 'document.getElementById("add2cart-form' . $code . '").style.display = "none";'."\n";
                        $size = 8.00;
                        $price = 7.00;
                        echo 'add2Cart( "'.$title.'", "'.$code.'", "'.$image.'", '.$size.', '.$price.' );'."\n";
                    echo '}'."\n";
            
                    echo 'function openAdd2CartForm' . $code . '() {'."\n";
                        echo 'document.getElementById("add2cart-form' . $code . '").style.display = "block";'."\n";
                    echo '}'."\n";

                    echo 'function closeAdd2CartForm' . $code . '() {'."\n";
                        echo 'document.getElementById("add2cart-form' . $code . '").style.display = "none";'."\n";
                    echo '}'."\n";
                echo '</script>'."\n";

            echo '</div>'."\n";
        echo '</div>'."\n";
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

        echo '<scrip>';
        echo 'function openAdd2CartForm' . $baseCode . '() {';
        echo 'document.getElementById("add2cart-form' . $baseCode . '").style.display = "block";';
        echo '}';

        echo 'function closeAdd2CartForm' . $baseCode . '() {';
        echo 'document.getElementById("add2cart-form' . $baseCode . '").style.display = "none";';
        echo '}';
        echo '</scrip>';
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

    <script>
        // document.getElementById("add2cart-form' . $code . '").style.display = "none";
        var forms = document.getElementsByClassName("add2cart-popup");
        for ( var i=0; i<forms.length; i++ ) {
            var f = forms[0];
            f.style.display = "none";
        }

        // function add2Cart( name, code, image, size, price ) {
        //     // alert("add2Cart( " + name +", "+ code+", "+image +", "+ size+", "+price+" );");
        //     var total;
        //     var quantity;
        //     var itemNum = 0;
        //     var firstEntry = false;  // 

        //     var numItems = sessionStorage.getItem("num-items");
        //     if ( numItems == null ) {
        //         firstEntry = true;
        //         numItems = 1;
        //         itemNum = numItems;
        //     } 
        //     // else {
        //     //     itemNum = parseFloat(numItems)+parseFloat("1");
        //     // }
        //     quantity = document.getElementById(code+'_quantity').value;

        //     for ( var i=1; i<= numItems; i++ ) {
        //         var c = sessionStorage.getItem(i+"_code");
        //         if ( c == code ) {
        //             var q = sessionStorage.getItem(i+"_quantity");
        //             q = parseFloat(q);
        //             quantity = parseFloat(quantity) + q;
        //             total = quantity * price;
        //             sessionStorage.setItem( i+'_quantity', quantity );
        //             sessionStorage.setItem( i+'_total', total );
        //             window.location.href = "shopping-cart-js-mobile2.php";
        //             return;
        //         }
        //     }

        //     total = quantity * price;
        //     itemNum = parseFloat(numItems);
        //     if ( !firstEntry ) {
        //         itemNum = parseFloat(numItems)+parseFloat("1");
        //     }
            
        //     sessionStorage.setItem( itemNum+'_name', name );
        //     sessionStorage.setItem( itemNum+'_code', code );
        //     sessionStorage.setItem( itemNum+'_image', image );
        //     sessionStorage.setItem( itemNum+'_size', size );
        //     sessionStorage.setItem( itemNum+'_price', price );
        //     sessionStorage.setItem( itemNum+'_quantity', quantity );
        //     sessionStorage.setItem( itemNum+'_total', total );

        //     sessionStorage.setItem( 'num-items', itemNum );
        //     window.location.href = "shopping-cart-js-mobile2.php";

        // }


    </script>

</body>

</html>