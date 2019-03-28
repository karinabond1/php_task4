<?php

class MySql extends Sql
{
    protected $connection;
    function __construct()
    {
        $this->connection = "";
    }

    function connect()
    {
        $this->connection = mysql_pconnect(HOST, USER_NAME, USER_PASS);
        if (!$this->connection) {
            return "Can not connect to MySQL";
        }
        mysql_select_db(DATABASE);
    }

    function select()
    {
        parent::select();
        $q = mysql_query($this->getQuerySelect());
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
        $result = mysql_query($query);
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
        $query = $this->getQueryDelete();
        $result = mysql_query($query);
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