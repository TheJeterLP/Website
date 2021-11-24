<?php

class blogpost {

    private $id;
    private $title;
    private $date;
    private $text;
    private $db;
    private $author;

    public function __construct($id, $db) {
        $sql = "SELECT * FROM blogposts WHERE ID = ?;";

        $stmt = $db->prepare($sql);
        if (!$stmt) {
            die("Constructor blogpost.class.php Query: " . $sql . "Error: " . $db->error);
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        $this->db = $db;
        $this->id = $id;
        $this->title = $row['title'];
        $this->date = $row['date'];
        $this->text = $row['text'];
        $this->author = $row['authorID'];


        /* free results */
        $stmt->free_result();

        /* close statement */
        $stmt->close();
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDate() {
        return $this->date;
    }

    public function getText() {
        return $this->text;
    }

    public function getAuthor() {
        $user = new User($this->author, $this->db);
        return $user;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function delete() {
        $sql = 'DELETE FROM blogposts WHERE ID = ?;';
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            die("delete(1) blogpost.class.php Query: " . $sql . "Error: " . $this->db->error);
        }
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
    }

    public function update() {
        $sql = 'UPDATE blogposts SET title = ?, text = ? WHERE ID = ?;';
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            die("update() blogpost.class.php Query: " . $sql . "Error: " . $this->db->error);
        }
        $stmt->bind_param('ssi', $this->title, $this->text, $this->id);
        $stmt->execute();
        $stmt->close();
    }

}
