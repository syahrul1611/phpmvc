<?php
class Controller
{
    /**
     * Calling view page.
     * @param string $view Path of view file in views folder.
     * @param array $data Data that sended to view file,
     * you can set title in page by sending $data['title'] by default is config('APP_NAME').
     * @return view Return page of view.
     */
    public function view($view,$data = [])
    {
        if (!isset($data['title'])) {
            $data['title'] = config('APP_NAME');
        }
        require_once '../app/views/template/main.php';
    }
}