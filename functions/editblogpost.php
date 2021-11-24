<?php

include '../settings.php';
include '../functions.php';
include '../classes/user/user.class.php';
include '../classes/blog/blogpost.class.php';

header('Content-Type: application/json');

$aResult = array();

$text = filter_input(INPUT_POST, 'text');
$title = filter_input(INPUT_POST, 'title');
$id = filter_input(INPUT_POST, 'id');

if ($text == null || $title == null || $id == null) {
    $aResult['error'] = 'Nicht alle Daten wurden ausgefüllt.';
} else {
    $text = trim($text);
    $title = trim($title);
    if ($text == '' || $title == '') {
        $aResult['error'] = "Nicht alle Daten wurden ausgefüllt.";
    } else {
        $db = new MySQLi($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase);
        my_session_start();
        if (getUserID($db)) {
            $user = getUser($db);
            if (isBlogPost($db, $id)) {
                $blog = new blogpost($id, $db);
                $blog->setText($text);
                $blog->setTitle($title);
                $blog->update();
                $aResult['result'] = true;
            } else {
                $aResult['error'] = "Kein Post mit dieser ID gefunden.";
            }
        } else {
            $aResult['error'] = "Du bist nicht eingeloggt.";
        }
    }
}

echo json_encode($aResult);
