<?php

$a = array();
$a['filename'] = 'admin/editblog.php';
$a['title'] = 'Blog Post bearbeiten';
$a['custom-js'] = 'editblog.js';
$a['data'] = array();
$a['data']['edit'] = false;

if (getUserID($db)) {
    $user = getUser($db);
    $id = filter_input(INPUT_GET, "id");
    if ($id != null) {
        if (isBlogPost($db, $id)) {
            $post = new blogpost($id, $db);
            $a['data']['edit'] = true;
            $a['data']['blog'] = $post;
        } else {
            $a['data']['notification-error'] = 'Kein Blog Post mit passender ID gefunden.';
        }
    } else {
        $a['data']['notification-error'] = 'Keine ID gesendet.';
    }
} else {
    $a['data']['notification-error'] = 'Du bist nicht eingeloggt!';
}

return $a;

