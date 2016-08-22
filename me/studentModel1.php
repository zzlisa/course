<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class studentModel1 extends Mysql{
    protected  $_table="plan";
    
    //根据id 获取个人信息
    public function getStudentInfo($id){
        $sql="select * from ".$this->_table." where plan_id=".$id;
        $student=$this->query($sql);
        return $student;
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
        $sql = "select count(plan_id) as num from ".$this->_table;
//        echo $sql;
        $result = $this->query($sql);
        
        return $result['num'];
    }
}