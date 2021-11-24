<?php

include '../settings.php';
include '../functions.php';
include '../classes/user/user.class.php';
include '../classes/image/image.class.php';

header('Content-Type: application/json');

$aResult = array();

$db = new MySQLi($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase);
my_session_start();

if (getUserID($db)) {
    $user = getUser($db);

    $path = '../img/avatars/' . $user->getId() . '.png';

    if (is_file($path)) {
        unlink($path);
    }

    if ($_FILES['file']['error'] != 0) {
        $errormsg = '';
        switch ($_FILES['file']['error']) {
            case 1:
                $errormsg = 'Die Datei ist zu groß! (Max 4mb)';
            case 2:
                $errormsg = 'Die Datei ist zu groß!';
            case 3:
                $errormsg = 'Fehler beim upload.';
            case 4:
                $errormsg = 'Keine Datei wurde ausgewählt';
            default:
                $errormsg = "Fehler beim Upload! Errorcode: " + $_FILES['file']['error'] + "Debug information: \n" . print_r($_FILES, true);
        }
        $aResult['error'] = $errormsg;
    } else {
        if ($_FILES['file']['type'] != "image/png") {
            $aResult['error'] = 'Die Datei ist kein PNG! TYPE: ' . $_FILES['file']['tmp_name'];
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                $user->setImage('/img/avatars/' . $user->getId() . '.png');
                $user->updateUser();

                $image = new Image();
                $image->load('..' . $user->getImage());
                $image->resize(200, 200);
                $image->save('..' . $user->getImage(), IMAGETYPE_PNG);
                $aResult['result'] = true;
            } else {
                $aResult['error'] = "Die Datei konnte nicht nach " . $path . " verschoben werden.  Debug information: \n" . print_r($_FILES, true);
            }
        }
    }
} else {
    $aResult['error'] = 'Du bist nicht eingeloggt!';
}


echo json_encode($aResult);

