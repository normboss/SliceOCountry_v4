<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="./css/popup-test.css" media="screen" rel="stylesheet" type="text/css">

</head>

<body>


    <button class="open-button" onclick="openForm()">Open Form</button>

    <div class="form-popup" id="myForm">
        <form method="post" action="/shopping-cart.php" class="form-container">
            <!-- <h1></h1> -->

            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" min="1" value="1" name="quantity">
            <br>
            <label for="jar-size">Select Size</label>
            <select name="jar-size" id="jar-size">
                <option value="1_5oz">1.5 ounce</option>
                <option value="4oz">4.0 ounce</option>
                <option value="8oz">8.0 ounce</option>
            </select>
            <br><br>
            <button type="submit" class="btn">Add to Cart</button>
            <br><br>
            <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
        </form>
    </div>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>

</body>

</html>