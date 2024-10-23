<?php
require_once './app/views/ViewApiHostel.php';
class ApiController{
    protected $view;
    private $data;

    function __construct(){
        $this->view = new JSONView();
        $this->data = file_get_contents('php://input'); 
    }

    function getData(){
        return json_decode($this->data);
    }
}  