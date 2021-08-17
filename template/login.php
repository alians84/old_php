<?php
require_once 'config/url.php';
/**
 * login page template
 */

if (isset($_POST['submit'])){
   $user =  login($_POST['login'] , $_POST['password']);
   if ($user) {
       $user = $user[0];
       $hash = md5(generateCode(10));
       $ip = null;
       if (!empty($_POST['ip'])){
           $ip = $_SERVER['REMOTE_ADDR'];
           if ($ip == '::1' || $ip == 'localhost'){
               $ip ='127.0.0.1';
           }
       }
       updateUser($user['id'],$hash,$ip);
       setcookie('id',$user['id'], time()+60*60*24*30,"/");
       setcookie('hash',$hash, time()+60*60*24*30,"/");
       header('Location: '.SITEURL.'/admin');
       var_dump(isset($_COOKIE['id']));

       exit();
   }
}
else {
    echo "<script type='text/javascript'>alert('Вы неправильно ввели логин или пароль!');</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/style.css">
    <title>login</title>
</head>
<body>
<section class="login_section">
    <h2 class="h2_login">Логин</h2>
    <form method="post" class="login_form">
        Login: <input type="text" name="login" class="login_name"  required><br>
        Pass: <input type="password" name="password" class="login_password" required><br>
        Прикреплять к IP: <input type="checkbox" name="ip" class="login_ip"><br>
        <input type="submit"  name="submit" class="login_button" value="Войти">
    </form>

</section>

</body>
</html>
