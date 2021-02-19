<footer class="foot">
    <div class="foot-box foot__text">
        <?php
        require 'footer-logo.php';
        ?>
    </div>
    <div class="foot-box stuff2">
        Personal attention to every order.
    </div>
    <div class="foot-box stuff1">
        SliceOCountry@gmail.com
    </div>

    <div class="foot-box stuff-facebook">
        Like me on Facebook.
        <!-- <a href="https://www.facebook.com/Slice-O-Country-2291668391082762/"> -->
        <?php
        // echo __DIR__;
        if ($_SESSION['pagename'] == "index") {
            echo '<img src="./files/images/facebook.png">';
        } else {
            echo '<img src="../images/facebook.png">';
        }
        ?>
        <!-- </a> -->
    </div>

    <div class="foot-box alchemy">
        <div>
            <span class="credit-brand footer-box">Alchemy</span><span class="credit-name"> Web Designs.com</span>
        </div>

        <div class="credit-tagline footer-box">
            Making magic on the web
        </div>
    </div>

</footer>