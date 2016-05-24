<?php


namespace App\Controller;


use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

class LoginController extends AppController
{
    public function index()
    {
        
    }

    public function view_active()
    {
        $this->viewBuilder()->layout('AdminLogin');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $username = $this->request->data['username'];
            $password = $this->request->data['userPassword'];
            if ($this->checkAdminInDataBase($username, $password)) {
                $this->request->session()->write([
                    'session.cookie_name' => 'isLogged',
                    'session.cookie_path' => '/',
                    'session.cookie_domain' => '.dmiband.eu',
                    'session.cookie_lifetime' => 1800
                ]);
                $this->request->session()->start();
                $this->redirect(['controller' => 'Admin', 'action' => 'index']);
            }
            $this->redirect(['controller' => 'Login', 'action' => 'index']);
        }
    }

    protected function checkAdminInDataBase($username, $password){
        $adminTable = TableRegistry::get('admin');
        $result = $adminTable->exists(['admin_email'=> $username, 'admin_password' => $password]);
        if($result == 1){
            return true;
        }
        return false;
    }
}