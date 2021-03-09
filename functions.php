<?php

function showInfo($msg) {
    echo '<div class="container has-text-centered"><div id="is-info" class="notification is-info"><button class="delete"></button>' . $msg . '</div></div>';
}

function showError($msg) {
    echo '<div class="container has-text-centered"><div class="notification is-danger"><button class="delete"></button>' . $msg . '</div></div>';
}

/**
 * Prepare database for usage and create needed tables
 * @param MySQLi $db
 * @return boolean
 */
function prepareDB($db) {
    if (!is_object($db)) {
        return false;
    }
    if (!($db instanceof MySQLi)) {
        return false;
    }
}
