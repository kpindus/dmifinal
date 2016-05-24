<?php

namespace App\Controller;


use Cake\ORM\TableRegistry;

class AdminContactsController extends AdminController
{
    public function index(){
        $subTitle = "Contacts";

        $contactsTable = TableRegistry::get('contacts');
        $contactsContent = $contactsTable->find()->where(['id' => 1])->orderDesc(true);

        $this->set(compact('subTitle', 'contactsContent'));
    }
    
    public function edit(){
        $contactsTable = TableRegistry::get('contacts');
        $contactsContent = $contactsTable->get(1);
        if($this->request->is('post')){
            $contactsContent->content = $this->request->data['content'];

            if($contactsTable->save($contactsContent)){
                $this->redirect(['controller' => 'AdminContacts', 'action' => 'index']);
            } else {
                throw new RuntimeException("Can't save edited content");
            }
        }
    }

    public function getDataForEdit(){

        if(!$this->request->is('requested')){
            $contactsTable = TableRegistry::get('contacts');
            $contacts = $contactsTable->get(1);
            if(!is_null($contacts)){
                $this->response->body(json_encode($contacts));
                return $this->response;
            }
        }

        throw new NotFoundException('Not found');
    }
}