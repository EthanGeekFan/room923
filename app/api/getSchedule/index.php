<?php

if (!isset($_GET['token']) || $_GET['token'] != 'yifanyang') {
    $response->message = 'Wrong Execution';
    $response->Code = '38438';
    $response->data = array();
} else {
    $response->message = 'Success';
    $response->Code = '66666';
    $response->data = array('数学', '英语', '语文', '物理', '化学', '生物', '政治', '自习', '自习');
}

echo json_encode($response);
