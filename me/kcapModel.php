<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class kcapModel extends Mysql{
    protected $_table = "sche";
    public function getkcaplist($bj_id){
        $sql = "select sche.sche_id,course.course_name,class.class_name,teacher.teacher_name,classroom.classroom_name,sche.sche_xq,sche_tweek, sche_wsf,sche_wstart,sche_wend,sche_wds,sche_jstart,sche_jend,sche_week from ".$this->_table." 
            left join  classroom on classroom.classroom_id=sche.classroom_id left join teacher on teacher.teacher_id=sche.teacher_id left join course on course.course_id= sche.course_id left join class on class.class_id=sche.class_id where sche.class_id=".$bj_id;
   
        return $this->query($sql,true);
        
    }
}
//select classroom.classroom_name,teacher.teacher_name,class.class_name,course.course_name,sche_xq,sche_tweek, sche_wsf,sche_wstart,sche_wend,sche_wds,sche_jstart,sche_jend,sche_week from sche   left join  classroom on classroom.classroom_id=sche.classroom_id left join teacher on teacher.teacher_id=sche.teacher_id left join course on course.course_id= sche.course_id left join class on class.class_id=sche.class_id where sche.class_id='134115101'