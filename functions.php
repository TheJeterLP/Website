<?php

function showInfo($msg) {
    echo '<div class="container has-text-centered"><div id="is-info" class="notification is-info"><button class="delete"></button>' . $msg . '</div></div>';
}

function showError($msg) {
    echo '<div class="container has-text-centered"><div class="notification is-danger"><button class="delete"></button>' . $msg . '</div></div>';
}
