<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$act=empty($_GET['act'])?'index':$_GET['act'];
include 'mysql.php';
include 'studentModel.php';
include 'xueyuanModel.php';
include 'zyModel.php';
include 'bjModel.php';
include 'kcapModel.php';
include 'kcModel.php';
include 'kccxModel.php';
$student=new studentModel();//学生表 类的对象 
$college=new xueyuanModel();
$profess=new zyModel();
$class=new bjModel();
$kcap=new kcapModel();
//$kecheng=new kcModel();
//$kccx=new kccxModel();

switch ($act){
    case 'index':
//        $page = 1;
        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=5;//每页显示的信息条数
        $pagecount=$student->student_count();
//                exit();
//        if(empty($pagecount))
//        {
//            echo '没有学生数据';
//        }
//        else {
//            echo '有'.$pagecount.'条学生数据';
//        }
        $count=ceil($pagecount/$pagesize);//向上取整，得到页数
        $list = $student->studentlist($page,$pagesize); 

        $xuelist=$college->getlist();
        $college_id="";
        $profess_id="";
        $zylist="";
        $bjlist="";
       
//        if(!empty($_POST['zy'])){
//            $profess_id=$_POST['zy'];
//            $bjlist=$class->getInfozyId($_POST['zy']);
//        }
        if(!empty($_POST['xueyuan'])){
            $college_id=$_POST['xueyuan'];
            $zylist=$profess->getInfoByxueyuanId($_POST['xueyuan']);
        }
        include 'view/student_list.html';
        break;
    case 'edit':
        $id=$_GET['id'];
        $info=$student->getStudentInfo($id);
        if(empty($_POST)){
             include 'view/student_info.html';
        }else{
           $data=$_POST;
           $num=$student->editInfo($id,$data);
           if($num){
              echo "<script>alert('修改成功');location.href='student.php';</script>"; 
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
                 echo "<script>alert('删除成功');location.href='student.php';</script>"; 
                 exit;
            }
            else{
                echo "<script>alert('删除失败');location.href='student.php';</script>"; 
            }
    case 'add':          
           $data=$_POST;
           $nup=$student->addInfo($data);
            if($nup){
                echo "<script>alert('添加成功');location.href='student.php';</script>"; 
                exit;
           }else{
               echo "<script>alert('添加失败');</script>"; 
           }
           break;
    
    case 'puanduan':
        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=5;//每页显示的信息条数
        $pagecount=$student->student_count();
        $count=ceil($pagecount/$pagesize);
        $list = $student->studentlist($page,$pagesize); 
        
        $xuelist=$college->getlist();
        $college_id="";
        $profess_id="";
        $zylist="";
        $bjlist="";
        if(!empty($_POST['xueyuan'])){
            $college_id=$_POST['xueyuan'];
            $zylist=$profess->getInfoByxueyuanId($_POST['xueyuan']);
        }
        if(!empty($_POST['zy'])){
            $profess_id=$_POST['zy'];
            $bjlist=$class->getInfozyId($_POST['zy']);
        }
//        $data['data']=$bjlist;
//        $data['msg']='1';
//        echo json_encode($data);
        include 'view/student_list.html';
        break;
    case  'search':
        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=5;//每页显示的信息条数
        $pagecount=$student->student_count();
        $count=ceil($pagecount/$pagesize);
        $list = $student->studentlist($page,$pagesize); 
        $xuelist=$college->getlist();
        $college_id="";
        $profess_id="";
        $zylist="";
        $bjlist="";
         if(!empty($_POST['xueyuan'])){
            $college_id=$_POST['xueyuan'];
            $zylist=$profess->getInfoByxueyuanId($_POST['xueyuan']);
        }
        if(!empty($_POST['zy'])){
            $profess_id=$_POST['zy'];
            $bjlist=$class->getInfozyId($_POST['zy']);
        }
        $kcap_id=$_POST["bj"];
        $kcaplist=$kcap->getkcaplist($_POST['bj']);
        
        
               include 'view/student_list.html'; 
        break;
        
//        case 'puanduan1':
//        $page=empty($_GET['p'])?1:$_GET['p'];
//        $pagesize=5;//每页显示的信息条数
//        $pagecount=$student->student_count();
//        $count=ceil($pagecount/$pagesize);
//        $list = $student->studentlist($page,$pagesize); 
//        
//        $xuelist=$college->getlist();
//        $college_id="";
//        $profess_id="";
//        $zylist="";
//        $kclist="";
//        if(!empty($_POST['xueyuan'])){
//            $college_id=$_POST['xueyuan'];
//            $zylist=$profess->getInfoByxueyuanId($_POST['xueyuan']);
//        }
//        if(!empty($_POST['zy'])){
//            $profess_id=$_POST['zy'];
//            $kclist=$kecheng->getInfozyId($_POST['zy']);
//        }
////        $data['data']=$bjlist;
////        $data['msg']='1';
////        echo json_encode($data);
//        include 'view/student_list1.html';
//        break;
//        case  'search1':
//        $page=empty($_GET['p'])?1:$_GET['p'];
//        $pagesize=5;//每页显示的信息条数
//        $pagecount=$student->student_count();
//        $count=ceil($pagecount/$pagesize);
//        $list = $student->studentlist($page,$pagesize); 
//        $xuelist=$college->getlist();
//        $college_id="";
//        $profess_id="";
//        $zylist="";
//        $kclist="";
//         if(!empty($_POST['xueyuan'])){
//            $college_id=$_POST['xueyuan'];
//            $zylist=$profess->getInfoByxueyuanId($_POST['xueyuan']);
//        }
//        if(!empty($_POST['zy'])){
//            $profess_id=$_POST['zy'];
//            $kclist=$kecheng->getInfozyId($_POST['zy']);
//        }
//        $kccx_id=$_POST["kc"];
//        $kccxlist=$kccx->getkccxlist($_POST['kc']);
//        
//        
//               include 'view/student_list1.html'; 
//        break;
//
//        
 }




