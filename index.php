<?php
include_once 'config.php';
include_once 'libs/MySql.php';
include_once 'libs/PgSql.php';
include_once 'libs/Sql.php';



$sql = new Sql();
//select
$sql->setTable(TABLE);
$field_name = $sql->setFields("name");
$field_email = $sql->setFields("email");
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("Derek");
$sql->select();
$mySql = new MySql();
$mySql->setObj($sql);
$mySql->connect();
$arr_select = $mySql->selectMySql();
$pgSql = new PgSql();
$pgSql->setObj($sql);
$pg_con = $pgSql->connect();
$pg_arr_select = $pgSql->select();
//insert
$val_name = $sql->setValues("John");
$val_email = $sql->setValues("john@example.com");
$queryInsert = $sql->insert();
$res_insert = $mySql->insert();
$pg_res_insert = $pgSql->insert();
//update
$sql->unsetFields();
$sql->unsetValues();
$sql = new Sql();
$mySql->setObj($sql);
$pgSql->setObj($sql);
$sql->setTable(TABLE);
$field_email = $sql->setFields("email");
$val_email = $sql->setValues("derekos@example.com");
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("Derek");
$queryUpdate = $sql->update();
$res_update = $mySql->update();
$pg_res_update = $pgSql->update();
//delete
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("John");
$queryDelete = $sql->delete();
$res_delete = $mySql->delete();
$pg_res_delete = $pgSql->delete();





/*$getFil = $sql->getValues();
print_r($getFil);*/


include 'templates/index.php';
?>