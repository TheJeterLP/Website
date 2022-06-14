<?php

$a = array();
$a['filename'] = 'blog.php';
$a['title'] = 'Blog';
$a['data'] = array();
$a['custom-js'] = 'deleteblog.js';
$a['data']['blog'] = array();

$post = filter_input(INPUT_GET, 'post');

if ($post != null) {
    if (!isBlogPost($db, $post)) {
        return showError("Kein Blogpost gefunden!");
    }

    $blogpost = new blogpost($post, $db);
    $a['data']['blog'][$post] = $blogpost;
    $a['title'] = $blogpost->getTitle();
} else {
    $sql = 'SELECT ID FROM blogposts ORDER BY date DESC;';

    $result = $db->query($sql);
    if (!$result) {
        showError($db->error);
    }
   

    if ($result->num_rows) {
        while ($row = $result->fetch_assoc()) {
            $blogpost = new blogpost($row['ID'], $db);
            $a['data']['blog'][$blogpost->getId()] = $blogpost;
        }
    } else {
        $a['data']['notification-info'] = "Es wurden noch keine Blogeinträge erstellt.";
    }
}
return $a;
