<?php
include_once 'E:/PHP/OSPanel/domains/GFL/php_task1/task4/index.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//echo $querySelect;
//echo $queryInsert;
//echo $queryUpdate;
//echo $queryDelete;

//MySql
echo $mysql_con;
foreach ($arr_select as $key=>$field) {
    echo $arr_select[$key]["id"]." ".$arr_select[$key]["name"]." ".$arr_select[$key]["email"]."<br>";
}
echo $res_insert;
echo $res_update;
echo $res_delete;

//PgSql
echo $pg_con;
foreach ($pg_arr_select as $key=>$field) {
    echo $pg_arr_select[$key]["id"]." ".$pg_arr_select[$key]["name"]." ".$pg_arr_select[$key]["email"]."<br>";
}
echo $pg_res_insert;
echo $pg_res_update;
echo $pg_res_delete;

?>

</body>
</html>