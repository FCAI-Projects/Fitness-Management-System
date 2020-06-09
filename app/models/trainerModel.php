<?php


namespace PHPMVC\models;

use PHPMVC\LIB\Database;


class trainerModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getMembersForTrainer($id) {

        $this->db->query("SELECT users.*, member.* FROM users INNER JOIN member ON member.member_id = users.id where trainer_id='$id'");
        return $this->db->resultSet();

    }

    public function setAttendance($id, $memeberId) {
        $this->db->query("SELECT * FROM  attendence WHERE member_id ='$memeberId' ORDER BY date DESC");
       
        $data = $this->db->resultSet();
        $attendanceNumber = sizeof($data);
        ++$attendanceNumber;
        
        if (isset($data[0])) {

            $last_date = $data[0]->date;
            $current_date = date("Y/m/d");
            $current_date = strtotime($current_date);
            $last_date = strtotime($last_date);
            if ($current_date > $last_date) {
                $this->db->query('INSERT INTO attendence(trainer_id , member_id) VALUES(:trainer_id, :member_id)');
                $this->db->bind(':trainer_id', $id);
                $this->db->bind(':member_id', $memeberId);
                $this->db->execute();
                $this->db->query('UPDATE member SET attendance_days = ' . $attendanceNumber . ' WHERE member_id = ' . $memeberId);
                $this->db->execute();
                return true;
            }
            return false;

        } else {
            $this->db->query('INSERT INTO attendence(trainer_id , member_id) VALUES(:trainer_id, :member_id)');
            $this->db->bind(':trainer_id', $id);
            $this->db->bind(':member_id', $memeberId);
            $this->db->execute();
            $this->db->query('UPDATE member SET attendance_days = ' . $attendanceNumber . ' WHERE member_id = ' . $memeberId);
            $this->db->execute();
            return true;
        }
    }

    public function edit($password, $id) {
        $this->db->query('UPDATE users SET password = ' . $password . ' WHERE id = ' . $id);
        $this->db->execute();
    }


}