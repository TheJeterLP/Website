<?php

include '../settings.php';
include '../functions.php';

header('Content-Type: application/json');

my_session_start();

$aResult = array();

$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

if ($captcha == null) {
    $aResult['error'] = 'Captcha Fehler.';
} else {
    if ($password == null || $email == null) {
        $aResult['error'] = 'Nicht alles wurde ausgefüllt!';
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
        $responseKeys = json_decode($response, true);

        if ($responseKeys["success"]) {
            $db = new MySQLi($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase);
            $hashed = hash('sha512', $password);
            $sql = 'SELECT ID, password FROM user WHERE email = ?;';
            $stmt = $db->prepare($sql);
            if (!$stmt) {
                $aResult['error'] = $db->error;
            } else {
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();
                if (!$result) {
                    $aResult['error'] = $db->error;
                } else {
                    $row = $result->fetch_assoc();
                    if (isset($row['password'])) {
                        $dbpassword = $row['password'];
                        $dbid = $row['ID'];

                        if ($hashed != $dbpassword) {
                            $aResult['error'] = "Passwort falsch.";
                        } else {
                            $_SESSION['userid'] = $dbid;
                            $aResult['result'] = true;
                        }
                    } else {
                        $aResult['error'] = "Kein Passwort wurde eingegeben!";
                    }
                }
            }
        } else {
            $aResult['error'] = "Fehler beim Captcha!";
        }
    }
}
echo json_encode($aResult);
?>