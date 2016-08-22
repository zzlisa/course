<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class jscxModel extends Mysql{
    protected $_table = "teacher";
    public function getjscxlist($jiaoshi_id){
        $sql = "select teacher.teacher_id,teacher.teacher_name,teacher.teacher_sex,teacher.teacher_zc,teacher.teacher_csrq,college.college_name from ".$this->_table." 
            left join college on teacher.college_id=college.college_id where teacher.teacher_id=".$jiaoshi_id;
   
        return $this->query($sql,true);
        
    }
}