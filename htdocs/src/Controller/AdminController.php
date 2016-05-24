<?php

namespace App\Controller;

use Cake\View\Helper\SessionHelper;

class AdminController extends AppController
{
    public function initialize()
    {
        $this->request->session()->start();

        if(!isset($_SESSION['session'])){
            $this->redirect(['controller' => 'Login', 'action' => 'index']);
        } else {
            if(!in_array('isLogged', $_SESSION['session'])){
                $this->redirect(['controller' => 'Login', 'action' => 'index']);
            }
        }
    }

    public function view_active()
    {
        $this->viewBuilder()->layout('Admin');
    }

    public function index()
    {
        $this->redirect(['controller' => 'AdminNews', 'action' => 'index']);
    }

    public function logout(){
        $this->request->session()->destroy();
        $this->request->session()->start();
        $this->redirect(['controller' => 'Login', 'action' => 'index']);
    }
}