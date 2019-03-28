<?php
include 'config.php';
include 'libs/MySql.php';
include 'libs/PgSql.php';
include 'libs/Sql.php';

//Derek
//der@example.com
$sql = new Sql();
//select
$sql->setTable(TABLE);
$field_name = $sql->setFields("name");
$field_email = $sql->setFields("email");
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("Derek");
//$querySelect = $sql->select();
//insert
$val_name = $sql->setValues("John");
$val_email = $sql->setValues("john@example.com");
//$queryInsert = $sql->insert();
//update
$sql->unsetFields();
$sql->unsetValues();
$sql = new Sql();
$sql->setTable(TABLE);
$field_email = $sql->setFields("email");
$val_email = $sql->setValues("derekos@example.com");
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("Derek");
//$queryUpdate = $sql->update();
//delete
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("Derek");
//$queryDelete = $sql->delete();

//MySql
$mySql = new MySql();
$mysql_con = $mySql->connect();
$arr_select = $mySql->select();
$res_insert = $mySql->insert();
$res_update = $mySql->update();
$res_delete = $mySql->delete();

//PgSql
$pgSql = new PgSql();
$pg_con = $pgSql->connect();
$pg_arr_select = $pgSql->select();
$pg_res_insert = $pgSql->insert();
$pg_res_update = $pgSql->update();
$pg_res_delete = $pgSql->delete();


/*$getFil = $sql->getValues();
print_r($getFil);*/


include 'templates/index.php';
?>