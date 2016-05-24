<?php


namespace App\Controller;


use Cake\ORM\TableRegistry;

class MainController extends AppController
{
    public function index(){
        $newsTable = TableRegistry::get('news');
        $lastNews = $newsTable->find()->where(['new_is_main' => '0'])->orderDesc(true)->limit(3);
        $mainNews = $newsTable->find()->where(['new_is_main' => '1'])->limit(1);
        $this->set(compact(['lastNews', 'mainNews']));
    }
}