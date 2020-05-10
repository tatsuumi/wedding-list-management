<?php

$id = $_POST['id'];

//pg_connect()に渡すパラメータの指定
$constr =  "host=ec2-35-171-31-33.compute-1.amazonaws.com port=5432 dbname=d9canmf389vsq5 user=ceoecrklypftbt password=f68e1b403c34f2de22faabb1090e1d13005192acd1edaa6b22ce243120c0cc32";
//DBに接続
$conn = pg_connect($constr);
//SQLの実行
//削除idを削除
$result = pg_query($conn, "DELETE  FROM people where id=$id");
pg_close($conn); 

require("rows.php");