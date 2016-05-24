<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class AboutController extends AppController{
    public function index(){
        $aboutUsTable = TableRegistry::get('about_us');
        $allRows = $aboutUsTable->find('all');
        $this->set(compact(['allRows']));
    }
}