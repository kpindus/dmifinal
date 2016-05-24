<?php

namespace App\Controller;


use Cake\ORM\TableRegistry;

class NewsController extends AppController
{
    public $paginate = [
        'maxLimit' => 5,
        'limit' => 5,
        'order' => [
            'News.id' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $newsTable = TableRegistry::get('news');
        $allNews = $newsTable->find('all')->orderDesc(true);
        $allNews = $this->paginate($allNews);
        $this->set(compact(['allNews']));
    }

    public function readNews($newsId){
        if (is_null($newsId) || !(int)$newsId) {
            throw new NotFoundException('New with this id not found');
        }

        $newsTable = TableRegistry::get('news');
        $selectedNews = $newsTable->get($newsId);

        $this->set(compact(['selectedNews']));
    }
}