<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class bjModel extends Mysql{
    protected $_table="class";
    
    public function getInfozyId($zy_id){
        $sql = "select * from ".$this->_table." where profess_id=".$zy_id;
       // echo $sql;exit;
        return $this->query($sql,true);
    }
    public function getlist(){
        $sql="select * from profess left join class on profess.profess_id=class.profess_id ";        
        return $this->query($sql,true);
    }
}