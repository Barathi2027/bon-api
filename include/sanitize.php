<?php

function filter($string = '')
{
    return htmlspecialchars(strip_tags($string));
}

function camelCaseArray($array = [])
{
    $data = [];
    if (count($array) > 0) {
        foreach ($array as $value) {
            $cc = [];
            foreach ($value as $key => $value) {
                $cc[camelCase($key)] = $value;
            }
            array_push($data, $cc);
        }
    }
    return $data;
}

function camelCase($string = '')
{
    return lcfirst(str_replace('_', '', ucwords($string, '_')));
}

function error($code = 0, $error = '', $message = '')
{
    http_response_code($code);
    echo json_encode([
        ERROR => $error,
        MESSAGE => $message
    ]);
}

function success($code = 0, $message = '', $data = [])
{
    http_response_code($code);
    echo json_encode([
        MESSAGE => $message,
        DATA => $data
    ]);
}