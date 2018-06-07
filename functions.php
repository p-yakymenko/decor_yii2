<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}

