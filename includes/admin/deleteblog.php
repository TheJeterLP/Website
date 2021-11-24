<?php

$a = array();
$a['filename'] = 'admin/deleteblog.php';
$a['title'] = 'Blog Post Löschen';
$a['data'] = array();

if (getUserID($db)) {
    $user = new User(getUserID($db), $db);
    $id = filter_input(INPUT_GET, "id");
    if ($id != null) {
        if (isBlogPost($db, $id)) {
            $post = new blogpost($id, $db);
            $post->delete();

            $a['data']['notification-info'] = 'Der Post wurde gelöscht.';
        } else {
            $a['data']['notification-error'] = 'Kein Post mit der ID ' . $id . ' wurde gefunden';
        }
    } else {
        $a['data']['notification-error'] = 'Keine ID wurde angegeben.';
    }
} else {
    $a['data']['notification-error'] = 'Du bist nicht eingeloggt!';
}

return $a;

