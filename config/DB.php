<?php
class DB
{
    private static $_instance = NULL;
    private $_dbname,
        $_host,
        $_user,
        $_password,
        $_stmt,
        $_result,
        $_count,
        $_con;

    private function __construct()
    {
        $this->_dbname = 'bon_secours';
        $this->_host = '127.0.0.1';
        $this->_user = 'root';
        $this->_password = '';

        try {
            $this->_con = new PDO('mysql:dbname=' . $this->_dbname . ';host=' . $this->_host . ';charset=utf8mb4', $this->_user, $this->_password);
            $this->_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->_con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function obj()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function lastId()
    {
        return $this->_con->lastInsertId();
    }

    public function result()
    {
        return $this->_result;
    }

    public function count()
    {
        return $this->_count;
    }

    public function close()
    {
        $this->_stmt = NULL;
        $this->_con = NULL;
    }

    public function execute($query = '', $param = [], $type = '')
    {
        $this->_stmt = $this->_con->prepare($query);
        if ($this->_stmt->execute($param)) {
            if ($type == FETCH) $this->_result = $this->_stmt->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_stmt->rowCount();
            return true;
        }
        return false;
    }
}
