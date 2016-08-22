<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$act=empty($_GET['act'])?'index':$_GET['act'];
include 'mysql.php';
include 'studentModel1.php';
include 'xueyuanModel.php';
include 'zyModel.php';
//include 'kcModel.php';
include 'kccxModel.php';
$student=new studentModel1();//学生表 类的对象 
$college=new xueyuanModel();
$profess=new zyModel();

//$kecheng=new kcModel();
$kccx=new kccxModel();
switch ($act){
    case 'index':

        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=5;//每页显示的信息条数
        $pagecount=$student->student_count();

        $count=ceil($pagecount/$pagesize);//向上取整，得到页数
        $list = $student->studentlist($page,$pagesize); 

        $xuelist=$college->getlist();
        $college_id="";
        $profess_id="";
        $zylist="";
        $kclist="";   
        if(!empty($_POST['xueyuan'])){
            $college_id=$_POST['xueyuan'];
            $zylist=$profess->getInfoByxueyuanId($_POST['xueyuan']);
        }
        include 'view/student_list1.html';
        break;
        
//    case 'puanduan1':
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
    case  'search1':
        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=5;//每页显示的信息条数
        $pagecount=$student->student_count();
        $count=ceil($pagecount/$pagesize);
        $list = $student->studentlist($page,$pagesize); 
        $xuelist=$college->getlist();
        $college_id="";
        $profess_id="";
        $zylist="";
//        $kclist="";
         if(!empty($_POST['xueyuan'])){
            $college_id=$_POST['xueyuan'];
            $zylist=$profess->getInfoByxueyuanId($_POST['xueyuan']);
        }
//        if(!empty($_POST['zy'])){
//            $profess_id=$_POST['zy'];
//            $kclist=$kecheng->getInfozyId($_POST['zy']);
//        }
        $kccx_id=$_POST["zy"];
        $kccxlist=$kccx->getkccxlist($_POST['zy']);
        
        
               include 'view/student_list1.html'; 
        break;
}