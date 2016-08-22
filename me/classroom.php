<?php

$act=empty($_GET['act'])?'index':$_GET['act'];
include 'mysql.php';
include 'classroomModel.php';
$classroom=new classroomModel();
switch ($act){
    case 'index':
        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=10;//每页显示的信息条数
        $pagecount=$classroom->classroom_count();
               // exit();
       // if(empty($pagecount))
       // {
       //     echo '没有教室数据';
       // }
       // else {
       //     echo '有'.$pagecount.'条教室数据';
       // }
        $count=ceil($pagecount/$pagesize);//向上取整，得到页数
        $list = $classroom->classroomlist($page,$pagesize);
        include 'view/classroom_list.html';
        break;
    case 'edit':
        $id=$_GET['id'];
        // var_dump($id);
        $info=$classroom->getClassroomInfo($id);
        // var_dump($info);
        if(empty($_POST)){
             include 'view/classroom_info.html';
        }else{
           $data=$_POST;
           //var_dump($data);
           $num=$classroom->editInfo($id,$data);
           // echo $num;
           // var_dump($num);
           // echo $sql;
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
           $nub = $classroom->delInfo($id);
            if($nub){
                 echo "<script>alert('删除成功');location.href='classroom.php';</script>";
                 exit;
            }
            else{
                echo "<script>alert('删除失败');location.href='classroom.php';</script>";
            }
    case 'add':
           $data=$_POST;
           $nup=$classroom->addInfo($data);
            if($nup){
                echo "<script>alert('添加成功'); parent.location.reload();</script>";
                exit;
           }else{
               echo "<script>alert('添加失败');</script>";
           }
           break;
 }