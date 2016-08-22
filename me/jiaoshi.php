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
include 'jsModel.php';
include 'jscxModel.php';
$student=new studentModel1();//学生表 类的对象 
$college=new xueyuanModel();
$teacher=new jsModel();
$jscx=new jscxModel();
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
//        $zylist="";
        $jslist="";   
        if(!empty($_POST['xueyuan'])){
            $college_id=$_POST['xueyuan'];
            $jslist=$teacher->getInfoByxueyuanId($_POST['xueyuan']);
        }
        include 'view/jiaoshi_list.html';
        break;
        
    case  'search':
        $page=empty($_GET['p'])?1:$_GET['p'];
        $pagesize=5;//每页显示的信息条数
        $pagecount=$student->student_count();
        $count=ceil($pagecount/$pagesize);
        $list = $student->studentlist($page,$pagesize); 
        $xuelist=$college->getlist();
        $college_id="";
        $teacher_id="";
        $jslist="";
//        $kclist="";
         if(!empty($_POST['xueyuan'])){
            $college_id=$_POST['xueyuan'];
            $jslist=$teacher->getInfoByxueyuanId($_POST['xueyuan']);
        }
//        else
//            {
//            $jslist=$profess->getInfoByxueyuanId1();
//        }
//        if(!empty($_POST['zy'])){
//            $profess_id=$_POST['zy'];
//            $kclist=$kecheng->getInfozyId($_POST['zy']);
//        }
        $jscx_id=$_POST["jiaoshi"];
        $jscxlist=$jscx->getjscxlist($_POST['jiaoshi']);
        
        
               include 'view/jiaoshi_list.html'; 
        break;
}
