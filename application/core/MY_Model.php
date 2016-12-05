<?php

class MY_Model extends  CI_Model{

    protected $fields = [];

    protected  $tableName = '';

    private $exist = FALSE;

    /**
     * MY_Model constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->tableName = get_called_class().'s';
    }

    function __get($field) {
        return $this->fields[$field];
    }

    function __set($field, $value) {
        $this->fields[$field] = $value;
    }

    function __isset($field){
        return !empty($this->fields[ $field ]);
    }

    function __debugInfo() {
        return $this->fields;
    }

    public static function all(){
            
    }

    public function save(){
        if($this->exist)
            $this->update();
        else
            $this->insert();
    }

    private function update(){

    }

    private function insert(){

    }

}