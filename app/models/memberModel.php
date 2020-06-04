<?php


namespace PHPMVC\models;


use PHPMVC\LIB\Database;

class memberModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function listTrainers() {
        $this->db->query('SELECT users.*, trainer.* FROM users INNER JOIN trainer ON users.id = trainer.trainer_id WHERE users.status = 1 ORDER BY users.date DESC');
        return $this->db->resultSet();
    }

    public function addTrainer($id) {
        $this->db->query('UPDATE member SET trainer_id = ' . $id . ' WHERE member_id = ' . $_SESSION['id']);
        $this->db->execute();
        $this->db->query('UPDATE trainer SET cur_num = cur_num + 1 WHERE trainer_id = ' . $id);
        $this->db->execute();

    }

    public function getMemberTrainerId() {
        $this->db->query('SELECT trainer_id FROM member WHERE member_id = ' . $_SESSION['id']);
        return $this->db->single();
    }

    public function listPackages() {
        $this->db->query('SELECT * FROM packages ORDER BY week_range DESC');
        return $this->db->resultSet();
    }

    public function getMemberPackageId() {
        $this->db->query('SELECT package_id FROM member WHERE member_id = ' . $_SESSION['id']);
        return $this->db->single();
    }


    public function addPackage($id) {
        $this->db->query('SELECT * FROM packages WHERE id = ' . $id);
        $cost = $this->db->single();

        $this->db->query('SELECT * FROM payment WHERE member_id = ' . $_SESSION['id']);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            return false;
        } else {
            $money = $this->db->single();

            if ($money->money >= ($cost->cost - (($cost->discount/100) * $cost->cost)))  {
                $this->db->query('UPDATE payment SET money = money - '. ($cost->cost - (($cost->discount/100) * $cost->cost)) .' WHERE member_id = ' . $_SESSION['id']);
                $this->db->execute();

                $this->db->query('UPDATE member SET package_id = ' . $id . ' WHERE member_id = ' . $_SESSION['id']);
                $this->db->execute();
                return true;
            } else {
                return false;
            }
        }
    }

    public function getPyament() {
        $this->db->query('SELECT * FROM payment WHERE member_id = ' . $_SESSION['id']);
        return $this->db->single();
    }

    public function setPayment($info) {
        $this->db->query('SELECT * FROM payment WHERE member_id = ' . $_SESSION['id']);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            $this->db->query('INSERT INTO payment(member_id, visa_number, code, money) VALUES('. $_SESSION['id'] .', '. $info['visa'] .', ' . $info['pin'] . ', ' . $info['money'] .')');
            $this->db->execute();
        } else {
            $this->db->query('UPDATE payment SET visa_number = ' . $info['visa'] . ', code = ' . $info['pin'] . ', money = ' . $info['money'] . ' WHERE member_id = ' . $_SESSION['id']);
            $this->db->execute();
        }

    }

    public function getTrainer() {
        $trainer_id = $this->getMemberTrainerId();
        if ($trainer_id->trainer_id != NULL) {
            $this->db->query('SELECT * from users WHERE id = ' . $trainer_id->trainer_id);
            return $this->db->single();
        } else {
            return false;
        }

    }


    public function getUserDetail() {
        $this->db->query('SELECT * FROM users WHERE id = ' . $_SESSION['id']);
        return $this->db->single();
    }

    public function updatePhoto($photo) {
        $this->db->query('UPDATE users SET avatar = "' . $photo . '" WHERE id = ' . $_SESSION['id']);
        $this->db->execute();
    }


    public function addFeedback($feedback) {
        $trainer = $this->getMemberTrainerId();
        if ($trainer == NULL) {
            return false;
        } else {
            $this->db->query('INSERT INTO feedback(member_id, trainer_id, feedback) VALUES('. $_SESSION['id'] .', '. $trainer->trainer_id .', "'. $feedback .'")');
            $this->db->execute();
            return true;
        }

    }

}