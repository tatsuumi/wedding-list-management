<?php

        //postgresデータ追加
        $conn = "host=ec2-34-195-169-25.compute-1.amazonaws.com dbname=d7v30lqsd1nu6g user=vupprickmnebwc password=8497d96c15036bf8ce3d851645d7b75c84bb42d3590660d78a07f201792c4063";
        $link = pg_connect($conn);
        $sql = 'SHOW TABLES';
$stmt = $dbh->query($sql);

while ($result = $stmt->fetch(PDO::FETCH_NUM)){
    $table_names[] = $result[0];
}

$table_data = array();
foreach ($table_names as $key => $val) {
    $sql2 = "SELECT * FROM $val;";
    $stmt2 = $dbh->query($sql2);
    $table_data[$val] = array();
    while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        foreach ($result2 as $key2 => $val2) {
            $table_data[$val][$key2] = $val2;
        }
    }
}foreach ($table_data as $key => $val) {
    echo "<h1>$key</h1>";
    if (empty($val)) {
        continue;
    }
    echo "<table border=1 style=border-collapse:collapse;>";
    echo "<tr>";
    foreach ($table_data[$key] as $key2 => $val2) {
    echo "<th>";
    echo $key2;
    echo "</th>";
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($table_data[$key] as $key2 => $val2) {
    echo "<td>";
    echo $val2;
    echo "</td>";
    }
    echo "</tr>";
    echo "</table>";
}
        $result_flag = pg_query($sql);
        $close_flag = pg_close($link);
