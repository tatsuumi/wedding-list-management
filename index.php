<?php

        //pg_connect()に渡すパラメータの指定
        $constr = "host=ec2-34-195-169-25.compute-1.amazonaws.com port=5432 dbname=d7v30lqsd1nu6g user=vupprickmnebwc password=8497d96c15036bf8ce3d851645d7b75c84bb42d3590660d78a07f201792c4063";
         //DBに接続
         $conn = pg_connect($constr);
        //SQLの実行
        $result = pg_query($conn, "SELECT * FROM people");
        //データの取得
        $arr = pg_fetch_all($result);

        print "<table id=\"dblist\" summary=\"結婚式参加者データ一覧\">\n";
        print "<caption>結婚式参加者データ一覧</caption>\n";

        //テーブルヘッダとしてフィールド（カラム）名を出力
        print "<tr>\n";
        $flds = pg_num_fields($result);
        for($i=0; $i<$flds; $i++){
          $field = pg_field_name($result, $i);
         printf("<th abbr=\"%s\">%s</th>\n", $field, $field);
        }
        print "</tr>\n";

        //データの出力
        foreach($arr as $rows){
        print "<tr>\n";
        foreach($rows as $value){
         printf("<td>%s</td>\n", $value);
        }
        print "</tr>\n";
        }

print "</table>\n";

//DBとの接続を閉じる
pg_close($conn);