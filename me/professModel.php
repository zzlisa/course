<?php


class professModel extends Mysql{
    protected  $_table="profess";

    //根据id 获取个人信息
    public function getprofessInfo($id){
        $sql="select * from ".$this->_table." where profess_id=".$id;
        $profess=$this->query($sql);
        return $profess;
    }

    //
    public function editInfo($id,$data){
        $sql="update ".$this->_table." set profess_id='{$data['profess_id']}',profess_name='{$data['profess_name']}',profess_xuez='{$data['profess_xuez']}',profess_xingz='{$data['profess_xingz']}',profess_wl='{$data['profess_wl']}',college_id='{$data['college_id']}', profess_year='{$data['profess_year']}'where profess_id=".$id;

        return $this->exc($sql);
    }

    public function delInfo($id){
        $sql="delete from ".$this->_table." where profess_id=".$id;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(profess_id,profess_name,profess_xuez,profess_xingz,profess_wl,college_id,profess_year) values ('{$data['profess_id']}','{$data['profess_name']}','{$data['profess_xuez']}','{$data['profess_xingz']}','{$data['profess_wl']}','{$data['college_id']}','{$data['profess_year']}')";
       return $this->exc($sql);
       // return $sql;
    }

    public function professlist($page,$pagesize,$condition=""){
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

    public function profess_count(){
        $sql = "select count(profess_id) as num from ".$this->_table;
        // echo $sql;
        $result = $this->query($sql);

        return $result['num'];
    }//分页统计数据的个数

}
