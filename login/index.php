<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title>Login | Room 923</title>
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="/css/global.css">
    <script src="/js/lib/jquery-3.4.1.min.js"></script>
    <script src="/js/lib/jquery.validate.min.js"></script>
    <!-- <script src="/js/lib/messages_zh.min.js"></script> -->
    <style>
        h2 {
            font-size: 50px;
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
        var lock;
        var valid;

        function setInfo(username) {
            document.getElementById('username').value = username;
            document.getElementById('msg').innerHTML = 'Wrong Username or Password!'
        }

        function afterSuccess(username) {
            document.getElementById('username').value = username;
            document.getElementById('msg').innerHTML = 'Signed up! You can login! '
        }

        function signup() {
            if ($("#username").val()){
                validate()
            }
            var lock = false;
            $("#username").on("compositionstart", function () {
                lock = true;
            });
            $("#username").on("compositionend", function () {
                lock = false;
                validate();
            });
            $("#username").on("input", function () {
                if (!lock) {
                    validate();
                }
            });
            document.title = 'Sign Up | Room 923'
            document.getElementById('msg').innerHTML = '';
            var form = document.getElementById('form-login');
            var formTitle = document.getElementById('formTitle');
            var username = document.getElementById('username');
            var password = document.getElementById('password');
            var hint = document.getElementById('description-login');
            var submit = document.getElementById('submitField');
            form.action = 'signup.php';
            formTitle.innerHTML = 'SIGN UP';

            var email = document.createElement('div');
            email.className = 'fields';
            email.id = 'emladdr';
            email.innerHTML = '<div class="email"> \
                                    <input type="email" name="email" id="email" placeholder="Email Address" required> \
                                    <br> \
                                    <p id="description" style="float: left; padding-left: 30px; margin-top: 7px;">Already have an \
                                    account? <a class="link" onclick="login()">Log in</a></p> \
                               </div>';
            hint.innerHTML = '';
            form.insertBefore(email, submit);
            form.id = 'form-signup';
            $("#form-signup").on('submit', check);
        }

        function login() {
            $("#username").unbind();
            document.title = 'Login | Room 923'
            var form = document.getElementById('form-signup');
            var formTitle = document.getElementById('formTitle');
            var username = document.getElementById('username');
            var email = document.getElementById('emladdr');
            var hint = document.getElementById('description-login');
            var submit = document.getElementById('submitField');
            form.action = 'login.php';
            formTitle.innerHTML = 'LOGIN';
            var msgs = document.getElementsByClassName('message');
            form.removeChild(email);
            hint.innerHTML = 'Don\'t have an account? <a class="link" onclick="signup()">Sign up</a>';
            form.id = "form-login";
            $("#username").css('color', 'rgb(41, 41, 41)');
            $("#form-login").unbind();
        }

        function check() {
            validate();
            return valid;
        }
    </script>
    <script>
        function validate(){
            var usr = $("#username").val();
            if (!usr) {
                $("#username").css('color', 'rgb(41, 41, 41)');
                return false;
            }
            $.post('usrValidate.php', {
                username: usr
            }, function (data, status) {
                if (status == 'success' && data == 'true') {
                    valid = true;
                    $("#username").css('color', 'green');
                    return true;
                } else {
                    if (status != 'success') {
                        alert('Network Error! Check Your Internet Connection!');
                        return false;
                    } else {
                        valid = true;
                        $("#username").css('color', 'red');
                        return false;
                    }
                }
            })
        }
        $(document).ready(function () {
        })
    </script>
</head>

<body>
    <div class="welcome">
        <div class="form">
            <div class="title">
                <h2 id="formTitle">LOGIN</h1>
                    <div class="message">
                        <p class="message" id="msg"></p>
                    </div>
            </div>
            <div class="inputs">
                <form action="login.php" method="POST" id="form-login" onsubmit="validate(); return valid;">
                    <div class="fields">
                        <div class="username">
                            <input type="text" name="username" id="username" placeholder="Your Username" required>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="password" id='pwd'>
                            <input type="password" name="password" id="password" placeholder="Password" required
                                minlength="8">
                            <br>
                            <p id="description-login" style="float: left; padding-left: 30px; margin-top: 7px; ">Don't
                                have an
                                account? <a class="link" onclick="signup()">Sign up</a></p>
                        </div>
                    </div>
                    <div class="fields" id="submitField">
                        <div class="submit">
                            <!-- <button class="submit" type="submit" name="submit" id="submit" value="GO">GO</button> -->
                            <input type="submit" name="submit" id="submit" value="GO">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    $username = trim($_GET['username']);
    $signup = trim($_GET['signup']);
    $success = trim($_GET['success']);
    if ($username) {
        echo '<script>setInfo("' . $username . '");</script>';
    }
    if ($signup) {
        echo '<script>signup();</script>';
    }
    if ($username && $success) {
        echo '<script>afterSuccess("' . $username . '");</script>';
    }
    ?>
</body>

</html>