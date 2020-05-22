<meta charset="utf-8" />
<?php
    $connect = mysql_connect("localhost","root","apmsetup");
    mysql_select_db("scoreRanking", $connect);
    
    $name     = $_POST['nameInput'];
    $schoolid = $_POST['idInput'];
    $score    = $_POST['scoreInput'];
    $date     = $_POST['date'];

    if (!isset($name)) {
        echo "<script>alert(\"이름을 입력해주세요\");</script>";
        echo "<script>window.location.href=\"index.php\";</script>"; 
    }
    else if (!isset($schoolid) || !is_numeric($schoolid)) {
        echo "<script>alert(\"학번을 정확히 입력해주세요\");</script>";
        echo "<script>window.location.href=\"index.php\";</script>"; 
    }
    else if (!isset($score) || !is_numeric($score)) {
        echo "<script>alert(\"점수를 정확히 입력해주세요\");</script>";
        echo "<script>window.location.href=\"index.php\";</script>"; 
    }
    else {
        $sql  = "insert into scoreList (name, schoolid, score, date)";
        $sql .= "values ('$name', '$schoolid', '$score', '$date')";

        $result = mysql_query($sql);
        if ($result) {
            //echo "<script>alert(\"성공적으로 작성되었습니다\");</script>";
            echo "<script>window.location.href=\"index.php\";</script>"; 
        }
        else {
            echo "<script>alert(\"문제가 발생하였습니다\");</script>";
            echo "<script>window.location.href=\"index.php\";</script>"; 
        }
        mysql_close();
    }

    
?>