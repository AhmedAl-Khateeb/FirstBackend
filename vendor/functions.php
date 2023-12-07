<?php


define("BASE_URL" , "http://localhost/Back-end/shoppaing/admin/");

function url($var = null) {

    return BASE_URL . $var;
}





function path($var = null) {
    echo "<script>
    window.location.replace('http://localhost/Back-end/shoppaing/admin/app/$var')
        </script>";
}



// path to off after sign out
function pathwithout($var = null) {
    echo "<script>
    window.location.replace('http://localhost/Back-end/shoppaing/admin/$var')
        </script>";
}


function auth(){
    if (!$_SESSION['admin']) {
        pathwithout('pages-login.php');
      }
}




// filter
function filterValidattion($input){
    $input = trim($input);
    $input = strip_tags($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);

    return $input;
}



// Validation on String

function stringValidtion ($input , $size = null) {
    $empty = empty($input);
    $length = strlen($input) < $size;

    if ($empty == true || $length == true) {
        return true;
    }else{
        return false;
    }
}


// Number Validation
function numberValidtion ($input , $size = 3) {
    $empty = empty($input);
    $isNagtive = $input < 0;
    $isNumber = filter_var($input , FILTER_VALIDATE_FLOAT) == false;

    if ($empty == true || $isNagtive == true || $isNumber == true) {
        return true;
    }else{
        return false;
    }
}


// Validation File Size

function fileSizeValidation($imageName , $imageSize , $yourSize = 2) {
    // for qsma to miga pyts
    $size = ($imageSize / 1024) / 1024;

    $bigSize = $size > $yourSize;
    $empty = empty($imageName);

    if ($bigSize == true || $empty == true) {
         return true;
    }else{
        return false;
    }
}


function fileTypeValidation($file_type , $type1=null , $type2=null, $type3=null , $type4 = null) {
    if ($file_type == "$type1" || $file_type == "$type2" || $file_type == "$type3" || $file_type == "$type4") {
        return false;
    }else{
        return true;
    }
}