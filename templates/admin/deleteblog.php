<?php

if (isset($data['notification-info'])) {
    showInfo($data['notification-info']);
}

if (isset($data['notification-error'])) {
    showError($data['notification-error']);
}
