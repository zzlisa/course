<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class xueyuanModel extends Mysql{
    protected $_table="college";
    
    public function getlist(){
        $sql = "select * from ".$this->_table;
//        echo $sql;            
        return $this->query($sql,true);
    }
    
    
} 
