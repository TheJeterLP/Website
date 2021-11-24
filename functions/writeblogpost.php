<?php

include '../settings.php';
include '../functions.php';
include '../classes/user/user.class.php';

header('Content-Type: application/json');

$aResult = array();

$text = filter_input(INPUT_POST, 'text');
$title = filter_input(INPUT_POST, 'title');

if ($text == null || $title == null) {
    $aResult['error'] = 'Nicht alles wurde ausgefüllt';
} else {

    $text = trim($text);
    $title = trim($title);
    if ($text == '' || $title == '') {
        $aResult['error'] = "Nicht alles wurde ausgefüllt";
    } else {
        $db = new MySQLi($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase);
        my_session_start();
        if (getUserID($db)) {
            $user = getUser($db);
            $sql = 'INSERT INTO blogposts(title, date, text, authorID) VALUES (?, ?, ?, ?);';
            $stmt = $db->prepare($sql);

            if (!$stmt) {
                $aResult['error'] = $db->error;
            }

            $date = date('Y-m-d H:i:s');
            $userid = $user->getId();

            $stmt->bind_param('sssi', $title, $date, $text, $userid);

            if (!$stmt->execute()) {
                $aResult['error'] = $stmt->error;
            }

            $NewsID = $stmt->insert_id;
            $aResult['result'] = true;
            $stmt->close();
        } else {
            $aResult['error'] = "Du bist nicht eingeloggt.";
        }
    }
}

echo json_encode($aResult);
