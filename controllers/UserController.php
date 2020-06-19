<?php

require_once './models/user.php';
require_once 'BaseController.php';

class UserController extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->folder = '';
        $this->user = new User();
    }

    /**
     * Display user list
     */
    public function list()
    {
        $data = $this->user->getUsers();
        $this->render('list', $data);
    }

    /**
     * Add new user
     */
    public function add()
    {
        if (empty($_POST)) {
            $this->render('add');
        } else {
            $this->user->store($_POST);
            header('Location: index.php?controller=user&action=list');
        }
    }

    public function edit()
    {
        if (empty($_POST)) {
            $data = $this->user->getUserById($_GET['id']);
            if (!empty($data)) {
                $this->render('edit', $data);
            } else {
                header('Location: index.php?controller=user&action=list');
            }
        } else {
            $this->user->editUserById($_GET['id'], $_POST);
            header('Location: index.php?controller=user&action=list');
        }
    }

    public function delete()
    {
        if (!empty($_GET['id'])) {
            $this->user->delete($_GET['id']);
        }
        header('Location: index.php?controller=user&action=list');
    }

    public function error()
    {
        $this->render('error');
    }
}
