<?php
/**
 * register page template
 */
if (isset($_POST['submit'])){
    $err = [];
    if (strlen($_POST['login']) < 4 && strlen($_POST['login'] > 30)){
        $err[] = "Логин не меньше 4 и не больше 30";
    }
    if (isLoginExist($_POST['login'])){
        $err[] = "Логин существует";
    }
    if (count($err) === 0){
        createUsers($_POST['login'],$_POST['password']);
        header('Location: '.SITEURL.'/login');
        exit();
    }
    else {
        echo '<h4>Error registers</h4>';
        foreach ($err as $error) {
            echo $error.'<br>';
        }
    }
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
    <title>register</title>
</head>
<body>
<section class="register_section">
    <h2 class="register_h2">Регистрация</h2>
    <form method="post" class="register_form">
        Login: <input type="text" class="register_name" name="login" required><br>
        Pass: <input type="password"  class="regisret_pass" name="password" required><br>
        <input type="submit"  name="submit" class="register_button" value="Регистрация">
    </form>

</section>

</body>
</html>
