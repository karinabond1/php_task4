<?php
include_once 'Sql.php';
include_once '/home/user14/public_html/PHP/php_task4/php_task4/config.php';

class MySql extends Sql
{
    protected $connection;
    protected $obj;

    function __construct()
    {
        parent::__construct();

        $this->connection = "";
    }

    public function connect()
    {
        $this->connection = mysql_connect(HOST, USER_NAME, USER_PASS);
        if (!$this->connection) {
            return "Can not connect to PgSql";
        }else{
        mysql_select_db(DATABASE);
     }
        
    }

    public function setObj(Sql $obj){
        $this->obj=$obj;
    }

    public function selectMySql()
    {
        $q = mysql_query($this->obj->getQuerySelectMySql());
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
        $result = mysql_query($this->obj->getQueryUpdateMySql());
        if ($result) {
            return "The field is updated";
        } else {
            return "The field is NOT updated";
        }
    }

    function insert()
    {
        $query =$this->obj->getQueryInsertMySql();
        $result = mysql_query($query);
        if ($result) {
            return "The field is added";
        } else {
            return "The field is NOT added";
        }
    }

    function delete()
    {
        $result = mysql_query($this->obj->getQueryDeleteMySql());
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