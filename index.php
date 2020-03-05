<!DOCTYPE html>
<html>

<head>
    <title>
        923 | Home
    </title>
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="/css/global.css">
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
        <h1 class="title"><b>WELCOME<br> TO<br> <i id="role">Room</i><br>923</b></h1>
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
</body>

</html>