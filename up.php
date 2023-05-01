<?php
$domain = 'example.com'; //domain you wish to upload to
$stringLen = 5; //set desired length of the random filename

function RandomString($length) { //this function generates random filenames.
    $keys = array_merge(range(0,9), range('a', 'z'));

    $key = '';
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

$target_file = $_FILES["sharex"]["name"]; //uploaded file
$filename = RandomString($stringLen); //stores random filename
$fileType = pathinfo($target_file, PATHINFO_EXTENSION); //stores filetype

if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType)) { //some logs to show if upload is successful or not.
    echo 'upload complete - ' + $domain_url.$sharexdir.$filename.'.'.$fileType;
}
else {
    echo 'upload failed - CHMOD/Folder doesn\'t exist?';
}
?>