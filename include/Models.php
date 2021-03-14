<?php

class Models
{
    public $result = NULL;
    public $count = NULL;
    public $last_id = NULL;
    public $error = NULL;

    protected $_query = NULL;
    protected $_param = [];
    protected $_exe = false;
    protected $_db = NULL;
    protected $_type = NULL;

    protected function __construct()
    {
        $this->_db = DB::obj();
    }

    protected function query()
    {
        try {
            if ($this->_exe = $this->_db->execute($this->_query, $this->_param, $this->_type)) {
                $this->result = $this->_db->result();
                $this->count = $this->_db->count();
                $this->last_id = $this->_db->lastId();
            }
        } catch (Exception $e) {
            $this->error = $e->getMessage();
        }
        return $this->_exe;
    }
}
