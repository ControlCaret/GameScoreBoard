<?php
    $connect = mysql_connect("localhost","root","apmsetup");
    mysql_select_db("scoreRanking", $connect);
    date_default_timezone_set('Asia/Seoul');
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>점수 랭킹</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- YCustom Styles-->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <span class="navbar-text white-text">
            <h3>
                <strong>점수 랭킹</strong>
            </h3>
        </span>
    </nav>

    <div class="container">
        <form action="input.php" method="POST">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="row-4">
                        <div class="md-form input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text md-addon">이름</span>
                            </div>
                            <input type="text" class="form-control" name="nameInput" autocomplete="off" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text md-addon">학번</span>
                            </div>
                            <input type="text" class="form-control" name="idInput" autocomplete="off" required>
                            <input type="hidden" name="date" value="<?php echo date("Y-m-d");?>">
                        </div>
                    </div>
                    <div class="row-4">
                        <div class="md-form input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text md-addon">점수 입력</span>
                            </div>
                            <input type="text" class="form-control" name="scoreInput" autocomplete="off" required>
                            <div class="input-group-append">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">제출</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="justify-content-center">
            <h2>*제출 버튼을 누르기 전 점수 확인을 받아야 합니다! 점수를 동아리 회원들에게 보여준 뒤 확인을 받고 제출을 눌러주세요!*</h2>
            <p>VR 게임을 하고 점수를 입력해주세요. 이름과 학번을 정확하게 입력해주세요.</p>
            <P>상위 등수 학생들에게는 상품을 드립니다!</P>
        </div>  
        <br><br>
        
        <div class="col-12">    
            <div class="d-flex justify-content-center">
                <table class="table table-hover">
                    <tr class="blue-grey white-text">
                        <th style="font-size: 18px;">등수</th>
                        <th style="font-size: 18px;">이름</th>
                        <th style="font-size: 18px;">학번</th>
                        <th style="font-size: 18px;">점수</th>
                    </tr>
                    <?php
                        $sql  = "SELECT * FROM scoreList ORDER BY score DESC;";
                        $i = 1;
                        $result = mysql_query($sql);
                            while ($row = mysql_fetch_array($result)) {
                                echo "
                                    <tr>
                                        <td>$i</td>
                                        <td>$row[name]</td>
                                        <td>$row[schoolid]</td>
                                        <td>$row[score]</td>
                                    </tr>
                                ";
                                $i = $i + 1;
                            }
                    ?>
                </table>
            </div>
        </div>
    </div>

    
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>