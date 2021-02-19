<?php
if (!session_id())
    session_start();

$_SESSION['pagename'] = "boards";
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
    require '../includes/globalSiteTag.html';
    ?>
    <title>Slice 'O Country | Quality Maple hardwood cutting boards</title>
    <meta name="description" content="Decorative novelty cutting & cheese boards designed to impress - and entertain!">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/boards.css" media="screen" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Allura|Dancing+Script|Zeyada" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">

</head>

<body>

    <?php
    // require '../includes/header1.php';
    require '../includes/banner.php'
    ?>
    <main>

        <section class="top-section">
            <div class="top-content">

                <div class="boards-heading green-background">CUTTING & CHEESE BOARDS</div>
                <br>
                <div class="boothbay green-background">
                    <div>Made in Boothday&nbsp;Harbor,&nbsp;Maine.</div>
                    <div>Food Safe Finish</div>
                </div>


                <?php
                require '../includes/sarah-info.php'
                ?>
            </div>
        </section>
        </div>
        </div>


        </div>


        <div class="boards1">
            <!-- 1 -->
            <div class="board-block">
                <div class="board-box image">
                    <img src="../images/pig_board2.jpg" alt="Pig shaped cutting board." <?php echo $styleSarah ?>>
                </div>
                <div class="board-box copy">
                    <!-- <div class="logo">Slice O’ Country</div> -->
                    <?php
                    require '../includes/small-logo.php'
                    ?>
                    <div class="name">Classic Pig&nbsp;Board</div>
                    <div class="spacer10"></div>
                    <div class="text">
                        Decorative country pig is made from Hardwood Maple
                        for years of service as a cutting board. Pig can stand on his own
                        two feet for display on a counter and is an attractive serving
                        board for snacks as well. This big guy is 16 x 8 1/2 x 3/4 inches.
                        <br>
                        <div class="price">$35.00 each</div>
                        <div class="spacer10"></div>
                    </div>
                    <div class="button-box">
                        <button class="button" onclick="mailto:SliceOCountry@gmail.com">Order from Sarah</button>
                    </div>
                </div>
            </div>

            <!-- 2 -->
            <div class="board-block">
                <div class="board-box image">
                    <img src="../images/little_pig_board2.jpg" alt="Rounded pig cutting board." <?php echo $styleSarah ?>>
                </div>
                <div class="board-box copy">
                    <?php
                    require '../includes/small-logo.php'
                    ?>
                    <div class="name">Little Piggy Board</div>
                    <div class="spacer10"></div>
                    <div class="text">
                        Little piggy is not just a pretty face! Hardwood Maple
                        Stands up to everyday use and maintains his good looks.
                        In the kitchen or serving up cheese and crackers.
                        This cute guy measures 9 x 7 inches by ¾ inch thick.
                        <div class="spacer10"></div>
                        $35.00
                        <div class="spacer10"></div>
                    </div>
                    <div class="button-box">
                        <button class="button">Order from Sarah</button>
                    </div>
                </div>
            </div>

            <!-- 3 -->
            <div class="board-block">
                <div class="board-box image">
                    <img src="../images/maple_leaf_board2.jpg" alt="Maple leaf shaped cutting board." <?php echo $styleSarah ?>>
                </div>
                <div class="board-box copy">
                    <?php
                    require '../includes/small-logo.php'
                    ?>
                    <div class="name">Maple Leaf Board</div>
                    <div class="spacer10"></div>
                    <div class="text">
                        Maine maple board is a natural way to serve cheese and
                        crackers. Hardwood makes a great surface for slicing
                        in the kitchen too. Finished with hand rubbed
                        mineral oil.
                        Maple wood board measures 15 x 11 1/2 inches
                        And is 3/4 inches thick.
                        <div class="spacer10"></div>
                        $55.00 each </div>
                    <div class="spacer10"></div>
                    <div class="button-box">
                        <button class="button">Order from Sarah</button>
                    </div>
                </div>
            </div>

            <!-- 4 -->
            <div class="board-block">
                <div class="board-box image">
                    <img src="../images/lobster_board2.jpg" alt="Round board with lobster." <?php echo $styleSarah ?>>
                </div>
                <div class="board-box copy">
                    <?php
                    require '../includes/small-logo.php'
                    ?>
                    <div class="name">Maine Lobster Board</div>
                    <div class="spacer10"></div>
                    <div class="text">
                        Nothing says Maine like lobster! Hardwood Maple
                        has a Maine lobster motif burned into it by hand
                        and is finished with hand rubbed mineral oil.
                        14 x 10 1/2 inches by 3/4 inches thick.
                        <div class="spacer10"></div>
                        $45.00 each </div>
                    <div class="spacer10"></div>
                    <div class="button-box">
                        <button class="button">Order from Sarah</button>
                    </div>
                </div>
            </div>

            <!-- 5 -->
            <div class="board-block">
                <div class="image">
                    <img src="../images/apple_board2.jpg" alt="Apple shaped cutting board." <?php echo $styleSarah ?>>
                </div>
                <div class="board-box copy">
                    <?php
                    require '../includes/small-logo.php'
                    ?>
                    <div class="name">Apple Country Board</div><br>
                    <!-- <div class="spacer10"></div> -->
                    <div class="text">
                        Hardwood Maple wood is crafted to celebrate Maine’s
                        fall apple harvest. Cheese and treats from the kitchen look
                        great on this cutting board. Hand rubbed mineral oil
                        finish, Measures 9 1/2 x 9 1/2 inches and is a sturdy
                        3/4 inches thick.<br><br>
                        <!-- <div class="spacer10"></div> -->
                        $25.00 </div>
                    <div class="button-box">
                        <button class="button">Order from Sarah</button>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <?php
    require '../includes/footer1.php'
    ?>

</body>

</html>