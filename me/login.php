<?php
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    // echo $username;
    // echo $password;

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

    $sql = "SELECT * FROM student";
    // echo $sql;
    $result = $conn->query($sql);
    // var_dump($result);
    // echo "<br/>";
    if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        // echo $row["id"].'<br/>';
        // echo $row["student_name"].'<br/>';
        // echo $row["student_id"].'<br/>';
        if($row['student_name']==$username && $row['student_id']==$password){
            // echo $username;
            // echo $row['username'];
            $_SESSION['username']=$row["student_name"];
            // echo $_SESSION['username'];
            echo "<script>alert('登录成功');location.href='index.php';</script>";
        }
    }
    echo "<script>alert('登录失败');location.href='lo.php';</script>";


} else {
    echo "0 个结果";
}
    // if($row['username']==$username && $row['password']==$password) {
    //     echo "<script>alert('登录成功');location.href='index.php';</script>";
    // } else {
    //     echo "shibai";
    // }

    $conn->close();


?>
