<?php

$act=empty($_GET['act'])?'index':$_GET['act'];
include 'mysql.php';
include 'stuModel.php';
$student=new stuModel();
switch ($act){
    case 'index':
        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=10;//每页显示的信息条数
        $pagecount=$student->student_count();
        $count=ceil($pagecount/$pagesize);//向上取整，得到页数
        $list = $student->studentlist($page,$pagesize);
        include 'view/stu_list.html';
        break;
    case 'edit':
        $id=$_GET['id'];
        // var_dump($id);
        $info=$student->getstudentInfo($id);
        // var_dump($info);
        if(empty($_POST)){
             include 'view/stu_info.html';
        }else{
           $data=$_POST;
           // var_dump($data);
           $num=$student->editInfo($id,$data);
           // var_dump($num);
           if($num){
              echo "<script>alert('修改成功');parent.location.reload();</script>";
              exit;
           }else{
               echo "<script>alert('修改失败');</script>";
           }
        }
        break;
    case 'del':
           $id=$_GET['id'];
           $nub = $student->delInfo($id);
            if($nub){
                 echo "<script>alert('删除成功');location.href='stu.php';</script>";
                 exit;
            }
            else{
                echo "<script>alert('删除失败');location.href='stu.php';</script>";
            }
            break;
    case 'add':
           $data=$_POST;
           // var_dump($data);
           $nup=$student->addInfo($data);
           // echo $student->addInfo($data);
           // var_dump($nup);
            if($nup){
                echo "<script>alert('添加成功'); parent.location.reload();</script>";
                exit;
           }else{
               echo "<script>alert('添加失败');</script>";
           }
           break;
 }