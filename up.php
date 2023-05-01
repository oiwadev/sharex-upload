<?php
$domain = 'https://example.com'; //domain you wish to upload to
$stringLen = 5; //length of the file name

function RandomString($length) {
    $keys = array_merge(range(0,9), range('a','z'));

    $key = '';
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

$fileName = RandomString($stringLen);
$target_file = $_FILES["sharex"]["name"];
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$fileName.'.'.$fileType)) {
    echo $domain.$sharexdir.$fileName.'.'.$fileType;
}
else {
    echo 'upload failed';
}
?>