<?php

class User {

    private $id;
    private $email;
    private $password;
    private $db;
    private $image;
    private $username;

    public function __construct($id, $db) {
        $sql = "SELECT * FROM user WHERE ID = ?;";

        $stmt = $db->prepare($sql);
        if (!$stmt) {
            die("Constructor user.class.php Query: " . $sql . "Error: " . $db->error);
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            die("Constructor user.class.php Query: " . $sql . "Error: " . $db->error);
        }

        $row = $result->fetch_assoc();

        $this->db = $db;
        $this->id = $id;
        if (isset($row['email'])) {
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->image = $row['logo'];
            $this->username = $row['username'];
        }
        $result->close();
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getImage() {
        return $this->image;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function updateUser() {
        $sql = 'UPDATE user SET username = ?, email = ?, password = ?, logo = ? WHERE ID = ?;';
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            die("updateUser user.class.php Query: " . $sql . "Error: " . $this->db->error);
        }
        $stmt->bind_param('ssssi', $this->username, $this->email, $this->password, $this->image, $this->id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteUser() {
        $sql = 'DELETE FROM user WHERE ID = ?;';
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            die("updateUser user.class.php Query: " . $sql . "Error: " . $this->db->error);
        }
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        $stmt->close();
    }

}
