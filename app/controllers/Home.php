<?php

class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['users'] = $this->model('User')->getAll();
        $this->view('home/index',$data);
    }
}