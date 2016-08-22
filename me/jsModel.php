<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class jsModel extends Mysql{
    protected $_table="teacher";
    
    public function getInfoByxueyuanId1(){
        $sql = "select * from ".$this->_table;
       // echo $sql;exit;
        return $this->query($sql,true);
    }
        public function getInfoByxueyuanId($xueyuan_id){
        $sql = "select * from ".$this->_table." where college_id=".$xueyuan_id;
       // echo $sql;exit;
        return $this->query($sql,true);
    }
}

