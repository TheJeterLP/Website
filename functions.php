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

    $sql = "CREATE TABLE IF NOT EXISTS user ("
            . "ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT, "
            . "username varchar(64) NOT NULL, "
            . "email varchar(64) NOT NULL, "
            . "password varchar(128) NOT NULL DEFAULT 'EMPTY', "           
            . "logo varchar(265) NOT NULL DEFAULT '/img/avatars/default.png'"
            . ");";
    $db->query($sql)or die(mysqli_error($db));
    
    $sql = "CREATE TABLE IF NOT EXISTS blogposts ("
            . "ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT, "
            . "title varchar(64) NOT NULL, "
            . "date datetime NOT NULL, "
            . "text TEXT NOT NULL, "
            . "authorID INTEGER NOT NULL"
            . ");";
    $db->query($sql)or die(mysqli_error($db));
}

function isUser($id, $db) {
    if (!is_object($db)) {
        return false;
    }
    if (!($db instanceof MySQLi)) {
        return false;
    }

    $sql = 'SELECT email FROM user WHERE ID = ?;';
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        die("isUser 1 functions.php Query: " + $sql + "Error: " + $db->error);
    }
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($email);
    if (!$stmt->fetch()) {
        $stmt->close();
        return false;
    } else {
        $stmt->close();
        return true;
    }
}

/**
 * if the user is not loggedin, it returns false. Else the UserID
 * @return boolean|integer
 */
function getUserID($db) {
    if (!isset($_SESSION['userid'])) {
        return false;
    }
    $userid = $_SESSION['userid'];

    $user = new User($userid, $db);
    return $userid;
}

function my_session_start($timeout = 1440) {
    ini_set('session.gc_maxlifetime', $timeout);
    session_start();

    if (isset($_SESSION['timeout_idle']) && $_SESSION['timeout_idle'] < time()) {
        session_destroy();
        session_start();
        session_regenerate_id();
        $_SESSION = array();
    }

    $_SESSION['timeout_idle'] = time() + $timeout;
}

function getUser($db) {
    return new User(getUserID($db), $db);
}

function isBlogPost($db, $id) {
    if (!is_object($db)) {
        return false;
    }
    if (!($db instanceof MySQLi)) {
        return false;
    }

    $sql = 'SELECT title FROM blogposts WHERE ID = ?;';
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        die("isBlogPost 1 functions.php Query: " + $sql + "Error: " + $db->error);
    }
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($blogpostID);
    if (!$stmt->fetch()) {
        $stmt->close();
        return false;
    } else {
        $stmt->close();
        return true;
    }
}