<?php

namespace App\Controller;


use Cake\ORM\TableRegistry;

class GalleryController extends AppController
{
    public function index(){
        $photoTable = TableRegistry::get('photo');
        $allPhoto = $photoTable->find('all')->orderDesc(true);
        $this->set(compact(['allPhoto']));
    }
}