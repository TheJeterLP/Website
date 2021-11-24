<?php

if (isset($data['notification-info'])) {
    showInfo($data['notification-info']);
    session_unset();
    session_destroy();
}

if (isset($data['notification-error'])) {
    showError($data['notification-error']);
}
?>
