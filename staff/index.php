<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require_once '../include/init.php';
require_once '../models/Staff.php';
require_once '../services/staff.php';

if (METHOD == POST) {
    $data = json_decode(file_get_contents('php://input'));
    create($data);
} else if (METHOD == PUT) {
    $data = json_decode(file_get_contents('php://input'));
    $id = isset($_GET['id']) ? $_GET['id'] : NULL;
    update($data, $id);
} else if (METHOD == GET) {
    if (isset($_GET['id'])) readUsingId($_GET['id']);
    else readAll();
}
