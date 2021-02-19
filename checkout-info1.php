<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/checkout.css" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
    }
    ?>

    <!-- <h2>Responsive Checkout Form</h2>
    <p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p> -->
    <div class="row">
        <div class="col-75">

            <div class="container">
                <form method="post" action="checkout-billing.php">

                    <div class="row">
                        <div class="col-50">
                            <h3>Shipping Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="name" placeholder="John M. Doe">

                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">

                            <input type="hidden" id="website" name="website" value="https://www.alchemywebdesigns.com">

                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">

                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001" onchange="zipEntered(this.value)" </div>
                                </div>
                            </div>

                            <!-- <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div> -->

                            <label>
                                <input type="checkbox" checked="checked" name="sameadr"> Billing address same as shipping
                            </label>
                            <input type="submit" value="Continue" class="btn">
                        </div>
                </form>

                <div class="col-25">
                    <!-- <div class="container"> -->

                        <table class="tbl-cart" cellpadding="10" cellspacing="1" id="tbl-cart" border="1" width="300px">

                            <!-- <table id="tbl-info-id" width> -->
                            <tr>
                                <th width="70%">Item</th>
                                <th width="15%">Quantity</th>
                                <th>Price</th>
                            </tr>

                        </table>
                    <!-- </div> -->
                </div>

            </div> <!-- end of container -->


        </div>
    </div>

    <script>
        var parser = new DOMParser();
        var shippingRate = 0;

        function zipEntered(value) {
            // window.alert(value);

        }
        const sendHttpRequest = (method, url, data) => {
            const promise = new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.open(method, url);

                // xhr.responseType = 'json';

                xhr.onload = () => {
                    resolve(xhr.response);
                };
                xhr.send(data);
            });
            return promise;
        };


        function getShipping() {

            var zipField = document.getElementById('zip');
            var zipcode = zipField.value;

            const xmlRequest = '<xml version="1.0"?>' +
                '<RateV4Request USERID="981ALCHE4825">' +
                '<Revision>2</Revision>' +
                '<Package ID="0">' +
                '<Service>PRIORITY</Service>' +
                '<ZipOrigination>04544</ZipOrigination>' +
                '<ZipDestination>' + zipcode + '</ZipDestination>' +
                '<Pounds>0</Pounds>' +
                '<Ounces>' + totalWt + '</Ounces>' +
                '<Container></Container>' +
                '<Width></Width>' +
                '<Length></Length>' +
                '<Height></Height>' +
                '<Girth></Girth>' +
                '<Machinable>TRUE</Machinable>' +
                '</Package>' +
                // '<Package ID="1">' +
                // '<Service>USPS RETAIL GROUND</Service>' +
                // '<ZipOrigination>04544</ZipOrigination>' +
                // '<ZipDestination>93060</ZipDestination>' +
                // '<Pounds>50</Pounds>' +
                // '<Ounces>8</Ounces>' +
                // '<Container></Container>' +
                // '<Width></Width>' +
                // '<Length></Length>' +
                // '<Height></Height>' +
                // '<Girth></Girth>' +
                // '<Machinable>TRUE</Machinable>' +
                // '</Package>' +
                '</RateV4Request>';


            var xmlDoc;

            url = "https://secure.shippingapis.com/ShippingAPI.dll?API=RateV4&XML=" + xmlRequest;

            sendHttpRequest('GET', url).then(responseData => {
                console.log(responseData);
                xmlDoc = parser.parseFromString(responseData, "text/xml");
                shippingRate = xmlDoc.getElementsByTagName("Package")[0].childNodes[6].childNodes[1].innerHTML;
                console.log("Rate = " + shippingRate);

                var table = document.getElementsByClassName("tbl-cart");
                var t = table[0];
                t.rows[numItems].cells[2].innerHTML = shippingRate;

            });

        }

        function outputCart(table, rowNum, name, size, quant, price) {
            var row = table.insertRow(rowNum);
            var nameCell = row.insertCell(0);
            nameCell.innerHTML = sessionStorage.getItem("row" + rowNum + "_name");

            // var sizeCell = row.insertCell(1);
            var itemSize = sessionStorage.getItem("row" + rowNum + "_size");

            var quantCell = row.insertCell(1);
            var quantity = sessionStorage.getItem("row" + rowNum + "_quantity");
            quantCell.innerHTML = quantity;
            totalWt += quantity * itemSize;

            var priceCell = row.insertCell(2);
            priceCell.innerHTML = sessionStorage.getItem("row" + rowNum + "_price");

        }

        var numItems = parseInt(sessionStorage.getItem("num-items"));
        var totalWt = 0;
        var totalAmt = sessionStorage.getItem("total");
        var shipping = sessionStorage.getItem("shipping");
        if (shipping != null) {
            window.alert("Shipping cost received!");
        }
        numItems += 1;
        var table = document.getElementsByClassName("tbl-cart");
        var t = table[0];
        for (var r = 1; r < numItems; r++) {
            outputCart(t, r);
        }

        var row, cell;
        row = t.insertRow(numItems);
        cell = row.insertCell(0);
        cell.innerHTML = '<button onclick="getShipping()">Get Shipping Price</button>';

        cell = row.insertCell(1);
        cell = row.insertCell(2);
        if (shipping != null) {
            var num = parseFloat(shipping);
            num = num.toFixed(2);
            cell.innerHTML = "$" + num;
        } else {
            cell.innerHTML = "$0.00";
        }

        row = t.insertRow(numItems + 1);
        cell = row.insertCell(0);
        cell.innerHTML = "Total";

        var cell = row.insertCell(1);

        cell = row.insertCell(2);
        cell.innerHTML = totalAmt;
    </script>
</body>

</html>