<?php

include('../functions/conn.php');

csv_file_to_mysql_table('itl.csv','mailer',255);

function csv_file_to_mysql_table($source_file, $target_table, $max_line_length=10000) {
    if (($handle = fopen("$source_file", "r")) !== FALSE) {
        $columns = fgetcsv($handle, $max_line_length, ",");
        foreach ($columns as &$column) {
            $column = strtolower(str_replace(".","",$column));
        }
        $insert_query_prefix = "INSERT IGNORE INTO $target_table (".join(",",$columns).")\nVALUES";
        while (($data = fgetcsv($handle, $max_line_length, ",")) !== FALSE) {
            while (count($data)<count($columns)) array_push($data, NULL);
            $query = "$insert_query_prefix ('".join("','",$data)."');";
            mysql_query($query);
        }
        fclose($handle);
    }
}

?> 
