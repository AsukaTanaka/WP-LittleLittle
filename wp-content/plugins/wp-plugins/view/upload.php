<?php
$accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com");

$imageFolder = "/wp-uploads/files/content/";

reset ($_FILES);
$temp = current($_FILES);
 if (is_uploaded_file($temp['tmp_name'])){
    if (isset($_SERVER['HTTP_ORIGIN'])) {

    if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
    } else {
        header("HTTP/1.0 403 Origin Denied");
        return;
    }
}

// Sanitize input
if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
    header("HTTP/1.0 500 Invalid file name.");
    return;
}

// Verify extension
if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), 
array("jpeg", "jpg", "png"))) {
    header("HTTP/1.0 500 Invalid extension.");
    return;
}

// Accept upload if there was no origin, or if it is an accepted origin
$filetowrite = $imageFolder . $temp['name'];
move_uploaded_file($temp['tmp_name'], $filetowrite);

// Respond to the successful upload with JSON.
// Use a location key to specify the path to the saved image resource.
// { location : '/your/uploaded/image/file'}
echo json_encode(array('location' => $filetowrite));
} else {
// Notify editor that the upload failed
header("HTTP/1.0 500 Server Error");
}
