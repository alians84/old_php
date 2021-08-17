
<?php
/**
 * article page template
 */
require_once 'template/menu.php';
global $result;
$out = '';
$out .='<div class="main_article">';
$out .= '<h2>'.$result['title'].'</h2>';
$out .='<table width="100%" cellspacing="0" cellpadding="0">';
$out .= '<tr>';
$out  .= '<td class="leftcol">';
$out .= '<img src="'.SITEURL.'/static/images/'.$result['image'].'"width=500>';
$out .= '</td>';
$out .= '<td valign="top">';
$out .= '<p>'.$result['description'].'</p>';
$out .= '</td>';
$out .= '</tr>';
$out  .= '</table>';
$out .= '</div>';
echo $out;
?>
