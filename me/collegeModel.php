<?php


class collegeModel extends Mysql{
    protected  $_table="college";

    //根据id 获取个人信息
    public function getcollegeInfo($id){
        $sql="select * from ".$this->_table." where college_id=".$id;
        $college=$this->query($sql);
        return $college;
    }

    //
    public function editInfo($id,$data){
        $sql="update ".$this->_table." set college_id='{$data['college_id']}',college_name='{$data['college_name']}' where college_id=".$id;
        return $this->exc($sql);
    }
    public function delInfo($id){
        $sql="delete from ".$this->_table." where college_id=".$id;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(college_id,college_name) values ('{$data['college_id']}','{$data['college_name']}')";
       return $this->exc($sql);
       // return $sql;
    }

    public function collegelist($page,$pagesize,$condition=""){
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

    public function college_count(){
        $sql = "select count(college_id) as num from ".$this->_table;
        // echo $sql;
        $result = $this->query($sql);

        return $result['num'];
    }//分页统计数据的个数

}
