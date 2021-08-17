<?php
//define('SITEURL', 'http://localhost/phpstage_project');
function OutDb($res)
{
    global $route;
    $out = '';
    for ($i = 0; $i < count($res); $i++) {
        $out .= '<div class="main_title">';
        $out .= '<h2>' . $res[$i]['title'] . '</h2>';
        $out .= '<table width="100%" cellspacing="0" cellpadding="0">';
        $out .= '<tr>';
        $out .= '<td class="leftcol">';
        if ($route[0] == '') {
            $out .= '<img src="' . SITEURL . '/static/images/' . $res[$i]['image'] . '"width=500>';
        } elseif ($route[0] == 'cat' && isset($route[1])) {
            $out .= '<img src="' . SITEURL . '/static/images/' . $res[$i]['image'] . '"width=500>';

        }
        $out .= '</td>';
        $out .= '<td valign="top">';
        $out .= '<p>' . $res[$i]['descr_min'] . '</p>';
        $out .= '</td>';
        $out .= '</tr>';
        $out .= '</table>';
        $out .= '<div class="main_a"><a href="' . SITEURL . '/article/' . $res[$i]['url'] . '">Читать полностью</a></div>';
        $out .= '</div>';
    }
    echo $out;
}

function explodeUrl($url)
{
    return explode('/', $url);
}

function getArticle($url)
{
    $query = "SELECT * FROM info WHERE url='" . $url . "'";
    return select($query)[0];

}

//доделать проверку , css ,и посмотреть видео ещераз , так как , уже был сонным , может не запомню!!!!
function getCategory($url)
{
    $query = "SELECT * FROM category WHERE url='" . $url . "'";
    return select($query)[0];
}

function getCategoryArticle($cid)
{
    $query = "SELECT * FROM info WHERE cid=" . $cid;
    return select($query);
}

function isLoginExist($login)
{
    $query = "SELECT login from users where login='" . $login . "'";
    $result = select($query);
    if (count($result) === 0) return false;
    return true;
}

function createUsers($login, $password)
{
    $password = md5(md5(trim($password)));
    $login = trim($login);
    $query = "INSERT INTO users SET login='" . $login . "', password='" . $password . "'";
    return execQuery($query);
}

function login($login, $password)
{
    $password = md5(md5(trim($password)));
    $login = trim($login);
    $query = "SELECT id, login from users WHERE login='" . $login . "' AND password='" . $password . "'";
    $result = select($query);
    if (count($result) != 0) return $result;
    return false;
}

function generateCode($length = 7)
{
    $chars = "qwertyuiasdfdkafAJDFKADFDHGAF1231234733843284";
    $code = '';
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}

function updateUser($id, $hash, $ip)
{
    if (is_null($ip)) {
        $query = "UPDATE users SET hash='" . $hash . "' WHERE id=" . $id;
    } else {
        $query = "UPDATE users SET hash='" . $hash . "',ip=INET_ATON('" . $ip . "') WHERE id=" . $id;
    }
    return execQuery($query);
}

function getUser()
{
    $ip = '';//для $_SERVER['REMOTE_ADDR']  так как у меня ::1 ip servera
    if (isset($_COOKIE['id']) && isset($_COOKIE['hash'])) {
        $query = "SELECT id, login, hash, INET_NTOA(ip) as ip FROM users WHERE id=" . intval($_COOKIE['id']) . " LIMIT 1";
        $user = select($query);
        if (count($user) === 0) {
            return false;
        } else {
            $user = $user[0];
            if ($user['hash'] !== $_COOKIE['hash']) {
                clearCookie();
                return false;
            }
            if (!is_null($user['ip'])) {
                if ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == 'localhost') {
                    $ip = '127.0.0.1';
                }

                if ($user['ip'] !== $ip) {
                    clearCookie();
                    return false;
                }
            }
            $_GET['login'] = $user['login'];
            return true;
        }
    } else {
        clearCookie();
        return false;
    }
}

function clearCookie()
{
    setcookie('id', "", time() - 60 * 60 * 24 * 30, "/");
    setcookie('hash', "", time() - 60 * 60 * 24 * 30, "/", null, null, true);
    unset($_GET['login']);
}

function createArticle($title, $url, $descr_min, $description, $cid, $image)
{
    $query = "INSERT INTO info (title,url,descr_min,description,cid,image) VALUES ('" . $title . "','" . $url . "','" . $descr_min . "','" . $description . "'," . $cid . ",'" . $image . "')";
    return execQuery($query);
}

function updateArticle($id,$title, $url, $descr_min, $description, $cid, $image)
{
    $query = "UPDATE info SET title='".$title. "',url='" . $url . "',descr_min='" . $descr_min . "',description='" . $description . "',cid=" . $cid . ",image='" . $image . "' WHERE id=".$id;
    return execQuery($query);
}

function logout(){
    clearCookie();
    header('Location: '.SITEURL.'/');
}
?>
