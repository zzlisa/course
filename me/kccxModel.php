<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class kccxModel extends Mysql{
    protected $_table = "plan";
    public function getkccxlist($zy_id){
        $sql = "select plan.plan_id,course.course_id,course.course_name,course.course_xingz,course.course_testxs,course.course_zxs,course.course_xuef,plan.plan_xq,profess.profess_name,plan.plan_week from ".$this->_table." 
            left join course on course.course_id=plan.course_id left join profess on plan.profess_id=profess.profess_id where plan.profess_id=".$zy_id;
   
        return $this->query($sql,true);
        
    }
}
//select course.course_id,course.course_name,course.course_xingz,course.course_testxs,course.course_zxs,course.course_xuef,plan.plan_xq,profess.profess_name,plan.plan_week from plan left join course on course.course_id=plan.plan_id left join profess on plan.profess_id=profess.profess_id where plan.course_id='10000002'

