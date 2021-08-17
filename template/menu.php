<html lang="en">
<head>
    <meta charset="utf-8">
    <?php echo '<link rel="stylesheet" href="'.SITEURL.'/static/css/style.css">';?>
    <title>/</title>
</head>
<body>
<div class="menu-wrap">
    <?php
      echo '<ul>';
        echo '<li><a href="'.SITEURL.'/">Home</a></li>';
        echo '<li><a href="'.SITEURL.'/register">register</a></li>';
        echo '<li><a href="'.SITEURL.'/login">login</a></li>';
    if (!($route[0] == '') && !($route[0] == 'article' && isset($route[1]))){
            echo '<li><a href="'.SITEURL.'/admin/create">Create</a></li>';
            echo '<li><a href="'.SITEURL.'/logout">logout</a></li>';
            echo '<br>';
        }
        if ($route[0] == 'admin' && $route[1] == ''){

            echo $out;

        }

    echo '</ul> ';
    ?>
</div>
</body>
</html>