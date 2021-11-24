<?php

$ret = array();
$ret['filename'] = 'user/editprofile.php';
$ret['title'] = 'Profil Ändern';
$ret['custom-js'] = 'editprofile.js';
$ret['data'] = array();
$ret['data']['show'] = false;

if (getUserID($db)) {
    $ret['data']['show'] = true;
} else {
    $ret['data']['notification-error'] = 'Du bist nicht eingeloggt!';
}

return $ret;

