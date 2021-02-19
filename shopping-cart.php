<?php
session_start();
$_SESSION['pagename'] = "shopping-cart";
require_once("dbcontroller.php");

$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $code = $_POST["code"];
                // $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $code . "'");
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'size' => $productByCode[0]["size"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>
<HTML>

<HEAD>
    <TITLE>Simple PHP Shopping Cart</TITLE>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/shopping-cart.css" type="text/css" rel="stylesheet" />
</HEAD>

<BODY>
    <?php
    require './includes/banner.php';
    ?>

    <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>
        <a id="btnEmpty" href="shopping-cart.php?action=empty">Empty Cart</a>
        <?php
        if (isset($_SESSION["cart_item"])) {
            $total_quantity = 0;
            $total_price = 0;
        ?>

            <table class="tbl-cart" cellpadding="2" cellspacing="1" id="tbl-cart" border="1">
                <tbody>
                    <tr>
                        <!-- <th class="th-image" style="text-align:left;" width="5%">Image</th>
                        <th style="text-align:left;">Name</th>
                        <th class="th-code" style="text-align:left;">Code</th>
                        <th style="text-align:left;">Size (oz)</th>
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:right;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
 -->
                        <th class="th-image" width="5%">Image</th>
                        <th>Name</th>
                        <!-- <th class="th-code">Code</th> -->
                        <th width="5%">Size (oz)</th>
                        <th width="2%">Qty</th>
                        <th width="5%">Unit Price</th>
                        <th width="5%">Price</th>
                        <th width="5%">X</th>

                    </tr>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item) {
                        $code = $item["code"];
                        $item_price = $item["quantity"] * $item["price"];
                        $quantity = $item["quantity"];
                        $price = $item["price"];
                        $itemSize = $item["size"];
                        $itemImage = $item["image"];
                        $itemName = $item["name"];
                    ?>
                        <tr>
                            <td class="td-image"><img class="cart-item-image" src="<?php echo $item["image"]; ?>" </td>
                            <td><?php echo $item["name"]; ?></td>
                            <!-- <td class="td-code"><?php echo $code; ?></td> -->
                            <td align="center"><?php echo $item["size"]; ?></td>
                            <!-- <td style="text-align:center;"><?php echo $item["quantity"]; ?></td> -->

                            <td style="text-align:center;">
                                <input id="qty-id" type="number" id="quantity" name="qty" onchange="quantityChanged(this.value)" value="<?php echo $item["quantity"]; ?>" size="4" min="0">
                            </td>



                            <td style="text-align:right;"><?php echo "$" . $item["price"]; ?></td>
                            <td style="text-align:right;"><?php echo "$" . number_format($item_price, 2); ?></td>
                            <td style="text-align:center;"><a href="shopping-cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                        </tr>
                    <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["price"] * $item["quantity"]);
                    }
                    ?>

                    <!-- <tr>
                    <td colspan="2" align="right">Shipping:</td>
                        <td align="right">
                            
                        </td>
                        <td align="right" colspan="2"><a href="shopping-cart-shipping.php">Compute Shipping</a></td>
                        <td></td>
                    </tr> -->
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="left">Total:</td>
                        <td colspan="1" align="right"></td>
                        <td colspan="1" align="right"></td>
                        <td colspan="1" align="right"></td>
                        <td colspan="1" align="right"></td>
                        <td align="right" colspan="1"><?php echo "$" . number_format($total_price, 2); ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="no-records">Your Cart is Empty</div>
        <?php
        }
        // unset($_SESSION["cart_item"]);
        ?>
    </div>

    <div class="cart-buttons">
        <div class="continue-shopping">
            <button onclick="goBack()">Continue Shopping</button>
            <button onclick="goForward()">Checkout</button>
            <!-- <a href="checkout-info.php"><button>Proceed to Checkout</button></a> -->
        </div>
    </div>

    <script>
        function quantityChanged(value) {
            alert("Quantity Changed!");
            // if (numItems == null) {
            fillShoppingCart();
            // }
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
                // var code = t.rows[r].cells[2].innerHTML;
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
            var row = table.insertRow(rowNum);
            var nameCell = row.insertCell(colIndex++);
            nameCell = row.insertCell(colIndex++);
            nameCell.style.textAlign = "left"
            nameCell.innerHTML = sessionStorage.getItem("row" + rowNum + "_name");

            // var sizeCell = row.insertCell(1);
            var itemSize = sessionStorage.getItem("row" + rowNum + "_size");

            var quantCell = row.insertCell(colIndex++);
            quantCell = row.insertCell(colIndex++);

            var quantity = parseInt(sessionStorage.getItem("row" + rowNum + "_quantity"));
            quantCell.style.textAlign = "center";
            quantCell.innerHTML = quantity.toFixed(0);;
            itemWt += quantity * itemSize;
            totalWt += itemWt;
            var weightCell = row.insertCell(colIndex++);
            weightCell.innerHTML = itemWt.toFixed(1);

            var priceCell = row.insertCell(colIndex++);
            var price = sessionStorage.getItem("row" + rowNum + "_price");
            price = parseFloat(price.slice(1));
            price *= quantity;
            priceCell.innerHTML = "$" + price.toFixed(2);

        }


        function loadShoppingCart() {
            totalWt = 0;
            var totalAmt = sessionStorage.getItem("total");
            var shipping = sessionStorage.getItem("shipping");
            if (shipping != null) {
                window.alert("Shipping cost received!");
            }
            // numItems += 1;
            var table = document.getElementsByClassName("tbl-cart");
            var t = table[0];
            for (var r = 1; r < numItems; r++) {
                // deleteFromCart(t, r);
                t.deleteRow(r);
            }
            for (var r = 1; r < numItems; r++) {
                output2Cart(t, r);
            }

            var row, cell;
            row = t.insertRow(numItems);
            cell = row.insertCell(0);
            cell.style.textAlign = "left"
            cell.innerHTML = 'Shipping Cost ' + '<button onclick="getShipping()">Get Shipping Price</button>';

            cell = row.insertCell(1);
            cell = row.insertCell(2);
            cell = row.insertCell(3);
            if (shipping != null) {
                var num = parseFloat(shipping);
                num = num.toFixed(2);
                cell.innerHTML = "$" + num;
            } else {
                cell.innerHTML = "$0.00";
            }

            row = t.insertRow(numItems);
            cell = row.insertCell(0);
            cell.style.textAlign = "left"
            cell.innerHTML = "Total";

            var cell = row.insertCell(1);
            cell = row.insertCell(2);
            cell.innerHTML = totalWt.toFixed(1);

            cell = row.insertCell(3);
            cell.innerHTML = totalAmt;
        }

        var numItems = sessionStorage.getItem("num-items");
        if (numItems == null) {
            // storeShoppingCart();
        } else {
            loadShoppingCart();
        }

        window.history.replaceState({}, document.title, "http://localhost:8080/SliceOCountry_v4/" + "shopping-cart.php");
    </script>

</BODY>

</HTML>