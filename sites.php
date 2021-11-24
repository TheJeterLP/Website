<?php

$files = array();
$files['main'] = 'main.php';

$files['impressum'] = 'impressum.php';
$files['imprint'] = 'impressum.php';
$files['datenschutz'] = 'datenschutz.php';
$files['data-protection'] = 'datenschutz.php';

$files['notfound'] = 'notfound.php';
$files['nopermission'] = 'nopermission.php';

$files['motordaten'] = 'motordaten.php';
$files['about'] = 'about.php';
$files['blog'] = 'blog.php';

if ($registration) {
    $files['user/register'] = 'user/register.php';
}
$files['user/login'] = 'user/login.php';
$files['user/logout'] = 'user/logout.php';
$files['user/editprofile'] = 'user/editprofile.php';

$files['admin/write'] = 'admin/write.php';
$files['admin/editblog'] = 'admin/editblog.php';
$files['admin/deleteblog'] = 'admin/deleteblog.php';
?>