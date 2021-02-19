<?php
session_start();
$_SESSION['pagename'] = "shopping-cart";
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

                $name = $productByCode[0]["name"];
                $code = $productByCode[0]["code"];
                $size = $productByCode[0]["size"];
                $price = $productByCode[0]["price"];
                $image = $productByCode[0]["image"];
                $quantity = $_POST["quantity"];

                echo '<script>';
                echo 'var name = "'.$name.'";'."\n";
                echo 'var code = "'.$code.'";'."\n";
                echo 'var size = "'.$size.'";'."\n";
                echo 'var price = "'.$price.'";'."\n";
                echo 'var image    = "'.$image.'";'."\n";
                echo 'var quantity = "'.$quantity.'";'."\n";
                echo '';

                echo 'var r = 1'."\n";
                echo 'sessionStorage.setItem(r + "_name", name);'."\n";
                echo 'sessionStorage.setItem(r + "_code", code);'."\n";
                echo 'sessionStorage.setItem(r + "_size", size);'."\n";
                echo 'sessionStorage.setItem(r + "_quantity", quantity);'."\n";
                echo 'sessionStorage.setItem(r + "_price", price);'."\n";
                echo 'sessionStorage.setItem("num-items", "1");'."\n";

                echo 'window.location.href = "shopping-cart2.php";',"\n";

                echo '</script>';
                
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

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
            nameCell.innerHTML = sessionStorage.getItem(rowNum + "_name");

            // var sizeCell = row.insertCell(1);
            var itemSize = sessionStorage.getItem(rowNum + "_size");

            var quantCell = row.insertCell(colIndex++);
            quantCell = row.insertCell(colIndex++);

            var quantity = parseInt(sessionStorage.getItem(rowNum + "_quantity"));
            quantCell.style.textAlign = "center";
            quantCell.innerHTML = quantity.toFixed(0);;
            itemWt += quantity * itemSize;
            totalWt += itemWt;
            var weightCell = row.insertCell(colIndex++);
            weightCell.innerHTML = itemWt.toFixed(1);

            var priceCell = row.insertCell(colIndex++);
            var price = sessionStorage.getItem(rowNum + "_price");
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
            // for (var r = 1; r < numItems; r++) {
            //     // deleteFromCart(t, r);
            //     // t.deleteRow(r);
            // }
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
        // if (numItems == null) {
            // storeShoppingCart();
        // } else {
            // loadShoppingCart();
        // }

        window.history.replaceState({}, document.title, "http://localhost:8080/SliceOCountry_v4/" + "shopping-cart.php");
    </script>

</BODY>

</HTML>