<?php
$styleSarah = 'style="color: black; font-size: 22px; font-family: Arial; font-weight: bold"';

$styleJams = 'style="text-align: center; display: block; font-size: 24px; 
                font-style: italic; font-family: Arial; font-weight: normal;"';
// $styleJams = '""';  

$styleJars = 'style="margin: 0 auto; width: 100%; height: auto; text-align: center; display: block; font-size: 16px; 
                font-style: normal; font-family: Arial;">';
?>

<header class="header">
    <div class="header-logo">
        <span class="header-logo__title"><span class="s-font">S</span>lice O&#39; Country</span>
        <!-- <div class="tag-line header-logo__sub-title">
            <span>A&nbsp;Taste&nbsp;of&nbsp;Home </span>
            <span>and&nbsp;a </span>
            <span>Touch&nbsp;of&nbsp;Country</span>
        </div> -->
    </div>
    <div class="nav">
        <div class="nav__wide">
            <ul>
                <span class="menu-item"><a href="<?php echo $_SESSION['root'] . '/files/pages/home.php' ?>">Home</a></span>
                <span class="menu-item"><a href=<?php echo $_SESSION['root'] . '/files/pages/boards.php' ?>>Cutting Boards</a></span>
                <span class="menu-item"><a href=<?php echo $_SESSION['root'] . '/files/pages/jams.php' ?>>Jams & Preserves</a></span>
            </ul>
        </div>

        <div class="nav__narrow">
            <ul>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">
                        <div class="hamburger"></div>
                        <div class="hamburger"></div>
                        <div class="hamburger"></div>
                    </a>
                    <div class="dropdown-content">
                        <a href="<?php echo $_SESSION['root'] . '/files/pages/home.php' ?>">Home</a>
                        <a href=<?php echo $_SESSION['root'] . '/files/pages/boards.php' ?>>Cutting Boards</a>
                        <a href=<?php echo $_SESSION['root'] . '/files/pages/jams.php' ?>>Jams & Preserves</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</header>