<?php

$id = $_POST['id'];

//pg_connect()に渡すパラメータの指定
$constr = "host=ec2-34-195-169-25.compute-1.amazonaws.com port=5432 dbname=d7v30lqsd1nu6g user=vupprickmnebwc password=8497d96c15036bf8ce3d851645d7b75c84bb42d3590660d78a07f201792c4063";
//DBに接続
$conn = pg_connect($constr);
//SQLの実行
//削除idを削除
$result = pg_query($conn, "DELETE  FROM people where id=$id");
pg_close($conn); 

require("index.php");