<?php
// form submitted
header("Content-Type: application/json; charset=utf8");

$post = json_decode(file_get_contents('php://input', true));

$username = trim($post->username);
$password = trim($post->password);

if ($username && $password) {
    // encrypt password
    $password = md5($password);
    // connect to database
    $server = 'localhost';
    $user = 'php';
    $passwd = 'mygoal4MIT!';
    $dbname = 'room923';
    $conn = new mysqli($server, $user, $passwd, $dbname);
    if ($conn->connect_error) {
        $response->message = 'Database Connection Failed: ' . $conn->connect_error;
        $response->code = '50001';
        $response->token = '';
        exit(json_encode($response));
    }
    // query and respond
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?;");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result) {
        $old_token = $result['token'];
        // if (!empty($old_token)) {
        //     $token = $old_token;
        // } else {
        //     $new_token = gentoken();
        //     $token = $new_token;
        // }
        $token = gentoken();
        $time_out = strtotime('+7 days');
        $updt = $conn->prepare("UPDATE users SET token = ?, time_out = ? WHERE username = ? AND password = ?;");
        $updt->bind_param("ssss", $token, $time_out, $username, $password);
        $success = $updt->execute();
        if ($success) {
            $response->message = 'Login successful';
            $response->code = '60001';
            $response->token = $token;
            exit(json_encode($response));
        } else {
            $response->message = 'Database update failed';
            $response->code = '50003';
            $response->token = '';
            exit(json_encode($response));
        }
    } else {
        $response->message = 'Wrong credentials';
        $response->code = '50004';
        $response->token = '';
        exit(json_encode($response));
    }
} else {
    $response->message = 'Empty Field';
    $response->code = '50002';
    $response->token = '';
    exit(json_encode($response));
}

function gentoken()
{
    $str = md5(uniqid(md5(microtime(true)), true));  //生成一个不会重复的字符串
    $str = sha1($str);  //加密
    return $str;
}
