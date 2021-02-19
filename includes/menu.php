<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>

<head>
    <title>Footer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=<?php echo $_SESSION['root'] . '/files/css/menu.css' ?> media="screen" rel="stylesheet" type="text/css">
</head>

<body>
    <nav>
        <span class="menu-item"><a href="index.php">Home</a></span>
        <div class="dropdown">
            <span class="menu-item"><a href="index.php">Art</a></span>
            <div class="dropdown-content">
                <a href="https://www.janeherbert.com"><span class="dropdown-item">Jane Herbert Paintings</span></a>
            </div>
        </div>
        <div class="dropdown">
            <span class="menu-item"><a href="index.php">Portfolio</a></span>
            <div class="dropdown-content">
                <a href="https://www.mainevillageweaver.com"><span class="dropdown-item">Maine Village Weaver</span></a>
                <a href="https://www.scottishwroughtiron.com/"><span class="dropdown-item">Scottish Lion Wrought Iron</span></a>
            </div>
        </div>
        <span class="menu-item"><a href="./files/pages/contact.html" target="_blank">Contact</a></span>
        <span class="menu-item"><a href="./files/pages/about.php">About</a></span>

    </nav>
</body>

</html>