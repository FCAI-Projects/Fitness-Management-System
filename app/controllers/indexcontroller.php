<?php

namespace PHPMVC\Controllers;

class IndexController extends AbstractController
{
    private $indexModel;
    public function __construct()
    {
        $this->indexModel= $this->models('index');

    }

    public function defaultAction() {

        if (isset($_SESSION['status'])) {
           // echo '<br>','hey','<br>';
            if ($_SESSION['status'] == 0) {
                header('Location: '. URLROOT . '/admin');
            } elseif ($_SESSION['status'] == 1) {
                header('Location: '. URLROOT . '/trainer');
            } elseif ($_SESSION['status'] == 2) {
                header('Location: '. URLROOT . '/member');
            }
        } else {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = ['email' => $_POST['email'], 'password' => $_POST['password'], 'error' => ''];
                $result = $this->indexModel->login($data['email'], $data['password']);

                if ($result) {
                    $_SESSION['id'] = $result->id;
                    $_SESSION['status'] = $result->status;
                    $_SESSION['name'] = $result->name;
                    $_SESSION['email'] = $result->email;
                    header('Location: '. URLROOT. '/index');
                } else {
                    $data['error'] = 'Some thing wrong with the credentials';
                    $this->view($data);
                }
            } else {
                $data = ['email' => '', 'password' => '', 'error' => ''];
                $this->view($data);
            }
        }


    }

    public function logoutAction()
    {
        unset($_SESSION['id']);
        unset($_SESSION['status']);
        unset($_SESSION['name']);
        session_destroy();
        header('Location: ' . URLROOT . '/index');
    }
}