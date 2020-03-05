<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Room 923</title>
    <link rel="stylesheet" href="/css/global.css">
    <!-- <link rel="stylesheet" href=""> -->
    <script src="/js/lib/jquery-3.4.1.min.js"></script>
    <style>
        h2 {
            font-size: 40px;
        }

        div.form {
            width: 500px;
            height: 700px;
            /* background-color: grey; */
            position: fixed;
        }

        div.inputs {
            height: 596px;
            /* background-color: lightcoral; */
        }

        div.fields {
            /* padding-top: 50px; */
            height: 100px;
            /* background-color: lightcyan; */
            display: flex;
            align-content: center;
            justify-items: center;
        }

        button {
            outline: none;
        }

        input {
            /* height: fit-content; */
            transition: 0.6s;
            outline: none;
            width: 300px;
            font-size: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 40px;
            padding-right: 40px;
            border-radius: 50px;
            border-color: rgb(255, 184, 53);
            border-width: 0;
            box-shadow: 5px 5px 10px rgba(73, 73, 73, 0.541);
            color: rgb(41, 41, 41);
        }

        input:hover {
            transition: 0.6s;
            outline: none;
            width: 300px;
            font-size: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 40px;
            padding-right: 40px;
            border-radius: 50px;
            border-color: rgb(255, 184, 53);
            border-width: 0;
            color: rgb(41, 41, 41);
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24);
        }

        #submit {
            margin-top: 20px;
            width: 80px;
            transition: 0.7s;
            height: 80px;
            font-size: 30px;
            padding: 0;
            background-color: rgb(255, 184, 53);
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.267);
            font-weight: bold;
        }

        #submit:hover {
            /* background-color: rgb(44, 39, 31); */
            transition: 0.5s;
            width: 80px;
            height: 80px;
            font-size: 30px;
            padding: 0;
            /* background-color: rgb(243, 172, 39); */
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.164), 0px 10px 20px rgba(255, 184, 53, 0.336);
            font-weight: bold;
        }

        #submit:active {
            transition: 0.2s;
            width: 80px;
            height: 80px;
            font-size: 30px;
            padding: 0;
            background-color: rgb(247, 174, 39);
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.164), 0px 5px 10px rgba(255, 184, 53, 0.336);
            font-weight: bold;
            transform: translateY(5px);
        }

        a.link {
            color: rgb(255, 184, 53);
            cursor: pointer;
        }

        p.message {
            color: rgb(255, 144, 53);
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#form-forgot").submit(function() {
                $.post('forgot.php', {
                    username: $("#username").val(),
                    email: $("#email").val(),
                    password: $("#newPassword").val()
                }, function(data, status) {
                    if (status == 'success') {
                        if (data == 'true') {
                            window.location = '/login/';
                        } else {
                            $("#email").css('color', 'red');
                            alert('Wrong Information! Try Again!')
                        }
                    } else {
                        alert('Network Error! Please Check Your Internet Connection!');
                    }
                })
                return false;
            });
        })
    </script>
</head>

<body>
    <script>
        $.post('/login/logout.php', {}, function() {})
    </script>
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
        <div class="form">
            <div class="title">
                <h2 id="formTitle">Forgot Your Password?</h1>
                    <div class="message">
                        <p class="message" id="msg"></p>
                    </div>
            </div>
            <div class="inputs">
                <form method="POST" id="form-forgot">
                    <div class="fields">
                        <div class="username">
                            <input type="text" name="username" id="username" placeholder="Your Username" required>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="email" id='eml'>
                            <input type="email" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="password" id='pwd'>
                            <input type="password" name="newPassword" id="newPassword" placeholder="New Password" required minlength="8">
                        </div>
                    </div>
                    <div class="fields" id="submitField">
                        <div class="submit">
                            <input type="submit" name="submit" id="submit" value="GO">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>