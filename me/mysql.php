<?php

class Mysql{
    protected  $con;

    public function __construct() {
        $this->con();
    }
    public function con(){
        $config=  include 'config.php';
        $this->con=new PDO($config['source'],$config['user'],$config['pws']);

        // if($this->con){
        //     echo "数据库连接成功";
        // }else{
        //     echo "数据库连接失败";
        // }
    }
    public function query($sql="",$flag=false){
        $data=$this->con->query($sql);
        $row=array();
        if(!$flag){
            $row=$data->fetch(PDO::FETCH_ASSOC);//把字段当成数组的索引
        }else{
            $row=$data->fetchAll(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public function exc($sql){
        $num=$this->con->exec($sql);
        return $num;
    }

}

//class db{
//    protected  $con;
//
//    public function __construct() {
//        $this->conn();
//    }
//    public function conn(){
//        $this->con=mysql_connect('127.0.0.1','root','123456');
//        if($this->con){
//            echo "数据连接成功";
//        }else{
//            echo "连接失败";
//        }
//        mysql_select_db("student", $this->con);
//    }
//
//    public function query($sql){
//        $result=mysql_query($sql,$this->con);
//        $data=array();
//        while($row=mysql_fetch_assoc($result)){
//            $data[]=$row;
//        }
//        return $data;
//    }
//    public function update($sql){
//        $result=  mysql_query($sql,$this->con);
//        return $result;
//    }
//
//    public function del($sql){
//        $result=mysql_query($sql,$this->con);
//        return $result;
//    }
//    public function add($sql){
//        $result=mysql_query($sql,$this->con);
//        $num=mysql_affected_rows($this->con);
//        //var_dump($num) ;
//        return $num;
//    }
//
//}
//$db=new db();
////$db->add("insert into student (student_name,sex) values ('王和覅的',0)");
//

