<!DOCTYPE html>
<html>

<head>
    <title>
        923 | Home
    </title>
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="/css/global.css">
    <script>
        var sleep = function (time) {
            var startTime = new Date().getTime() + parseInt(time, 10);
            while (new Date().getTime() < startTime) { }
        };

        var change = function (str) {
            document.getElementsByClassName("role").innerHTML = str;
        }

        var roles = ['Dorm', 'Cinema', 'Laboratory', 'Arcade', 'Chat Room', 'Chess Room', 'Paradise'];
        function animate() {
            for (role in roles) {
                setTimeout(() => {
                    change(role)
                }, 500);
            }
        }
    </script>
</head>

<body>
    <!-- <h1>Welcome to Room 923!</h1> -->
    <div class="welcome">
        <h1 class="title"><b>WELCOME<br> TO<br> <i id="role"
                    style="color: rgb(255, 184, 53); font-size: 200px;">Room</i><br>923</b></h1>
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
    <div class="navigation">
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
    </div>
</body>

</html>

<?php

$sessionName = session_name();
$sessionID = $_GET[$sessionName];
session_id($sessionID);

session_start();

if (isset($_SESSION['login'])){
    // header('location: /login/');
    echo $_SESSION['username'];
    // exit;
} else {
    // header('refresh: 0; url=/login/');
    // echo $sessionName;
    // echo 'no';
    // exit;
    // echo $_COOKIE;
}

?>