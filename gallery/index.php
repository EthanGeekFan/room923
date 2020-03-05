<!DOCTYPE html>
<html>

<head>
    <title>
        Our Legendary Gallery
    </title>
    <link rel="stylesheet" href="/css/global.css">
    <link rel="shortcut icon" href="/favicon.png">
</head>

<body>
    <div class="naviBar">
        <ul>
            <li>
                <div><img id="logo" src="/logo.svg"></div>
            </li>
            <li><a href="/">Room 923</a></li>
            <li><a href="/arcade/">Arcade</a></li>
            <li><a href="/gallery/">Gallery</a></li>
            <li><a href="/blog/">Blogs</a></li>
            <?php
            $login = false;

            session_start();

            if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
                $username = $_SESSION['username'];
                echo '<li class="end"><a href="/login/logout.php">Log Out</a></li>';
                echo '<li class="end"><a href="">Hi, ' . $username . '! </a></li>';
            } else {
                echo '<li class="end"><a href="/login/">Login</a></li>';
                echo '<li class="end"><a href="/login/?signup=true">Sign up</a></li>';
            }
            ?>
        </ul>
    </div>
    <div class="welcome">
        <div calss="title">
            <h1 class="title">OUR<br><i id="role">Legendary</i><br>Past</h1>
        </div>
        <div class="jump">
            <!-- <a href="#content"><button class="portal">EXPLORE</button></a> -->
            <a href="#content" id="explore">EXPLORE</a>
        </div>
    </div>
    <div class="content" id="content">
        <div class="videos">
            <?php
            $login = false;

            session_start();

            if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
                $videos = scandir("../vids");
                foreach ($videos as $video) {
                    if ($video == '.' || $video == '..') {
                        continue;
                    }
                    echo '<div class="item"><video width="500" height="281.25" controls><source src="/vids/' . $video . '" type="video/mp4"></object></video></div>';
                }
            } else {
            }
            ?>
        </div>
    </div>
    </div>
</body>

</html>