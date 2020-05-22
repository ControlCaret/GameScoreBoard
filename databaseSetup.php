<meta charset="utf-8" />
<?php
    $connect = mysql_connect("localhost","root","apmsetup");
    $dbconn  = mysql_select_db("scoreRanking", $connect);

    $sql  = "create table scoreList ( ";
    $sql .= "num int not null auto_increment, ";
    $sql .= "name text, ";
    $sql .= "schoolid int, ";
    $sql .= "score int, ";
    $sql .= "date date, ";
    $sql .= "primary key(num))";

    $result  = mysql_query($sql, $connect);

    if ($result)
        echo "true";
    else
        echo "false";
    mysql_close();
?>