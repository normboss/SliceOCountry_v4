<footer class="foot">
    <div class="foot-box foot__text">
        <?php
        require 'footer-logo.php';
        ?>

    </div>

    <div class="foot-box email stuff3">
        <a href="contact.php" title="SliceOCountry@gmail.com">SliceOCountry@gmail.com</a>
    </div>

    <div class="foot-box phone stuff4">
        <span>207-350-5275</span>
    </div>

    <div class="foot-box stuff-facebook">
        <span class="facebook-text">
            Follow me:&nbsp;&nbsp;
        </span>

        <a href="https://twitter.com/country_o">
            <img src="images/Twitter-logo.svg" alt="Twitter">
        </a>

        <a href="https://www.facebook.com/Slice-O-Country-2291668391082762/">
            <img src="images/facebook-scaled2.png" alt="FB">
        </a>
    </div>

    <!-- <div class="foot-box stuff-facebook">
        <span class="facebook-text">
            Like me on Facebook.
        </span>

        <a href="https://www.facebook.com/Slice-O-Country-2291668391082762/">
            <img src="../images/facebook.png" alt="FB">
        </a>
    </div> -->

    <div class="foot-box alchemy">
        <a href="https://www.alchemywebdesigns.com">
            <div>
                <span class="credit-brand footer-box">Alchemy</span><span class="credit-name"> Web Designs.com</span>
            </div>

            <div class="credit-tagline footer-box">
                Making magic on the web
            </div>
        </a>
    </div>

</footer>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>

<script>
    window.onorientationchange = function() {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    };

    $(document).ready(function() {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);

        $(window).resize(handleResize);
        handleResize();

        // $(window).resize(function() {
        function handleResize() {
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        }
    });
</script>

<script>
    function incrementQty(rowNum) {
        var qtyElement = document.getElementById(rowNum + "_quantity");
        var quantity = parseFloat(qtyElement.value);
        quantity = quantity + parseFloat("1.0");
        qtyElement.value = quantity.toFixed(0);
        sessionStorage.setItem(rowNum + '_quantity', quantity);

        // var price = sessionStorage.getItem(rowNum+'_price');
        // var totalPrice = parseFloat(price) * parseFloat(quantity);
        // sessionStorage.setItem(rowNum+'_total-price', totalPrice.toFixed(2));
        // var totalPriceElement = document.getElementById(rowNum + "_total-price");
        // totalPriceElement.value = totalPrice.toFixed(2);

        location.reload();
    }

    function decrementQty(rowNum) {
        var qtyElement = document.getElementById(rowNum + "_quantity");
        var quantity = parseFloat(qtyElement.value);
        quantity = quantity - parseFloat("1.0");
        qtyElement.value = quantity.toFixed(0);
        if (quantity == 0) {
            removeItem(rowNum);
        }
        sessionStorage.setItem(rowNum + '_quantity', quantity);
        location.reload();
    }


    var elements = document.getElementsByClassName("button");
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', buttonHandler, false);
    }

    function buttonHandler() {
        // window.open("mailto:SliceOCountry@gmail.com");
        // window.location.href = "contact.php";
    };

    function openAdd2CartForm() {
        document.getElementById("add2cart-form").style.display = "block";
    }

    function closeAdd2CartForm() {
        document.getElementById("add2cart-form").style.display = "none";
    }

    // document.getElementById("add2cart-form' . $code . '").style.display = "none";
    var forms = document.getElementsByClassName("add2cart-popup");
    if (forms != null) {
        for (var i = 0; i < forms.length; i++) {
            var f = forms[0];
            f.style.display = "none";
        }
    }

    function add2Cart(name, code, image, size, price) {
        // alert("add2Cart( " + name +", "+ code+", "+image +", "+ size+", "+price+" );");
        var total;
        var quantity;
        var size;
        var itemNum = 0;
        var firstEntry = false; // 

        var numItems = sessionStorage.getItem("num-items");
        if (numItems == null) {
            firstEntry = true;
            numItems = 1;
            itemNum = numItems;
        }
        // else {
        //     itemNum = parseFloat(numItems)+parseFloat("1");
        // }
        quantity = document.getElementById(code + '_quantity-id').value;
        var sizeElement = document.getElementById(code + '-size-id');
        if ( sizeElement != null ) {
            size = sizeElement.value;
        }
        if (quantity <= 0) {
            return;
        }
        if (size == 1.5) {
            price = 3.50;
        } else if (size == 4.0) {
            price = 5.00;
        } else {
            price = 8.75;
        }

        for (var i = 1; i <= numItems; i++) {
            var c = sessionStorage.getItem(i + "_code");
            var s = sessionStorage.getItem(i + "_size");
            if (c == code && s == size) {
                var q = sessionStorage.getItem(i + "_quantity");
                q = parseFloat(q);
                quantity = parseFloat(quantity) + q;
                total = quantity * price;
                sessionStorage.setItem(i + '_quantity', quantity);
                sessionStorage.setItem(i + '_total', total);
                window.location.href = "shopping-cart-js-mobile2.php";
                return;
            }
        }

        total = quantity * price;
        itemNum = parseFloat(numItems);
        if (!firstEntry) {
            itemNum = parseFloat(numItems) + parseFloat("1");
        }

        sessionStorage.setItem(itemNum + '_name', name);
        sessionStorage.setItem(itemNum + '_code', code);
        sessionStorage.setItem(itemNum + '_image', image);
        sessionStorage.setItem(itemNum + '_size', size);
        sessionStorage.setItem(itemNum + '_price', price);
        sessionStorage.setItem(itemNum + '_quantity', quantity);
        sessionStorage.setItem(itemNum + '_total', total);

        sessionStorage.setItem('num-items', itemNum);
        window.location.href = "shopping-cart-js-mobile2.php";

    }
</script>