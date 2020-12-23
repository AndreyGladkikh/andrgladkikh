<?php


namespace App\Controller\Page;


use AndrGladkikh\Controller\AbstractController;

class PageController extends AbstractController
{
    public function index()
    {
        $this->render('page/index');
    }
}