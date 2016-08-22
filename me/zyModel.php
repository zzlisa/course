<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class zyModel extends Mysql{
    protected $_table="profess";
    
    public function getInfoByxueyuanId($xueyuan_id){
        $sql = "select * from ".$this->_table." where college_id=".$xueyuan_id;
       // echo $sql;exit;
        return $this->query($sql,true);
    }
    public function getlist(){
        $sql="select * from college left join profess on college.college_id=profess.college_id ";        
        return $this->query($sql,true);
    }
}
