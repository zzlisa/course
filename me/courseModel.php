<?php


class courseModel extends Mysql{
    protected  $_table="course";

    //根据id 获取个人信息
    public function getcourseInfo($id){
        $sql="select * from ".$this->_table." where course_id=".$id;
        $course=$this->query($sql);
        return $course;
    }

    //
    public function editInfo($id,$data){
        $sql="update ".$this->_table." set course_id='{$data['course_id']}',course_name='{$data['course_name']}',course_xingz='{$data['course_xingz']}',course_testxs='{$data['course_testxs']}',course_zxs='{$data['course_zxs']}', course_xuef='{$data['course_xuef']}'where course_id=".$id;
        return $this->exc($sql);
    }
    public function delInfo($id){
        $sql="delete from ".$this->_table." where course_id=".$id;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(course_id,course_name,course_xingz,course_testxs,course_zxs,course_xuef) values ('{$data['course_id']}','{$data['course_name']}','{$data['course_xingz']}','{$data['course_testxs']}','{$data['course_zxs']}','{$data['course_xuef']}')";
       return $this->exc($sql);
       // return $sql;
    }

    public function courselist($page,$pagesize,$condition=""){
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

    public function course_count(){
        $sql = "select count(course_id) as num from ".$this->_table;
        // echo $sql;
        $result = $this->query($sql);

        return $result['num'];
    }//分页统计数据的个数

}
