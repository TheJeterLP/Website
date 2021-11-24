<?php

include '../settings.php';
include '../functions.php';
include '../classes/user/user.class.php';
include '../classes/blog/blogpost.class.php';

header('Content-Type: application/json');

$aResult = array();

$id = filter_input(INPUT_POST, 'id');

if ($id == null) {
    $aResult['error'] = 'Nicht alle Daten wurden ausgefüllt.';
} else {
    $db = new MySQLi($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase);
    my_session_start();
    if (getUserID($db)) {
        $user = getUser($db);
        if (isBlogPost($db, $id)) {
            $post = new blogpost($id, $db);
            $post->delete();
            $aResult['result'] = true;
        } else {
            $aResult['error'] = "Kein Post mit dieser ID gefunden.";
        }
    } else {
        $aResult['error'] = "Du bist nicht eingeloggt.";
    }
}

echo json_encode($aResult);
