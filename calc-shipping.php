<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    // define variables and set to empty values
    $quantity = $pounds = $ounces = 0;
    $destZip = "";
    $quantityError = $poundsError = $ouncesError = $destZipError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["quantity"])) {
            $quantityError = "Quantity is required";
        } else {
            $quantity = test_input($_POST["quantity"]);
        }

        if (empty($_POST["weight-pounds"])) {
            $poundsError = "Pounds is required";
        } else {
            $pounds = test_input($_POST["weight-pounds"]);
        }

        if (empty($_POST["weight-ounces"])) {
            $ouncesError = "ounces is required";
        } else {
            $ounces = test_input($_POST["weight-ounces"]);
        }
        
        if (empty($_POST["dest-zip"])) {
            $destZipError = "Destination Zipcode is required";
        } else {
            $destZip = test_input($_POST["dist-zip"]);
        }
    }

?>

    <main>

        <!-- <form  method="post" action="usps2.php"> -->
        <!-- <form method="post" action="shopping-cart.php?action=add" class="form-container"> -->
        <form method="post" action="usps2.php" class="form-container">

            <label for="quantity">Quantity</label>
            <br>
            <input type="number" id="quantity" min="1" value="1" name="quantity">
            <br><br>
            <label for="weight-pounds">Weight Pounds</label><br>
            <input type="number" id="weight-pounds" name="weight-pounds">
            <br><br>
            <label for="weight-ounces">Weight Ounces</label><br>
            <input type="number" id="weight-ounces" name="weight-ounces">
            <br><br>
            <label for="dest-zip">Desination Zipcode</label><br>
            <input type="text" id="dest-zip" name="dest-zip" placeholder="10001">
            <br><br>
            <!-- <label for="code">Select Shipping Method</label><br>
            <select name="code" id="code-id">
                <option value="PRIORITY">Priority</option>
                <option value="">Priority - Flat Rate</option>
                <option value="RETAIL GROUND">Retail Ground</option>
                <option value="FIRST CLASS">First-Class Package Service</option>
            </select> -->
            <button type="submit" class="btn">Get Prices</button>
            <br><br>
        </form>



        </form>

    </main>

</body>

</html>