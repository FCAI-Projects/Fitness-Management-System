<?php


namespace PHPMVC\Controllers;


class AdminController extends AbstractController {
    private $adminModel;

    public function __construct() {
        $this->adminModel = $this->models('admin');
    }

    public function defaultAction() {
        $notify = $this->adminModel->getFeedbacks();
        $this->view($notify);
    }

    public function addTrainerAction() {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = ['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password'], 'maxNumber' => $_POST['maxNumber'], 'start' => $_POST['start'], 'end' => $_POST['end']];
                $this->adminModel->addTrainer($data);
                //var_dump($data['start']);
                header('Location: '. URLROOT . '/admin/listtrainers');


            } else {
                $data = ['name' => '', 'email' => '', 'password' => '', 'maxNumber' => '', 'error' => ''];
                $this->view($data);

            }

        } else {
            header('Location: ' . URLROOT);
        }
    }

    public function addMemberAction() {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = ['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password'], 'maxNumber' => $_POST['maxNumber'], 'error' => ''];
                if (!$this->adminModel->addMember($data)) {
                    $data['error'] = 'some thing went wrong';
                    $this->view($data);
                } else {
                    header('Location: '. URLROOT . '/admin/listmembers');
                }


            } else {
                $data = ['name' => '', 'email' => '', 'password' => '', 'maxNumber' => '', 'error' => ''];
                $this->view($data);

            }

        } else {
            header('Location: ' . URLROOT);
        }
    }

    public function listMembersAction() {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            $members = $this->adminModel->listMembers();
            $this->view($members);
        }
    }

    public function removeMemberAction($id) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            $this->adminModel->removeMember($id);
            header('Location: '. URLROOT . '/admin/listmembers');
        }
    }

    public function listTrainersAction() {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            $trainers = $this->adminModel->listTrainers();
            $this->view($trainers);
        }
    }

    public function removeTrainerAction($id) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            $this->adminModel->removeTrainer($id);
            header('Location: '. URLROOT . '/admin/listtrainers');
        }
    }

    public function editTrainerAction($id) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            if (isset($_POST['save']))  {
                $shift = [
                    'id' => $id,
                    'start' => $_POST['start'],
                    'end' => $_POST['end']
                ];

                $this->adminModel->editShift($shift);
                header('Location: '. URLROOT . '/admin/listtrainers');

            } else {

                $shifts = $this->adminModel->getShift($id);
                $this->view($shifts);

            }
        }
    }


    public function editMemberAction($id) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $info = [
                  'id' => $id,
                  'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ];

                $this->adminModel->editMember($info);
                header('Location: '. URLROOT . '/admin/listmembers');

            } else {
                $info = $this->adminModel->getMemberData($id);
                $this->view($info);
            }
        }
    }


    public function listPackagesAction() {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            $packages = $this->adminModel->listPackages();
            $this->view($packages);
        }
    }

    public function addPackageAction() {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            if (isset($_POST['addpackage'])) {
                $package = [
                    'cost' => $_POST['cost'],
                    'discount' => $_POST['discount'],
                    'range' => $_POST['range']
                ];
                $this->adminModel->addPackage($package);
                header('Location: ' . URLROOT . '/admin/listpackages');
            } else {
                $package = [
                    'cost' => 1,
                    'discount' => 0,
                    'range' => 1
                ];
                $this->view($package);
            }
        }
    }

    public function removePackageAction($id) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            $this->adminModel->removePackage($id);
            header('Location: ' . URLROOT . '/admin/listpackages');
        }
    }

    public function editPackageAction($id) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {

            if (isset($_POST['addpackage'])) {
                $package = [
                    'id' => $id,
                    'cost' => $_POST['cost'],
                    'discount' => $_POST['discount'],
                    'range' => $_POST['range']
                ];
                $this->adminModel->editPackage($package);
                header('Location: ' . URLROOT . '/admin/listpackages');
            } else {
                $package = $this->adminModel->getPackageData($id);
                $this->view($package);
            }
        }
    }

    public function profileAction($id) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            $member = [
                'info' => $this->adminModel->memberData($id),
                'package' => $this->adminModel->memberPackage($id),
                'trainer' => $this->adminModel->memberTrainer($id),
                'attendance' => $this->adminModel->memberAttendance($id),
            ];

            $this->view($member);
        }
    }

    public function seenAction($feedid) {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
            $this->adminModel->feedbackSeen($feedid);
            header('Location: ' . URLROOT . '/admin');
        }
    }



}