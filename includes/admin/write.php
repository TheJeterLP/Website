<?php

$a = array();
$a['filename'] = 'admin/write.php';
$a['title'] = 'Neuen Blog Post erstellen.';
$a['custom-js'] = 'writeblog.js';
$a['data'] = array();
$a['data']['write'] = false;

if (getUserID($db)) {
    $user = getUser($db);
    $a['data']['write'] = true;
} else {
    $a['data']['notification-error'] = 'Du bist nicht eingeloggt!';
}

return $a;
