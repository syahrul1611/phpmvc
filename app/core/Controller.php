<?php
class Controller
{
    /**
     * Calling view page.
     * @param string $view Path of view file in views folder.
     * @param array $data Data that sended to view file,
     * you can set title in page by sending $data['title'] by default is config('name.app').
     * @return view Return page of view.
     */
    public function view($view,$data = [])
    {
        if (!isset($data['title'])) {
            $data['title'] = config('name.app');
        }
        require_once '../app/views/template/main.php';
    }

    /**
     * Calling class model.
     * @param string $model Path of model file in models folder.
     * @return object Return object of model.
     */
    public function model($model)
    {
        require_once '../app/models/'.$model.'.php';
        return new $model;
    }
}