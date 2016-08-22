<?php
    $servername = "localhost";
    $name = "root";
    $word = "root";
    $dbname = "course";

// 创建连接
$conn = new mysqli($servername, $name, $word, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <style type="text/css">
            body {
                font-family: 微软雅黑;
                height: 1000px;
                background: linear-gradient(to bottom,rgba(113, 186, 81, 0) 0, rgba(61, 197, 204, 0.85) 100%);
                overflow: hidden;
            }
            a {
                text-decoration: none;
                color: #408080;
            }
            .login {
                /*text-align: center;*/
                border: 1px solid #8be2dd;
                width: 500px;
                margin: 0 auto;
                padding: 70px 40px;
                margin-top: 4%;
            }
            input[type=text] {
              border: 1px dotted #999;
              height: 22px;
            }
            input[type=password] {
              border: 1px dotted #999;
              height: 22px;
            }
            form {
                margin-left: 100px;
            }
            h1 {
                font-family: 宋体;
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div style="height:30px;line-height:30px;width:100%;border-bottom:1px solid #e4e4e4;">
        <span style="margin-left:10px;color:#094c4c;">欢迎使用郑州师范学院教学信息管理系统</span>
        <span style="float:right;margin-right:10px;">
            <a href="#">设为首页</a>
        </span>
    </div>
    <div>
        <img src="view/images/head.png">
    </div>
    <h1>欢迎登录课表查询系统</h1>
    <div class="login">
        <form action="login.php" method="post">
            姓名: <input type="text" name="username">
            <br/><br/>
            密码: <input type="password" name="password">
            <br/><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="提交">
        </form>
    </div>
    </body>
</html>