<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>首页</title>
    <style type="text/css">
        body {
            font-family: 微软雅黑;
            background-color: #000;
            color: #fff;
        }
        .zaixian {
            float: right;
            margin-right: 8%;
        }
        a {
            text-decoration: none;
            color: #aee6c5;
        }
        a:hover {
            text-decoration: underline;
            color: #e6e1ae;
        }
        .nav {
            font-size: 40px;
            font-family: Georgia;
            text-align: center;
            line-height: 2.5;
            margin-top: 7%;
        }
        .title {
            font-family: 宋体;
            text-align: center;
            font-size: 60px;
            font-weight: bold;
            color: #fff;
        }
    </style>
</head>
<body>
    <span class="zaixian">
        <?php

        if(!isset($_SESSION['username'])){
            echo "<script>alert('请先登录');location.href='lo.php';</script>";
        } else {
            echo '在线人员：'.$_SESSION['username'];
        }
        ?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="lo.php"><font color="#fff">退出</font></a></span>
    </span>
    <div>
        <img src="view/images/head.png">
    </div>
    <div class="title">Welcome to 课表查询系统</div>
    <div class="nav">
        <a href="teacher.php">Look Schedule Information</a>
        <br/>
        <a href="student.php">Select Schedule Information</a>
    </div>
</body>
</html>