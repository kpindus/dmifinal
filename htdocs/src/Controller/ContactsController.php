<?php

namespace App\Controller;


use Cake\ORM\TableRegistry;

class ContactsController extends AppController
{
    public function index(){
        $contactsTable = TableRegistry::get('contacts');
        $allContacts = $contactsTable->find('all');
        $this->set(compact(['allContacts']));
    }
}