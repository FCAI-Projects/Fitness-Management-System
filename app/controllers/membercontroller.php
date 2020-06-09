<?php


namespace PHPMVC\Controllers;


class MemberController extends AbstractController {

    private $memberModel;

    public function __construct() {
        $this->memberModel = $this->models('member');

    }

    public function defaultAction() {
        $data = [
            'trainer' => $this->memberModel->getTrainer(),
            'user' => $this->memberModel->getUserDetail(),
        ];
        $this->view($data);
    }

    public function trainersAction() {
        $data = [
            'trainers' => $this->memberModel->listTrainers(),
            'member_trianer_id' => $this->memberModel->getMemberTrainerId(),
        ];
        $this->view($data);
    }

    public function selectTrainerAction($id) {
        $this->memberModel->addTrainer($id);
        header('Location: ' . URLROOT . '/member');
    }

    public function packagesAction() {
        $data = [
            'packages' => $this->memberModel->listPackages(),
            'member_package_id' => $this->memberModel->getMemberPackageId(),
        ];
        $this->view($data);
    }

    public function selectPackageAction($id) {
        $check = $this->memberModel->addPackage($id);
        if ($check == false) {
            die('You don\'t have enough money :(');

        } else {
            header('Location: ' . URLROOT . '/member');
        }
    }


    public function paymentAction() {
        if (isset($_POST['save'])) {
            $info = [
                'visa' => $_POST['visa'],
                'pin' => $_POST['pin'],
                'money' => $_POST['money']
            ];

            $this->memberModel->setPayment($info);
            header('Location: ' . URLROOT . '/member/payment');

        } else {
            $db = $this->memberModel->getPyament();
            if ($db) {
                $info = [
                    'visa' => $db->visa_number,
                    'pin' => $db->code,
                    'money' => $db->money
                ];
            } else {
                $info = [
                    'visa' => '',
                    'pin' => '',
                    'money' => ''
                ];
            }

            $this->view($info);
        }
    }

    public function changePhotoAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $photoName = $_FILES['photo']['name'];
            $photoSize = $_FILES['photo']['name'];
            $photoTmp = $_FILES['photo']['tmp_name'];
            $photoType = $_FILES['photo']['type'];
            $photoAllowedExtention = array('jpeg', 'jpg', 'png', 'gif');
            $photoExtention = explode('.', $photoName);
            $photoExtention = end($photoExtention);
            $photoExtention = strtolower($photoExtention);
            if (!in_array($photoExtention, $photoAllowedExtention) && !empty($photoName)) {
                die('Sorry, The Extention Not Allowed :(');
            } else {
                $randomNum = rand(0, 1000);
                move_uploaded_file($photoTmp, 'img/' . $randomNum . '_' . $photoName);
                $photo = $randomNum . '_' . $photoName;
                $this->memberModel->updatePhoto($photo);
                header('Location: ' . URLROOT . '/member');
            }
        }
    }


    public function feedbackAction() {
        if (isset($_POST['submit'])) {
            $feedback = $_POST['feedback'];
            $this->memberModel->addFeedback($feedback);
            header('Location: ' . URLROOT . '/member');
        }
    }

}