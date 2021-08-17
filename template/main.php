<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/style.css">
    <title>main</title>
</head>
<body>
<?php
/**
 * main page template
 */
require_once 'template/menu.php';
global $result;
echo '<pre>';
//print_r($result);
$out = OutDb($result);
?>
</body>
</html>
