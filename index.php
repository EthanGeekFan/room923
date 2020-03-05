<!DOCTYPE html>
<html>
<head>
    <title>
        923 | Home
    </title>
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="/css/global.css">
    <style>
        div.naviBar {
            width: 100%;
            position: fixed;
            /* background-color: rgba(0, 0, 0, 0); */
            background: linear-gradient(rgba(0, 0, 0, 0.164), rgba(0, 0, 0, 0));
            display: flex;
            align-items: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            overflow: auto;
            width: inherit;
        }

        li {
            float: left;
        }

        li.end {
            float: right;
        }

        div.naviBar a {
            display: block;
            font-weight: bold;
            color: white;
            font-size: 20px;
            background-color: transparent;
            text-align: center;
            padding: 20px 30px;
            text-decoration: none;
        }

        div.naviBar a:hover,
        a:active {
            background-color: rgba(39, 39, 39, 0.075);
        }

        li.end a {
            display: block;
            font-weight: bold;
            color: white;
            font-size: 20px;
            background-color: transparent;
            text-align: center;
            padding: 20px 30px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="naviBar">
        <ul>
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
        <h1 class="title"><b>WELCOME<br> TO<br> <i id="role" style="color: rgb(255, 184, 53); font-size: 140px;">Room</i><br>923</b></h1>
    </div>
    <script>
        var roles = ['Dorm', 'Cinema', 'Laboratory', 'Arcade', 'Chat Room', 'Chess Room', 'Paradise'];
        var i = 0;

        function update() {
            i = i + 1;
            if (i >= roles.length) {
                i = 0
            }
        }
        setInterval(() => {
            document.getElementById("role").innerHTML = roles[i];
            update();
        }, 1000);
    </script>
    <!-- <div class="navigation">
        <div class="container">
            <div class="portal">
                <h2 class="navi"><a href="gallery">Gallery</a></h2>
            </div>
            <div class="portal">
                <h2 class="navi"><a href="arcade">Game Room</a></h2>
            </div>
            <div class="portal">
                <h2 class="navi"><a href="blog">Blogs</a></h2>
            </div>
        </div>
    </div> -->
</body>

</html>