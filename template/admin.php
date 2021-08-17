<?php
require_once 'config/url.php';
/**
 * admin page template
 */
global $result;
if (!getUser()){
    header('Location: '.SITEURL.'/login');
}
$out = '';
for ($i = 0;$i < count($result);$i++){
    $out .= '<section class="admin_section">';
    $out .= '<div class="admin_form">';
    $out .= '<p>'.$result[$i]['title'].'</p>';
    $out .= '<img src="'.SITEURL.'/static/images/'.$result[$i]['image'].'" width=300>';
    $out .= '<div class="admin_button">';
    $out .= '<div class="delete"><a href="'.SITEURL.'/admin/delete/'.$result[$i]['id'].'" onclick="return confirm(\'Точно???\')">delete</a></div>';
    $out .= '<div class="update"><a href="'.SITEURL.'/admin/update/'.$result[$i]['id'].'" onclick="return confirm(\'Точно???\')">update</a></div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</section>';
}
require_once 'template/menu.php';
?>



