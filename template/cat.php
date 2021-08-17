<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
/**
 * category page template
 */
global $result;
global $cat;
echo '<pre>';
//var_dump($result);
//var_dump($cat);
$out = '';
$out .='<div class="main_category">';
$out .= '<h2>Категория:'.$cat['title'].'</h2>';
$out .= '<p>'.$cat['description'].'</p>';
$out .= '</div>';
echo $out;
OutDb($result);
?>
</body>
</html>