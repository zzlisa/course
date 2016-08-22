<?php


class classModel extends Mysql{
    protected  $_table="class";

    //根据id 获取个人信息
    public function getclassInfo($id){
        $sql="select * from ".$this->_table." where class_id=".$id;
        $class=$this->query($sql);
        return $class;
    }

    //
    public function editInfo($id,$data){
        $sql="update ".$this->_table." set class_id='{$data['class_id']}',class_name='{$data['class_name']}',class_rens='{$data['class_rens']}',profess_id='{$data['profess_id']}',class_year='{$data['class_year']}'where class_id=".$id;
        return $this->exc($sql);
    }
    public function delInfo($id){
        $sql="delete from ".$this->_table." where class_id=".$id;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(class_id,class_name,class_rens,profess_id,class_year) values ('{$data['class_id']}','{$data['class_name']}','{$data['class_rens']}','{$data['profess_id']}','{$data['class_year']}')";
       return $this->exc($sql);
       // return $sql;
    }

    public function classlist($page,$pagesize,$condition=""){
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

    public function class_count(){
        $sql = "select count(class_id) as num from ".$this->_table;
        // echo $sql;
        $result = $this->query($sql);

        return $result['num'];
    }//分页统计数据的个数

}
