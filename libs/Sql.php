<?php

class Sql
{
    protected $fields;
    protected $table;
    protected $values;
    protected $whereField;
    protected $whereVal;
    protected $querySelect;
    protected $queryInsert;
    protected $queryUpdate;
    protected $queryDelete;

    function __construct()
    {
        $this->fields = array();
        $this->values = array();
        $this->table = "";
        $this->whereField = "";
        $this->whereVal = "";
    }


    public function setFields($field)
    {
        if ($field != "*" && $field != "") {
            array_push($this->fields, $field);
            return true;
        } else {
            return false;
        }
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function unsetFields()
    {
        unset($this->fields);
    }


    public function setValues($value)
    {
        if ($value != "") {
            array_push($this->values, $value);
            return true;
        } else {
            return false;
        }
    }

    public function getValues()
    {
        return $this->values;
    }

    public function unsetValues()
    {
        unset($this->fields);
    }


    public function setWhereField($where)
    {
        if ($where != "") {
            $this->whereField = $where;
            return true;
        } else {
            return false;
        }
    }

    public function getWhereField()
    {
        return $this->whereField;
    }


    public function setWhereVal($where)
    {
        if ($where != "") {
            $this->whereVal = $where;
            return true;
        } else {
            return false;
        }
    }

    public function getWhereVal()
    {
        return $this->whereVal;
    }


    public function setTable($table)
    {
        $this->table = $table;
    }

    public function getTable()
    {
        return $this->table;
    }

    protected function getQuerySelect()
    {
        return $this->querySelect;
    }

    protected function getQueryInsert()
    {
        return $this->queryInsert;
    }

    protected function getQueryUpdate()
    {
        return $this->queryUpdate;
    }

    protected function getQueryDelete()
    {
        return $this->queryDelete;
    }

    function select()
    {
        $str = "";
        foreach ($this->fields as $key => $value) {
            $next = array_key_exists($key + 1, $this->fields);
            /*if(next($this->fields)){
                $str += $value.", ";
                echo $str;
            } else {
                $str += $value;
                echo $str;
            }*/
            //echo $next;
            if ($next) {
                $str .= $value . ", ";
            } else {
                $str .= $value;
                //echo $str;
            }

        }
        //echo $str;
        $this->querySelect = "SELECT " . $str . " FROM " . $this->table . " WHERE " . $this->whereField . " = " . $this->whereVal . ";";
        return $this->querySelect;
    }

    function insert()
    {
        $str_fields = "";
        $str_name = "";
        foreach ($this->fields as $key => $value) {
            $next = array_key_exists($key + 1, $this->fields);
            if ($next) {
                $str_fields .= $value . ", ";
            } else {
                $str_fields .= $value;
            }
        }
        foreach ($this->values as $key => $value) {
            $next = array_key_exists($key + 1, $this->values);
            if ($next) {
                $str_name .= $value . ", ";
            } else {
                $str_name .= $value;
            }

        }
        $this->queryInsert = "INSERT INTO " . $this->table . " ( " . $str_fields . ") " . "VALUES (" . $str_name . " );";
        return $this->queryInsert;
    }

    function update()
    {
        $str_fields = "";
        $str_name = "";
        foreach ($this->fields as $key => $value) {
            $next = array_key_exists($key + 1, $this->fields);
            if ($next) {
                $str_fields .= $value . ", ";
            } else {
                $str_fields .= $value;
            }
        }
        foreach ($this->values as $key => $value) {
            $next = array_key_exists($key + 1, $this->values);
            if ($next) {
                $str_name .= $value . ", ";
            } else {
                $str_name .= $value;
            }

        }
        $this->queryUpdate = "UPDATE " . $this->table . " SET " . $str_fields . " = " . $str_name . " WHERE " . $this->whereField . " = " . $this->whereVal . ";";
        return $this->queryUpdate;
    }

    function delete()
    {
        $this->queryDelete = "DELETE FROM " . $this->table . " WHERE " . $this->whereField . " = " . $this->getWhereVal() . ";";
        return $this->queryDelete;
    }


}

?>