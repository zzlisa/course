<?php


class teacherModel extends Mysql{
    protected  $_table="teacher";

    //根据id 获取个人信息
    public function getteacherInfo($id){
        $sql="select * from ".$this->_table." where teacher_id=".$id;
        $teacher=$this->query($sql);
        return $teacher;
    }

    //
    public function editInfo($id,$data){
        $sql="update ".$this->_table." set teacher_id='{$data['teacher_id']}',teacher_name='{$data['teacher_name']}',teacher_sex='{$data['teacher_sex']}',teacher_zc='{$data['teacher_zc']}',teacher_csrq='{$data['teacher_csrq']}', teacher_xl='{$data['teacher_xl']}',college_id='{$data['college_id']}'where teacher_id=".$id;
        return $this->exc($sql);
    }
    public function delInfo($id){
        $sql="delete from ".$this->_table." where teacher_id=".$id;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(teacher_id,teacher_name,teacher_sex,teacher_zc,teacher_csrq,teacher_xl,college_id) values ('{$data['teacher_id']}','{$data['teacher_name']}','{$data['teacher_sex']}','{$data['teacher_zc']}','{$data['teacher_csrq']}','{$data['teacher_xl']}','{$data['college_id']}')";
       return $this->exc($sql);
       // return $sql;
    }

    public function teacherlist($page,$pagesize,$condition=""){
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

    public function teacher_count(){
        $sql = "select count(teacher_id) as num from ".$this->_table;
        // echo $sql;
        $result = $this->query($sql);

        return $result['num'];
    }//分页统计数据的个数

}
