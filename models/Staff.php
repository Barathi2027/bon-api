<?php
class Staff  extends Models
{
    private $_table = 'staff';

    public $id = NULL;
    public $emp_id = NULL;
    public $name = NULL;
    public $gender = NULL;
    public $designation = NULL;
    public $experience = NULL;

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $this->_query = 'INSERT INTO ' . $this->_table . ' (`emp_id`, `name`, `gender`, `designation`, `experience`) VALUES (?, ?, ?, ?, ?)';
        $this->_param = [$this->emp_id, $this->name, $this->gender, $this->designation, $this->experience];
        $this->_type = EXECUTE;
        return $this->query();
    }

    public function update()
    {
        $this->_query = 'UPDATE ' . $this->_table . ' SET `name`= ?, `gender`= ?, `designation`= ?, `experience`= ? WHERE `id` = ?';
        $this->_param = [$this->name, $this->gender, $this->designation, $this->experience];
        $this->_type = EXECUTE;
        return $this->query();
    }

    public function readAll()
    {
        $this->_query = 'SELECT * FROM ' . $this->_table;
        $this->_type = FETCH;
        return $this->query();
    }

    public function readUsingId()
    {
        $this->_query = 'SELECT * FROM ' . $this->_table . ' WHERE `id` = ? LIMIT 1';
        $this->_param = [$this->id];
        $this->_type = FETCH;
        return $this->query();
    }

    public function readUsingUniqueKey()
    {
        $this->_query = 'SELECT * FROM ' . $this->_table . ' WHERE `emp_id` = ? LIMIT 1';
        $this->_param = [$this->emp_id];
        $this->_type = FETCH;
        return $this->query();
    }
}
