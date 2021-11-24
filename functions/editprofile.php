<?php

include '../settings.php';
include '../functions.php';
include '../classes/user/user.class.php';

header('Content-Type: application/json');

$aResult = array();

$password = filter_input(INPUT_POST, "password");
$username = filter_input(INPUT_POST, "username");

if ($password == null && $username == null) {
    $aResult['error'] = 'Nicht alles wurde ausgefüllt.';
} else {
    $db = new MySQLi($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase);

    my_session_start();

    if (getUserID($db)) {
        $user = getUser($db);

        //check if user changed his username
        if ($username != null && $username != $user->getUsername()) {
            $sql = 'SELECT ID FROM user WHERE username = ? LIMIT 1;';
            $stmt = $db->prepare($sql);
            if (!$stmt) {
                return $db->error;
            }
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows) {
                $aResult['error'] = 'Dieser Username wird bereits verwendet.';
            } else {
                $stmt->close();
                $user->setUsername($username);
            }
        }

        if ($password != null) {
            $hashed = hash('sha512', $password);
            if ($hashed != $user->getPassword()) {
                $user->setPassword($hashed);
            }
        }

        $user->updateUser();
        $aResult['result'] = true;
    } else {
        $aResult['error'] = 'Du bist nicht eingeloggt!';
    }
}

echo json_encode($aResult);
