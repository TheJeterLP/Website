<?php

$a = array();
$a['filename'] = 'blog.php';
$a['title'] = 'Blog';
$a['data'] = array();

$sql = 'SELECT ID FROM blogposts ORDER BY date DESC;';

$result = $db->query($sql);
if (!$result) {
    showError($db->error);
}

$a['data']['blog'] = array();

if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        $blogpost = new blogpost($row['ID'], $db);
        $a['data']['blog'][$blogpost->getId()] = $blogpost;
    }
}

return $a;
