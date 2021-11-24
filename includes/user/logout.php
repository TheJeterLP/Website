<?php

$a = array();
$a['filename'] = 'user/logout.php';
$a['title'] = 'Sign Out';
$a['data'] = array();
$a['custom-js'] = 'logout.js';

if (getUserID($db)) {   
    $a['data']['notification-info'] = 'Logout erfolgreich! Weiterleitung in 5 Sekunden...';
} else {
    $a['data']['notification-error'] = 'Du bist nicht eingeloggt!';
}

return $a;
