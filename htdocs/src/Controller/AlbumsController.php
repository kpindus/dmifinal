<?php

namespace App\Controller;


use Cake\ORM\TableRegistry;

class AlbumsController extends AppController
{
    public function index(){
        $albumsTable = TableRegistry::get('albums');
        $allAlbums = $albumsTable->find('all')->orderDesc(true);
        $this->set(compact(['allAlbums']));
    }
}