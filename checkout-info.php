<?php
if (!session_id())
    session_start();
$_SESSION['pagename'] = "checkout-info";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="css/checkout.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- <h2>Responsive Checkout Form</h2>
    <p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p> -->
    <!-- <div class="row">
        <div class="col-75"> -->

    <?php
    require './includes/banner.php';
    ?>

    <div class="container">
        <form /* method="post" action="checkout-info.php" * />

        <!-- <div class="row"> -->
        <!-- <div class="col-50"> -->
        <h3>Shipping Address</h3>
        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
        <input type="text" id="fname" name="name" placeholder="John M. Doe">

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
                <input type="number" id="zip" name="zip" placeholder="10001" onchange="zipEntered(this.value)" </div>
            </div>
        </div>

        <label for="email"><i class="fa fa-envelope"></i> Email</label>
        <input type="text" id="email" name="email" placeholder="john@example.com">

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
        <input type="submit" value="Continue Check-out" class="btn">
        <!-- </div> -->
        </form>

        <div class="col-25a">
            <!-- <div class="container"> -->

            <table class="tbl-cart1" cellpadding="5" cellspacing="1" id="tbl-cart1" border="1" width="100%">

                <!-- <table id="tbl-info-id" width> -->
                <tr>
                    <th width="70%" align="center">Item</th>
                    <th class="qty-class" width="10%">Qty</th>
                    <th width="10%">Wt</th>
                    <th>Price</th>
                </tr>

                <tr>
                    <td colspan="1" align="left">Shipping: <button onclick="getShipping()">Get Shipping Price</button></td>
                    <!-- <td colspan="1" align="right"></td> -->
                    <td colspan="1" align="right"></td>
                    <td colspan="1" align="right"></td>
                    <td id="shipping-rate" colspan="1" align="right">$0.00</td>
                    <!-- <td align="right" colspan="1"></td> -->
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td colspan="1" align="left">Total:</td>
                    <!-- <td colspan="1" align="right"></td> -->
                    <td colspan="1" align="right"></td>
                    <td colspan="1" align="right"></td>
                    <td id="total-amount" colspan="1" align="right">$0.00</td>
                    <!-- <td align="right" colspan="1"></td> -->
                    <!-- <td></td> -->
                </tr>
            </table>
            <!-- </div> -->
            <br>

            <p class="experimental">The sections below are for experimental&nbsp;purposes.</p>
            <p class="experimental">They will not show up in the finished&nbsp;page.</p>

            <br>
            <h3>Shipping Cost using Priority Boxes</h3>
            <div class="manual-weight-block">
                <div>
                    <label for="weight-field">Weight (ounces)</label>
                    <input type="number" id="weight-field" name="weight-field" placeholder="0">
                </div>
                <div>
                    <label for="zip">Zipcode</label>
                    <input type="number" id="zipcode-field" name="zipcode-field" width="50px">
                </div>
                <div>
                    <label for="cost-field">Cost</label>
                    <input type="text" id="cost-field" name="cost-field" placeholder="0">
                </div>
                <div id="get-wt-button-block">
                    <button id="get-wt-button" onclick="getShippingCustom()">Get Shipping Cost</button>
                </div>

            </div>
            <br>
            <h3>Shipping Cost using any box</h3>
            <a href="https://postcalc.usps.com/?gclid=Cj0KCQiAgomBBhDXARIsAFNyUqM84w4WH5sFKC2eIyR0jL1gz_94nDXU4-mlLh_OeFpOK0UaZ1xPptsaAhzXEALw_wcB&gclsrc=aw.ds" target="_blank">Compare to Post Office Calculator</a>

            <div class="manual-weight-block">
                <div class="manual-weight-inner-block">
                    <div>
                        <label for="weight-field1">Weight (oz.)</label>
                        <input type="number" id="weight-field1" name="weight-field1" placeholder="0">
                    </div>
                    <div>
                        <label for="height-field">Height</label>
                        <input type="number" id="height-field" name="height-field" placeholder="0">
                    </div>
                    <div>
                        <label for="width-field">Width</label>
                        <input type="number" id="width-field" name="width-field" placeholder="0">
                    </div>
                    <div>
                        <label for="length-field">Length</label>
                        <input type="number" id="length-field" name="length-field" placeholder="0">
                    </div>

                </div>
                <div>
                    <label for="cubic-field">Cu. In.</label>
                    <input type="number" id="cubic-field" name="cubic-field" width="50px">
                </div>
                <div>
                    <label for="zip">Zipcode</label>
                    <input type="number" id="zipcode-field1" name="zipcode-field1" width="50px">
                </div>
                <div>
                    <label for="cost-field">Cost</label>
                    <input type="text" id="cost-field1" name="cost-field1" placeholder="$0.0 0">
                </div>
                <div id="get-wt-button-block">
                    <button id="get-wt-button" onclick="getShippingCustom1()">Get Shipping Cost</button>
                </div>
            </div>
        </div>

    </div> <!-- end of container -->


    <!-- </div>
    </div> -->

    <script>
        var parser = new DOMParser();
        var shippingRate = 0;
        var totalWt = 0;
        var zipHasBeenEntered = false;
        var totalAmount;

        function zipEntered(value) {
            // window.alert(value);
            zipHasBeenEntered = true;
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
                // shippingRate = xmlDoc.getElementsByTagName("Package")[0].childNodes[6].childNodes[1].innerHTML;
                var rateNode = xmlDoc.getElementsByTagName("Rate");
                shippingRate = rateNode[0].innerHTML;
                console.log("Rate = " + shippingRate);

                // var table = document.getElementsByClassName("tbl-cart1");
                // var t = table[0];
                // t.rows[numItems].cells[3].innerHTML = "$" + shippingRate;
                shippingRate = parseFloat(shippingRate);
                document.getElementById('shipping-rate').innerHTML = "$"+shippingRate;
                sessionStorage.setItem('shipping-rate', shippingRate);

                var totalAmt = parseFloat(sessionStorage.getItem("total-amount"));
                totalAmt += shippingRate;
                // t.rows[numItems + 1].cells[3].innerHTML = "$" + totalAmt;
                document.getElementById('total-amount').innerHTML = "$"+totalAmt;
                sessionStorage.setItem('total-amount', totalAmt);

            });

        }

        function getShippingCustom() {

            var zipField = document.getElementById('zipcode-field');
            var zipcode = zipField.value;
            if (zipcode == "") {
                return;
            }
            var wtField = document.getElementById('weight-field');
            var weight = wtField.value;

            const xmlRequest = '<xml version="1.0"?>' +
                '<RateV4Request USERID="981ALCHE4825">' +
                '<Revision>2</Revision>' +
                '<Package ID="0">' +
                '<Service>PRIORITY</Service>' +
                '<ZipOrigination>04544</ZipOrigination>' +
                '<ZipDestination>' + zipcode + '</ZipDestination>' +
                '<Pounds>0</Pounds>' +
                '<Ounces>' + weight + '</Ounces>' +
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

                var cost = document.getElementById('cost-field');
                cost.value = "$" + shippingRate;

                // var table = document.getElementsByClassName("tbl-cart1");
                // var t = table[0];
                // t.rows[numItems].cells[2].innerHTML = shippingRate;

            });

        }

        function getShippingCustom1() {

            var zipcode = document.getElementById('zipcode-field1').value;
            if (zipcode == "") {
                alert("Missing zipcode");
                return;
            }
            var weight = document.getElementById('weight-field1').value;
            if (weight == 0) {
                alert("Missing weight");
                return;
            }
            var height = document.getElementById('height-field').value;
            if (height == 0) {
                alert("Missing height");
                return;
            }
            var width = document.getElementById('width-field').value;
            if (width == 0) {
                alert("Missing width");
                return;
            }
            var length = document.getElementById('length-field').value;
            if (length == 0) {
                alert("Missing length");
                return;
            }


            const xmlRequest = '<xml version="1.0"?>' +
                '<RateV4Request USERID="981ALCHE4825">' +
                '<Revision>2</Revision>' +
                '<Package ID="0">' +
                '<Service>PRIORITY</Service>' +
                '<ZipOrigination>04544</ZipOrigination>' +
                '<ZipDestination>' + zipcode + '</ZipDestination>' +
                '<Pounds>0</Pounds>' +
                '<Ounces>' + weight + '</Ounces>' +
                '<Container></Container>' +
                '<Width>' + width + '</Width>' +
                '<Length>' + length + '</Length>' +
                '<Height>' + height + '</Height>' +
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

                var cost = document.getElementById('cost-field1');
                cost.value = "$" + shippingRate;

                var cube = length * width * height;
                var cubeField = document.getElementById('cubic-field');
                cubeField.value = cube;

                // var table = document.getElementsByClassName("tbl-cart1");
                // var t = table[0];
                // t.rows[numItems].cells[2].innerHTML = shippingRate;

            });

        }


        function outputCart(table, rowNum, name, size, quant, price) {
            var str = "";
            var itemWt = 0;
            var colIndex = 0;
            var row = table.insertRow(rowNum);
            var nameCell = row.insertCell(colIndex++);
            nameCell.style.textAlign = "left"
            nameCell.innerHTML = sessionStorage.getItem(rowNum + "_name");

            // var sizeCell = row.insertCell(1);
            var itemSize = sessionStorage.getItem(rowNum + "_size");

            var quantCell = row.insertCell(colIndex++);
            var quantity = parseInt(sessionStorage.getItem(rowNum + "_quantity"));
            quantCell.style.textAlign = "center";
            quantCell.innerHTML = quantity.toFixed(0);;
            itemWt += quantity * itemSize;
            totalWt += itemWt;
            var weightCell = row.insertCell(colIndex++);
            weightCell.innerHTML = itemWt.toFixed(1);

            var priceCell = row.insertCell(colIndex++);
            var price = sessionStorage.getItem(rowNum + "_price");
            price = parseFloat(price.slice(0));
            price *= quantity;
            priceCell.innerHTML = "$" + price.toFixed(2);
            totalAmount += price;
        }

        var numItems = parseInt(sessionStorage.getItem("num-items"));
        totalWt = 0;
        // var totalAmt = sessionStorage.getItem("total");
        // var shipping = sessionStorage.getItem("shipping");
        // if (shipping != null) {
        //     window.alert("Shipping cost received!");
        // }
        // numItems += 1;
        totalAmount = 0;
        var table = document.getElementsByClassName("tbl-cart1");
        var t = table[0];
        for (var r = 1; r <= numItems; r++) {
            outputCart(t, r);
        }

        // var totalAmount = parseFloat(sessionStorage.getItem('total-amount'));
        sessionStorage.setItem('total-amount', totalAmount);
        var totalAmtCell = document.getElementById("total-amount");
        if ( isNaN(totalAmount) ) {
            totalAmount = 0;   
        }
        totalAmtCell.innerHTML = "$" + totalAmount.toFixed(2);

        var savedShippingRate = sessionStorage.getItem('shipping-rate');
        if ( savedShippingRate != null ) {
            if ( zipHasBeenEntered ) {
                var shippingRateCell = document.getElementById("shipping-rate");
                shippingRateCell.innerHTML = "$"+savedShippingRate;
            } else {
                sessionStorage.removeItem('shipping-rate');
            }
        }


        // var row, cell;
        // row = t.insertRow(numItems);
        // cell = row.insertCell(0);
        // cell.style.textAlign = "left"
        // cell.innerHTML = 'Shipping Cost ' + '<button onclick="getShipping()">Get Shipping Price</button>';

        // cell = row.insertCell(1);
        // cell = row.insertCell(2);
        // cell = row.insertCell(3);
        // if (shipping != null) {
        //     var num = parseFloat(shipping);
        //     num = num.toFixed(2);
        //     cell.innerHTML = "$" + num;
        // } else {
        //     cell.innerHTML = "$0.00";
        // }

        // row = t.insertRow(numItems + 1);
        // cell = row.insertCell(0);
        // cell.style.textAlign = "left"
        // cell.innerHTML = "Total";

        // var cell = row.insertCell(1);
        // cell = row.insertCell(2);
        // cell.innerHTML = totalWt.toFixed(1);

        // cell = row.insertCell(3);
        // cell.innerHTML = totalAmt;
    </script>
</body>

</html>