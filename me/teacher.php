<?php

$act=empty($_GET['act'])?'index':$_GET['act'];
include 'mysql.php';
include 'teacherModel.php';
$teacher=new teacherModel();
switch ($act){
    case 'index':
        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=10;//每页显示的信息条数
        $pagecount=$teacher->teacher_count();
        $count=ceil($pagecount/$pagesize);//向上取整，得到页数
        $list = $teacher->teacherlist($page,$pagesize);
        include 'view/teacher_list.html';
        break;
    case 'edit':
        $id=$_GET['id'];
        // var_dump($id);
        $info=$teacher->getteacherInfo($id);
        // var_dump($info);
        if(empty($_POST)){
             include 'view/teacher_info.html';
        }else{
           $data=$_POST;
           // var_dump($data);
           $num=$teacher->editInfo($id,$data);
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
           $nub = $teacher->delInfo($id);
            if($nub){
                 echo "<script>alert('删除成功');location.href='teacher.php';</script>";
                 exit;
            }
            else{
                echo "<script>alert('删除失败');location.href='teacher.php';</script>";
            }
    case 'add':
           $data=$_POST;
           // var_dump($data);
           $nup=$teacher->addInfo($data);
           // echo $teacher->addInfo($data);
           // var_dump($nup);
            if($nup){
                echo "<script>alert('添加成功'); parent.location.reload();</script>";
                exit;
           }else{
               echo "<script>alert('添加失败');</script>";
           }
           break;
 }