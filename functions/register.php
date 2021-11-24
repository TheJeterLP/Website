<?php

use PHPMailer\PHPMailer\PHPMailer;

include '../settings.php';
include '../classes/user/user.class.php';

header('Content-Type: application/json');

$aResult = array();

$passwordfirst = filter_input(INPUT_POST, 'passwordfirst');
$passwordsecond = filter_input(INPUT_POST, 'passwordsecond');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

if ($captcha == null) {
    $aResult['error'] = 'Captcha Fehler.';
} else {
    if ($passwordfirst == null || $passwordsecond == null || $email == null || $username == null) {
        $aResult['error'] = 'Nicht alles wurde ausgefüllt.';
    } else {
        if ($passwordfirst != $passwordsecond) {
            $aResult['error'] = 'Die beiden Passwörter sind nicht identisch.';
        } else {
            $secretKey = "6Lf2BHQaAAAAACU2PDCBbeGuhwbcwHgTh2ROgkes";

            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array('secret' => $secretKey, 'response' => $captcha);

            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            $aResult['response'] = $response;

            $responseKeys = json_decode($response, true);

            if ($responseKeys["success"]) {
                $db = new MySQLi($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase);
                $hashed = hash('sha512', $passwordfirst);

                $sql = 'SELECT ID FROM user WHERE email = ? OR username = ? LIMIT 1;';
                $stmt = $db->prepare($sql);
                if (!$stmt) {
                    $aResult['error'] = $db->error;
                } else {
                    $stmt->bind_param('ss', $email, $username);
                    $stmt->execute();
                    $stmt->store_result();
                    if ($stmt->num_rows) {
                        $aResult['error'] = "Die Email wird bereits verwendet.";
                    } else {
                        $stmt->close();

                        $sql = 'INSERT INTO user(username, email, password) VALUES (?, ?, ?);';
                        $stmt = $db->prepare($sql);
                        if (!$stmt) {
                            $aResult['error'] = "Datenbank Fehler.";
                        } else {
                            $stmt->bind_param('sss', $username, $email, $hashed);
                            if (!$stmt->execute()) {
                                $aResult['error'] = "Datenbank Fehler.";
                            } else {
                                $UserID = $stmt->insert_id;
                                $user = new User($UserID, $db);
                                $stmt->close();
                                $aResult['result'] = true;
                            }
                        }
                    }
                }
            } else {
                $aResult['error'] = "Fehler beim Captcha";
            }
        }
    }
}
echo json_encode($aResult);
?>