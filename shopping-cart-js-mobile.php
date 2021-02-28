<?php
session_start();
$_SESSION['pagename'] = "shopping-cart";
?>
<HTML>

<HEAD>
    <TITLE>Simple PHP Shopping Cart</TITLE>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/shopping-cart-mobile.css" type="text/css" rel="stylesheet" />
</HEAD>

<BODY>
    <?php
    require './includes/banner.php';
    ?>

    <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart (Mobile)</div>
        <!-- <a id="btnEmpty" href="shopping-cart.php?action=empty">Empty Cart</a> -->
        <button id="btnEmpty" onclick="goBack()">Empty Cart</button>

        <table class="tbl-cart" cellpadding="2" cellspacing="1" id="tbl-cart" border="1">
            <tbody>
                <tr>
                    <th width="5%">Image</th>
                    <th>Name</th>
                    <!-- <th class="th-code">Code</th> -->
                    <th width="5%">Size (oz)</th>
                    <th width="2%">Qty</th>
                    <!-- <th width="1%"></th> -->
                    <th width="5%">Unit Price</th>
                    <th width="5%">Price</th>
                    <th width="5%">X</th>
                </tr>

                <tr>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="2" align="left">Shipping: </td>
                    <td colspan="1" align="right"></td>
                    <td colspan="1" align="right"></td>
                    <td colspan="1" align="right"></td>
                    <td id="shipping-rate" colspan="1" align="right">$0.00</td>
                    <td align="right" colspan="1"></td>
                    <!-- <td></td> -->
                </tr>

                <tr>
                    <td colspan="2" align="left">Total:</td>
                    <td colspan="1" align="right"></td>
                    <td colspan="1" align="right"></td>
                    <td colspan="1" align="right"></td>
                    <td id="total-amount" colspan="1" align="right">$0.00</td>
                    <td align="right" colspan="1"></td>
                    <!-- <td></td> -->
                </tr>
            </tbody>
        </table>
    </div>

    <div class="cart-buttons">
        <div class="continue-shopping">
            <button onclick="goBack()">Continue Shopping</button>
            <button onclick="goForward()">Checkout</button>
            <!-- <a href="checkout-info.php"><button>Proceed to Checkout</button></a> -->
        </div>
    </div>

    <script>
        var storageCopy;
        var totalAmount = 0;
        var cartCopy;


        function emptyCart() {
            numItems = sessionStorage.getItem('num-items');
            for (var i = numItems; i>=1; i--) {
                removeItem(i);
            }
        }

        function incrementQty( rowNum ) {
            var qtyElement = document.getElementById(rowNum + "_quantity").childNodes[1];
            var quantity = parseFloat(qtyElement.value) + parseFloat("1.0");
            qtyElement.value = quantity.toFixed(1);
            sessionStorage.setItem(rowNum+'_quantity', quantity);
        }

        function decrementQty( rowNum ) {
            var qtyElement = document.getElementById(rowNum + "_quantity").childNodes[1];
            var quantity = parseFloat(qtyElement.value) - parseFloat("1.0");
            qtyElement.value = quantity.toFixed(1);
            if ( quantity == 0 ) {
                removeItem(rowNum);
            }
            sessionStorage.setItem(rowNum+'_quantity', quantity);
        }
        
        function quantityChanged(value) {
            // alert("New Quantity is "+value);

            copyFromStorage();

            copyFromCart();

            var numItens = sessionStorage.getItem('num-items');
            for (var i = 1; i <= numItems; i++) {
                var cartRow = cartCopy[i];
                var storeRow = storageCopy[i];
                var cartQty = cartRow[5];
                var storeQty = storeRow[5];
                if (cartQty != storeQty) {
                    sessionStorage.setItem(i + "_quantity", cartQty);

                    if (cartQty == 0) {
                        removeItem(i);
                    }
                    break;
                }
            }
        }

        function copyFromCart() {
            var numItens = sessionStorage.getItem('num-items');
            cartCopy = new Array(numItems);
            for (var i = 1; i <= numItems; i++) {
                var image = "image"; //document.getElementById(i+"_image");

                var code = "code"; //document.getElementById(i+"_code");
                var name = document.getElementById(i + "_name").innerHTML;
                var size = document.getElementById(i + "_size").innerHTML;
                var price = document.getElementById(i + "_price").innerHTML;
                var quantity = document.getElementById(i + "_quantity").value;

                var total = document.getElementById(i + "_total-price").innerHTML;

                var rowList = new Array(image, code, name, size, price, quantity, total);
                cartCopy.push(rowList);
            }

        }

        function copyFromStorage() {
            storageCopy = new Array(numItems);
            var numItens = sessionStorage.getItem('num-items');
            for (var i = 1; i <= numItems; i++) {
                var image = sessionStorage.getItem(i + "_image");
                var code = sessionStorage.getItem(i + "_code");
                var name = sessionStorage.getItem(i + "_name");
                var size = sessionStorage.getItem(i + "_size");
                var price = sessionStorage.getItem(i + "_price");
                var quantity = sessionStorage.getItem(i + "_quantity");
                var total = sessionStorage.getItem(i + "_total");

                var rowList = new Array(image, code, name, size, price, quantity, total);
                storageCopy.push(rowList);
            }

        }

        function goBack() {
            window.history.back();
        }

        function goForward() {
            window.location.href = "checkout-info.php";
        }

        function storeShoppingCart() {
            sessionStorage.clear();
            // t.rows[r].cells[2].innerHTML = parseInt(t.rows[r].cells[0].innerHTML) + parseInt(t.rows[r].cells[1].innerHTML);
            var table = document.getElementsByClassName("tbl-cart");
            var t = table[0];
            var len = t.rows.length;
            for (var r = 1; r < len - 2; r++) {
                var image = t.rows[r].cells[0].innerHTML;
                var name = t.rows[r].cells[1].innerHTML;
                var code = t.rows[r].cells[2].innerHTML;
                var size = t.rows[r].cells[2].innerHTML;
                var quantity = t.rows[r].cells[3].children[0].value;
                var price = t.rows[r].cells[4].innerHTML;
                // sessionStorage.setItem("row"+r, name+";"+size+";"+quantity+";"+price);

                sessionStorage.setItem("row" + r + "_name", name);
                // sessionStorage.setItem("row" + r + "_code", code);
                sessionStorage.setItem("row" + r + "_size", size);
                sessionStorage.setItem("row" + r + "_quantity", quantity);
                sessionStorage.setItem("row" + r + "_price", price);
            }

            var totalPrice = t.rows[len - 1].cells[2].innerHTML;
            sessionStorage.setItem("total", totalPrice);
            sessionStorage.setItem("num-items", len - 2);
        }


        function deleteRow(table, rowNum) {
            for (var r = 1; r < numItems; r++) {
                var row = t.deleteRows()

            }

        }

        function output2Cart(table, rowNum) {
            var str = "";
            var itemWt = 0;
            var colIndex = 0;
            var idStr;

            var row = table.insertRow(rowNum);
            row.setAttribute("id", "row" + rowNum);

            var imageCell = row.insertCell(colIndex++);
            // imageCell = row.insertCell(colIndex++);
            imageCell.style.textAlign = "center"
            idStr = rowNum + "_image";
            imageCell.setAttribute("id", idStr);
            imageCell.innerHTML = '<img src="images/' + sessionStorage.getItem(idStr) + '" width="50%" >';


            var nameCell = row.insertCell(colIndex++);
            nameCell.style.textAlign = "left"
            idStr = rowNum + "_name";
            nameCell.setAttribute("id", idStr);
            nameCell.innerHTML = sessionStorage.getItem(idStr);


            var sizeCell = row.insertCell(colIndex++);
            idStr = rowNum + "_size";
            sizeCell.setAttribute("id", idStr);
            var size = parseFloat(sessionStorage.getItem(idStr));
            sizeCell.style.textAlign = "center";
            sizeCell.innerHTML = size.toFixed(1);;

            // <input id="qty-id" type="number" id="quantity" name="qty" onchange="quantityChanged(this.value)" value="0" size="4" min="0">
            var quantCell = row.insertCell(colIndex++);
            // var cellNodeDiv = document.createElement("DIV");
            // cellNodeDiv.setAttribute("class", "qty-block");
            // quantCell.appendChild(cellNodeDiv);
            // quantCell = cellNodeDiv;
            // var minusNodeCell = quantCell; // row.insertCell(colIndex++);
            var minusNodeDiv = document.createElement("DIV");
            minusNodeDiv.setAttribute("class", "plus-minus-block");
            quantCell.appendChild(minusNodeDiv);
            var minusNode = document.createElement("button");
            minusNode.setAttribute("onclick", "decrementQty('"+rowNum+"')");            
            minusNodeDiv.appendChild(minusNode);
            minusNode.innerHTML = "-";

            
            idStr = rowNum + "_quantity";
            var quantity = parseInt(sessionStorage.getItem(idStr));
            quantCell.setAttribute("class", "qty-id");
            quantCell.setAttribute("id", idStr);
            // var qtyNodeDiv = document.createElement("DIV");

            var inputNode = document.createElement("DIV");
            // inputNode.setAttribute("type", "number");
            // inputNode.setAttribute("min", "0");
            // inputNode.setAttribute("value", quantity);
            inputNode.setAttribute("class", "plus-minus-block");
            // inputNode.setAttribute("readonly", "");
            inputNode.innerHTML = quantity;
            quantCell.appendChild(inputNode);


            // qtyNodeDiv.setAttribute("class", "qty-id");
            // quantCell.appendChild(qtyNodeDiv);

            inputNode.value = quantity.toFixed(0);

            // var inputNode = document.createElement("INPUT");
            // inputNode.setAttribute("type", "number");
            // inputNode.setAttribute("min", "0");
            // inputNode.setAttribute("value", quantity);
            // inputNode.setAttribute("onchange", "quantityChanged(this.value)");
            // quantCell.appendChild(inputNode);


            var plusNodeCell = quantCell; // row.insertCell(colIndex++);
            var plusNodeDiv = document.createElement("DIV");
            plusNodeDiv.setAttribute("class", "plus-minus-block");
            quantCell.appendChild(plusNodeDiv);
            var plusNode = document.createElement("button");
            plusNode.setAttribute("onclick", "incrementQty('"+rowNum+"')");            
            plusNodeDiv.appendChild(plusNode);
            plusNode.innerHTML = "+";

            // var minuNode = document.createElement("button");
            // minuNode.setAttribute("onclick", "deccrementQty('"+rowNum+"')");            
            // plusMinusNodeDiv.appendChild(minuNode);
            // minuNode.innerHTML = "-";

            // quantCell.style.textAlign = "center";
            // quantCell.innerHTML = quantity.toFixed(0);

            // itemWt += quantity * size;
            // totalWt += itemWt;
            // var weightCell = row.insertCell(colIndex++);
            // weightCell.innerHTML = itemWt.toFixed(1);

            var unitPriceCell = row.insertCell(colIndex++);
            idStr = rowNum + "_price";
            unitPriceCell.setAttribute("id", idStr);
            unitPriceCell.style.textAlign = "right";
            var unitPrice = sessionStorage.getItem(idStr);
            unitPrice = parseFloat(unitPrice);
            unitPriceCell.innerHTML = "$" + unitPrice.toFixed(2);

            var totalPriceCell = row.insertCell(colIndex++);
            idStr = rowNum + "_total-price";
            totalPriceCell.setAttribute("id", idStr);
            totalPriceCell.style.textAlign = "right";
            var totalPrice = sessionStorage.getItem(rowNum + "_price");
            totalPrice = parseFloat(totalPrice);
            totalPrice *= quantity;
            sessionStorage.setItem(idStr, totalPrice);
            totalPriceCell.innerHTML = "$" + totalPrice.toFixed(2);

            totalAmount += totalPrice;
            // 
            var delCell = row.insertCell(colIndex++);
            delCell.style.textAlign = "center";
            delCell.innerHTML = '<td><button class="btnRemoveAction" onclick="removeItem(' + rowNum + ')"><img src="icon-delete.png" alt="Remove Item" /></button</td>';

        }

        function removeItem(row) {
            // alert("Remove row " + row);
            // copyFromStorageRow(row);
            copyFromStorage();

            var numItems = sessionStorage.getItem("num-items");
            sessionStorage.clear();
            var i, j;
            for (i = j = 1; i <= numItems; i++) {
                if (row != i) {
                    var rowData = storageCopy[i];
                    sessionStorage.setItem(j + "_image", rowData[0]);
                    sessionStorage.setItem(j + "_code", rowData[1]);
                    sessionStorage.setItem(j + "_name", rowData[2]);
                    sessionStorage.setItem(j + "_size", rowData[3]);
                    sessionStorage.setItem(j + "_price", rowData[4]);
                    sessionStorage.setItem(j + "_quantity", rowData[5]);
                    sessionStorage.setItem(j + "_total", rowData[6]);
                    j++;
                }
            }

            // for (var i = 1; i <= numItems; i++) {
            //     var deleteRow = document.getElementById("row"+i);
            //     table.removeChild(deleteRow); 
            // }
            document.getElementById("tbl-cart").deleteRow(3);
            document.getElementById("tbl-cart").deleteRow(2);
            document.getElementById("tbl-cart").deleteRow(1);

            numItems--;
            sessionStorage.setItem("num-items", numItems);
            loadShoppingCart();
            // var row = document.getElementById("row" + row);
            // document.getElementById("tbl-cart").deleteRow(row.rowIndex);
        }


        function copyFromStorageRow(skip) {
            var numItems = sessionStorage.getItem("num-items");
            if (numItems == null) {
                return;
            }

            cartCopy = new Array(numItems);

            for (var i = 1; i <= numItems; i++) {
                if (i != skip) {
                    var image = sessionStorage.getItem(i + "_image");
                    var code = sessionStorage.getItem(i + "_code");
                    var name = sessionStorage.getItem(i + "_name");
                    var size = sessionStorage.getItem(i + "_size");
                    var price = sessionStorage.getItem(i + "_price");
                    var quantity = sessionStorage.getItem(i + "_quantity");
                    var total = sessionStorage.getItem(i + "_total");

                    var rowList = new Array(image, code, name, size, price, quantity, total);
                    cartCopy.push(rowList);
                }
            }

            // for ( var i=1; i<=numItems; i++ ) {
            //     sessionStorage.removeItem(i+"_image");
            //     sessionStorage.removeItem(i+"_code");
            //     sessionStorage.removeItem(i+"_name");
            //     sessionStorage.removeItem(i+"_size");
            //     sessionStorage.removeItem(i+"_price");
            //     sessionStorage.removeItem(i+"_quantity");
            //     sessionStorage.removeItem(i+"_total");
            // }
        }

        function loadShoppingCart() {
            totalTotalPrice = 0;
            totalWt = 0;
            
            totalAmount = 0;
            var table = document.getElementsByClassName("tbl-cart");
            var t = table[0];
            var numItems = sessionStorage.getItem('num-items');
            for (var r = 1; r <= numItems; r++) {
                output2Cart(t, r);
            }

            sessionStorage.removeItem('total-amount');
            sessionStorage.removeItem('shipping-rate');

            var totalAmtCell = document.getElementById("total-amount");
            // var savedTotalAmt = sessionStorage.getItem('total-amount');
            totalAmtCell.innerHTML = "$" + totalAmount.toFixed(2);
            sessionStorage.setItem('total-amount', totalAmount);

            var shippingRateCell = document.getElementById("shipping-rate");
            shippingRateCell.innerHTML = "$0.00";
            sessionStorage.removeItem('shipping-rate');


            var row, cell;
            var itemIndex = parseInt(numItems) + 1;

            // row = t.insertRow(parseInt(numItems)+1);
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

            // row = t.insertRow(numItems);
            // cell = row.insertCell(0);
            // cell.style.textAlign = "left"
            // cell.innerHTML = "Total";

            // var cell = row.insertCell(1);
            // cell = row.insertCell(2);
            // cell.innerHTML = totalWt.toFixed(1);

            // cell = row.insertCell(3);
            // cell.innerHTML = totalAmt;
        }

        var numItems = sessionStorage.getItem("num-items");
        if (numItems == null) {
            // storeShoppingCart();
        } else {
            loadShoppingCart();
        }

        // window.history.replaceState({}, document.title, "http://localhost:8080/SliceOCountry_v4/" + "shopping-cart-js.php");
    </script>

</BODY>

</HTML>