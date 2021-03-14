<?php
class Admission extends Models
{
    private $_table = 'admission';

    public $id = NULL;
    public $name = NULL;
    public $father = NULL;
    public $gender = NULL;
    public $reg_no = NULL;
    public $school = NULL;
    public $address = NULL;
    public $mobile_number = NULL;
    public $passed_out = NULL;
    public $course = NULL;
    public $tamil = NULL;
    public $english = NULL;
    public $maths = NULL;
    public $physics = NULL;
    public $chemistry = NULL;
    public $computer_science = NULL;
    public $biology = NULL;
    public $history = NULL;
    public $commerce = NULL;
    public $economics = NULL;

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $this->_query = 'INSERT INTO ' . $this->_table . ' (`name`, `father`, `gender`, `reg_no`, `school`, `address`, `mobile_number`, `passed_out`, `course`, `tamil`, `english`, `maths`, `physics`, `chemistry`, `computer_science`, `biology`, `history`, `commerce`, `economics`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $this->_param = [$this->name, $this->father, $this->gender, $this->reg_no, $this->school, $this->address, $this->mobile_number, $this->passed_out, $this->course, $this->tamil, $this->english, $this->maths, $this->physics, $this->chemistry, $this->computer_science, $this->biology, $this->history, $this->commerce, $this->economics];
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
}
