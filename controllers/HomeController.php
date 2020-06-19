<?php
require_once 'BaseController.php';

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->folder = '';
    }

    public function index()
    {
        $data = [
            'slogan' => 'Welcome to your Life',
        ];

        $this->render('home', $data);
    }

    public function error()
    {
        $this->render('error');
    }
}
