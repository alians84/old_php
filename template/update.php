<?php
/**
 * update page template
 */
$action = "update";
if (isset($_POST['submit'])){
    $title = trim($_POST['title']);
    $url = trim($_POST['url']);
    $descr_min = trim($_POST['descr_min']);
    $description = trim($_POST['description']);
    $cid = $_POST['cid'];
if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name']!=''){
    move_uploaded_file($_FILES['image']['tmp_name'],'static/images/'.$_FILES['image']['name']);
    $image = $_FILES['image']['name'];
}else{
    $image = $result['image'];
    }

    $id = $route[2];

    $update = updateArticle($id,$title,$url,$descr_min,$description,$cid,$image);
    if ($update){
        setcookie('alert','update ok', time()+60*10);
        header('Location: '.$_SERVER['REQUEST_URI']);
    }else{
        setcookie('alert','UPDATE  error', time()+60*10);
        header('Location: '.$_SERVER['REQUEST_URI']);

    }

}
if (isset($_COOKIE['alert'])){
    $alert = $_COOKIE['alert'];
    setcookie('alert', '', time()-60*10);
    unset($_COOKIE['alert']);
    echo "<script type='text/javascript'>alert(' .$alert.');</script>";

}

?>
<?php
require_once 'template/menu.php';
require_once 'template/_form.php';
?>
