<?php

class PgSql extends Sql
{
    protected $connection;

    function __construct()
    {
        $this->connection = "";
    }

    function connect()
    {
        $this->connection = "host=" . HOST . " dbname=" . DATABASE . " user=" . USER_NAME . " password=" . USER_PASS;
        $connect = pg_connect($this->connection);
        if (!$connect) {
            return "Can not connect to MySQL";
        }
    }

    function select()
    {
        parent::select();
        $q = pg_query($this->getQuerySelect());
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
        $query = $this->getQueryUpdate();
        $result = pg_query($query);
        if ($result) {
            return "The field is updated";
        } else {
            return "The field is NOT updated";
        }
    }

    function insert()
    {
        parent::insert();
        $query = $this->getQueryInsert();
        $result = pg_query($query);
        if ($result) {
            return "The field is added";
        } else {
            return "The field is NOT added";
        }
    }

    function delete()
    {
        parent::delete();
        $query = $this->getQueryDelete();
        $result = pg_query($query);
        if ($result) {
            return "The field is deleted";
        } else {
            return "The field is NOT deleted";
        }
    }

    function __destruct()
    {
        pg_close($this->connection);
    }
}

?>