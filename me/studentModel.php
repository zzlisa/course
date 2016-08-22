<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class studentModel extends Mysql{
    protected  $_table="sche";
    
    //根据id 获取个人信息
    public function getStudentInfo($id){
        $sql="select * from ".$this->_table." where sche_id=".$id;
        $student=$this->query($sql);
        return $student;
    }
   
    //
    public function editInfo($id,$data){
        $sql="update ".$this->_table." set sche_id='{$data['sche_id']}',course_id='{$data['course_id']}',"
        . "class_id={$data['class_id']},teacher_id='{$data['teacher_id']}',classroom_id='{$data['classroom_id']}',sche_xq='{$data['sche_xq']}',sche_tweek='{$data['sche_tweek']}',sche_wsf='{$data['sche_wsf']}',"
        . "sche_wstart='{$data['sche_wstart']}',sche_wds='{$data['sche_wds']}',sche_jstart='{$data['sche_jstart']}',sche_jend='{$data['sche_jend']}',sche_week='{$data['sche_week']}' where sche_id=".$id;
      
        return $this->exc($sql); 
    }
    public function delInfo($id){
        $sql="delete from ".$this->_table." where sche_id=".$id;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(sche_id,sche_id,course_id,class_id,teacher_id,classroom_id,sche_xq,sche_tweek,sche_wsf,sche_wstart,sche_wds,sche_jstart,sche_jend,sche_week)"
               .values."('{$data['sche_id']}','{$data['course_id']}','{$data['class_id']}','{$data['teacher_id']}','{$data['classroom_id']}','{$data['sche_xq']}','{$data['sche_tweek']}','{$data['sche_wsf']}','{$data['sche_wstart']}',
               .'{$data['sche_wds']}','{$data['sche_jstart']}','{$data['sche_jend']}','{$data['sche_week']}')";
       return $this->exc($sql);
    }
    
    public function studentlist($page,$pagesize,$condition=""){
        $start=0;
        if($page>=1){
            $start = ($page-1)*$pagesize;
        }
        $where="";
        if(empty($condition)){
            $where.=$condition;
        }
        $sql="select * from ".$this->_table." where 1=1 $where limit $start,$pagesize";
        return $this->query($sql,true);
    }
    
    public function student_count(){
        $sql = "select count(sche_id) as num from ".$this->_table;
//        echo $sql;
        $result = $this->query($sql);
        
        return $result['num'];
    }//分页统计数据的个数

}
