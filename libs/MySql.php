<?php
include_once 'Sql.php';
include_once 'E:/PHP/OSPanel/domains/GFL/php_task1/php_task4/config.php';

class MySql extends Sql
{
    protected $connection;
    protected $obj;

    function __construct()
    {
        parent::__construct();

        $this->connection = "";
        //$this->obj=$obj;
    }

    public function connect()
    {
        $this->connection = mysql_connect(HOST, USER_NAME, USER_PASS);
        if (!$this->connection) die ("Can not connect to MySQL");
        mysql_select_db(DATABASE);
    }

    public function setObj(Sql $obj){
        $this->obj=$obj;
    }

    public function selectMySql()
    {
        parent::select();
        //echo "value : ".$this->obj->getQuerySelect();
        $q = mysql_query($this->obj->getQuerySelect());
        $result = array();
        $index = 0;
        while ($row = mysql_fetch_assoc($q)) {
            $result[$index] = $row;
            $index++;
        }
        return $result;
    }

    function update()
    {
        parent::update();
        //echo "value : ".$this->obj->getQueryUpdate();
        //$query = $this->obj->getQueryUpdate();
        $result = mysql_query($this->obj->getQueryUpdate());
        if ($result) {
            return "The field is updated";
        } else {
            return "The field is NOT updated";
        }
    }

    function insert()
    {
        parent::insert();
        //echo "value : ".$this->obj->getQueryInsert();
        $query =$this->obj->getQueryInsert();
        $result = mysql_query($query);
        if ($result) {
            return "The field is added";
        } else {
            return "The field is NOT added";
        }
    }

    function delete()
    {
        parent::delete();
        echo "value : ".$this->obj->getQueryDelete();
       // $query = $this->getQueryDelete();
        $result = mysql_query($this->obj->getQueryDelete());
        if ($result) {
            return "The field is deleted";
        } else {
            return "The field is NOT deleted";
        }
    }

    function __destruct()
    {
        mysql_close($this->connection);
    }
}

?>