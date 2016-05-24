<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Symfony\Component\Console\Exception\RuntimeException;

class AdminAboutUsController extends AdminController
{
    public function index(){
        $subTitle = "About Us";
        $aboutUs = TableRegistry::get('about_us');
        $aboutUsContent = $aboutUs->find()->where(['id' => 1])->orderDesc(true);;
        $this->set(compact('subTitle', 'aboutUsContent'));
    }

    public function edit(){
        $aboutTable = TableRegistry::get('about_us');
        $aboutUsContent = $aboutTable->get(1);
        if($this->request->is('post')){
            $aboutUsContent->content = $this->request->data['content'];

            if($aboutTable->save($aboutUsContent)){
                $this->redirect(['controller' => 'AdminAboutUs', 'action' => 'index']);
            } else {
                throw new RuntimeException("Can't save edited content");
            }
        }
    }

    public function getDataForEdit(){

        if(!$this->request->is('requested')){
            $aboutTable = TableRegistry::get('about_us');
            $aboutUs = $aboutTable->get(1);
            if(!is_null($aboutUs)){
                $this->response->body(json_encode($aboutUs));
                return $this->response;
            }
        }

        throw new NotFoundException('Not found');
    }
}