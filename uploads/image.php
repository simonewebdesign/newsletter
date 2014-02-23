<?php
// remember to add the $resource_id and the $user_id to each image. example: image-1.jpg?id=$user_id

include_once '../config.php';
include_once '../db_conn.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$fullPath = $_SERVER['REQUEST_URI'];

// getting the file name and removing the query string, in order to retrieve the original image name
$filename = preg_replace('/\?.*/', '', basename($fullPath));

$entry = $db->prepare("INSERT INTO entries (user_id, resource_id, requested_at, ip_address, user_agent) VALUES (?,?,?,?,?)");

$sql_data = array(
  $id,
  0,
  date("Y-m-d H:i:s"), // 2001-03-10 17:16:18 (the MySQL DATETIME format) -- the standard is: date(DATE_RFC822);
  $_SERVER["REMOTE_ADDR"],
  $_SERVER["HTTP_USER_AGENT"]
);

$entry->execute($sql_data);

//file_put_contents('debug.txt', 'done', FILE_APPEND);

if( headers_sent() ) {
  die('Headers already sent.');
}


//var_dump( file_exists($filename) );
if ( file_exists($filename) ){

  // Parse Info / Get Extension
  $fsize = filesize($filename);
  $path_parts = pathinfo($filename); // to get extension
  $ext = strtolower($path_parts["extension"]);

  // Determine Content Type
  switch ($ext) {
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/force-download";
  }

  header("Content-Type: $ctype");
//  header("Content-Transfer-Encoding: binary"); // remember to upload images in binary mode!

  ob_clean();
  flush();
  readfile($filename);

} else {
  header('HTTP/1.1 404 Not Found');
  die("<h1>404 - File Not Found</h1><p>$filename was not found on this server.</p>");

}
