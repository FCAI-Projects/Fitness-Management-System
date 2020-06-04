<?php


namespace PHPMVC\Controllers;

/**
 * Class TrainerController
 * @package PHPMVC\Controllers
 */
class TrainerController extends AbstractController {

    private $trainerModel;

    public function __construct() {
        $this->trainerModel = $this->models('trainer');

    }

    public function defaultAction() {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {

            $data = $this->trainerModel->getMembersForTrainer($_SESSION['id']);
            //var_dump($data);
            $this->view($data);
        } else {
            header('Location: ' . URLROOT);
        }
    }

    public function attendanceAction($id) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
            $this->trainerModel->setAttendance($_SESSION['id'], $id);
            header('Location: ' . URLROOT . '/trainer');
        } else {
            header('Location: ' . URLROOT);
        }
    }

    public function editTrainerAction() {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = ['password' => $_POST['password']];
                $this->trainerModel->edit($data['password'], $_SESSION['id']);
                header('Location: ' . URLROOT . '/trainer');
            } else {
                $data = ['password' => ''];

                $this->view($data);
            }

        } else {
            header('Location: ' . URLROOT);
        }
    }

}