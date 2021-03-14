<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require_once '../include/init.php';

if (METHOD == POST) {
    $data = json_decode(file_get_contents('php://input'));
    if (isset($data->username) && $data->username != '' && isset($data->password) && $data->password != '') {
        if ($data->username == "admin" && md5($data->password) == md5("admin@123")) {
            success(200, "Login successfull", NULL);
        } else error(401, "Username / Password wrong", "Username / Password wrong");
    } else error(401, "Username / Password wrong", "Username / Password wrong");
}
