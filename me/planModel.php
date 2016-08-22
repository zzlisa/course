<?php


class planModel extends Mysql{
    protected  $_table="plan";

    //根据id 获取个人信息
    public function getplanInfo($id){
        $sql="select * from ".$this->_table." where plan_id=".$id;
        $plan=$this->query($sql);
        return $plan;
    }

    //
    public function editInfo($id,$data){
        $sql="update ".$this->_table." set plan_id='{$data['plan_id']}',profess_id='{$data['profess_id']}',plan_xq='{$data['plan_xq']}',course_id='{$data['course_id']}',plan_week='{$data['plan_week']}'where plan_id=".$id;
        return $this->exc($sql);
    }
    public function delInfo($id){
        $sql="delete from ".$this->_table." where plan_id=".$id;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(plan_id,profess_id,plan_xq,course_id,plan_week) values ('{$data['plan_id']}','{$data['profess_id']}','{$data['plan_xq']}','{$data['course_id']}','{$data['plan_week']}')";
       return $this->exc($sql);
       // return $sql;
    }

    public function planlist($page,$pagesize,$condition=""){
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

    public function plan_count(){
        $sql = "select count(plan_id) as num from ".$this->_table;
        // echo $sql;
        $result = $this->query($sql);

        return $result['num'];
    }//分页统计数据的个数

}
