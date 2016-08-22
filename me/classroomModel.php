<?php


class classroomModel extends Mysql{
    protected  $_table="classroom";

    //根据id 获取个人信息
    public function getClassroomInfo($id){
        $sql="select * from ".$this->_table." where classroom_id=".$id;
        $classroom=$this->query($sql);
        return $classroom;
    }

    //
    public function editInfo($id,$data){
        $sql="update ".$this->_table." set classroom_id='{$data['classroom_id']}',classroom_name='{$data['classroom_name']}',classroom_type='{$data['classroom_type']}',classroom_lh='{$data['classroom_lh']}',classroom_rs='{$data['classroom_rs']}' where classroom_id=".$id;
        // return $sql;
        return $this->exc($sql);
    }

    public function delInfo($id){
        $sql="delete from ".$this->_table." where classroom_id=".$id;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(classroom_id,classroom_name,classroom_type,classroom_lh,classroom_rs) values ('{$data['classroom_id']}','{$data['classroom_name']}','{$data['classroom_type']}','{$data['classroom_lh']}','{$data['classroom_rs']}')";
       return $this->exc($sql);
    }

    public function classroomlist($page,$pagesize,$condition=""){
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

    public function classroom_count(){
        $sql = "select count(classroom_id) as num from ".$this->_table;
        // echo $sql;
        $result = $this->query($sql);

        return $result['num'];
    }//分页统计数据的个数

}
