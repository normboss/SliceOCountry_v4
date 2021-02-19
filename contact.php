<?php
if (!session_id())
    session_start();
$_SESSION['pagename'] = "contact";
function generateFormToken($form)
{
    // generate a token from an unique value
    $token = md5(uniqid(microtime(), true));
    // Write the generated token to the session variable to check it against the hidden field when the form is sent
    $_SESSION[$form . '_token'] = $token;
    return $token;
}

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>

    <title>Slice 'O Country | Contact Sarah Brewer</title>
    <meta name=="description" content="Get in touch with Sarah for Maine made fruit preserves, jellies, cutting and cheese boards.">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/contact.css" media="screen" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Allura|Dancing+Script|Zeyada" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            pretty();
            document.getElementById("contact-form").submit();
        }
    </script>



</head>

<body>

    <?php
    require './includes/banner.php';
    ?>
    <main>
        <!-- <div class="heading">A Taste of Home and a Touch&nbsp;of&nbsp;Country</div> -->

        <div class="contact-heading">Contact Sarah</div>
        <img class="sarah-round" src="./images/sarah_circle.png" alt="Sarah Brewer owner of Slice o' Country.">

        <div class="contact-container">
            <!-- <br> -->
            <div class="magic-block">
            <?php
                // require './includes/sarah-info.php'
                ?>

            </div>



            <div class="form-container">
                <?php
                // generate a new token for the $_SESSION superglobal and put them in a hidden field
                $newToken = generateFormToken('form1');
                ?>

                <form id="contact-form" action="thankyou.html" class="contactform" method="post" name="contactform">
                    <label for="name">YOUR NAME</label>
                    <input maxlength="80" name="name" size="30" type="text">
                    <input type="hidden" name="token" value="<?php echo $newToken; ?>">
                    <label for="email">Your Email</label>
                    <input maxlength="80" name="email" size="30" type="text">
                    <label for="message">Leave us a note and we’ll get back to you!</label>
                    <textarea cols="30" maxlength="1000" name="message" rows="5"></textarea><br>
                    <!-- <input class="submit" type="submit" value="Submit »"> -->
                    <button class="g-recaptcha submit" data-sitekey="6Ld82v0UAAAAAIUG_P-YM0zTf9eoRCGEC3WTcf8N" data-callback='onSubmit'>Send</button><br>
                </form>


            </div>


        </div>
    </main>

    <?php
    require './includes/footer1.php'
    ?>
    <script>
        function pretty() {
            $("#contact-form").attr("action", "misc.php");
        }
    </script>


</body>

</html>