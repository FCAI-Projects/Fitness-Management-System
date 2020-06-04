<?php


namespace PHPMVC\models;

use PHPMVC\LIB\Database;

class adminModel {
    private $db;

    public function __construct() {
        $this->db = new Database();

    }

    public function addTrainer($data) {
        $this->db->query('INSERT INTO users(name, email, password, status) VALUES(:name, :email, :password, :status)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':status', '1');
        $this->db->execute();
        $this->db->query('SELECT * FROM users WHERE email = :email AND password = :password');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->execute();
        $id = $this->db->single();
        $this->db->query('INSERT INTO trainer(trainer_id,max_num, start_shift, end_shift) VALUES(:trainer_id, :max_num, :start, :end)');
        $this->db->bind(':trainer_id', $id->id);
        $this->db->bind(':max_num', $data['maxNumber']);
        $this->db->bind(':start', $data['start']);
        $this->db->bind(':end', $data['end']);
        return $this->db->execute();
    }


    public function addMember($data) {
        $this->db->query('INSERT INTO users(name, email, password, status) VALUES(:name, :email, :password, :status)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':status', '2');
        $this->db->execute();
        $this->db->query('SELECT * FROM users WHERE email = :email AND password = :password');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $id = $this->db->single();
        $this->db->query('INSERT INTO member(member_id) VALUES('.$id->id.')');
        return $this->db->execute();
    }

    public function listMembers() {
        if(isset($_GET['search'])) {
            $this->db->query('SELECT users.*, member.* FROM users INNER JOIN member ON member.member_id = users.id WHERE users.status = 2 AND users.name LIKE "%' . $_GET['search'] . '%"');
        } else {
            $this->db->query('SELECT users.*, member.* FROM users INNER JOIN member ON member.member_id = users.id WHERE users.status = 2');
        }
        return $this->db->resultSet();
    }

    public function removeMember($id) {
        $this->db->query('DELETE FROM users WHERE id = ' . $id);
        $this->db->execute();
    }

    public function listTrainers() {
        if(isset($_GET['search'])) {
            $this->db->query('SELECT users.*, trainer.* FROM users INNER JOIN trainer ON users.id = trainer.trainer_id WHERE users.status = 1 AND users.name LIKE "%' . $_GET['search'] . '%"');
        } else {
            $this->db->query('SELECT users.*, trainer.* FROM users INNER JOIN trainer ON users.id = trainer.trainer_id WHERE users.status = 1');
        }
        return $this->db->resultSet();
    }

    public function removeTrainer($id) {
        $this->db->query('DELETE FROM users WHERE id = ' . $id);
        $this->db->execute();
    }

    public function getShift($id) {
        $this->db->query('SELECT * FROM trainer WHERE trainer_id = ' . $id);
        return $this->db->single();
    }

    public function editShift($shift) {
        $this->db->query('UPDATE trainer SET start_shift = "' . $shift['start'] . '", end_shift = "' . $shift['end'] . '" WHERE trainer_id = ' . $shift['id'] );
        $this->db->execute();
    }

    public function getMemberData($id) {
        $this->db->query('SELECT * FROM users WHERE id = ' . $id);
        return $this->db->single();
    }

    public function editMember($info) {
        $this->db->query('UPDATE users SET name = "' . $info['name'] .'", email = "' . $info['email'] . '", password = "' . $info['password'] . '" WHERE id = ' . $info['id']);
        $this->db->execute();
    }

    public function listPackages() {
        $this->db->query('SELECT * FROM packages');
        return $this->db->resultSet();
    }

    public function addPackage($data) {
        $this->db->query('INSERT INTO packages(cost, discount, week_range) VALUES("'. $data['cost'] .'", "'. $data['discount'] .'", "'. $data['range'] .'")');
        $this->db->execute();
    }

    public function removePackage($id) {
        $this->db->query('DELETE FROM packages WHERE id = ' . $id);
        $this->db->execute();
    }

    public function getPackageData($id) {
        $this->db->query('SELECT * FROM packages WHERE id = ' . $id);
        return $this->db->single();
    }


    public function editPackage($package) {
        $this->db->query('UPDATE packages SET cost = ' . $package['cost'] . ', discount = ' . $package['discount'] . ', week_range = '. $package['range'] . ' WHERE id = ' . $package['id']);
        $this->db->execute();
    }

    public function memberData($id) {
        $this->db->query('SELECT * FROM users WHERE id = ' . $id);
        return $this->db->single();
    }

    public function memberPackage($id) {
        $this->db->query('SELECT member.*, packages.* FROM member INNER JOIN packages ON member.package_id = packages.id WHERE member.member_id = ' . $id);
        return $this->db->single();
    }

    public function memberTrainer($id) {
        $this->db->query('SELECT member.*, trainer.*, users.* FROM member INNER JOIN trainer ON trainer.trainer_id = member.trainer_id INNER JOIN users ON users.id = trainer.trainer_id WHERE member.member_id = '. $id);
        return $this->db->single();
    }

    public function memberAttendance($id) {
        $this->db->query('SELECT * FROM attendence WHERE member_id = ' . $id . ' ORDER BY date DESC');
        return $this->db->resultSet();
    }

    public function getFeedbacks() {
        $this->db->query('SELECT feedback.*, m.name as mname, t.name as tname from feedback INNER JOIN users m ON feedback.member_id = m.id INNER JOIN users t ON feedback.trainer_id = t.id');
        return $this->db->resultSet();
    }

    public function feedbackSeen($id) {
        $this->db->query('UPDATE feedback SET notify = 0 WHERE id = '. $id);
        $this->db->execute();
    }

}