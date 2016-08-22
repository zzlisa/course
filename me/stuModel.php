<?php


class stuModel extends Mysql{
    protected  $_table="student";

    //根据id 获取个人信息
    public function getstudentInfo($id){
        $sql="select * from ".$this->_table." where student_id=".$id;
        $student=$this->query($sql);
        return $student;
    }

    //
    public function editInfo($id,$data){

        $sql="update ".$this->_table." set  student_id='{$data['student_id']}',
                                            student_name='{$data['student_name']}',
                                            student_sex='{$data['student_sex']}',
                                            student_csrq='{$data['student_csrq']}',

                                            student_jg='{$data['student_jg']}',
                                            student_year='{$data['student_year']}',
                                            student_iid='{$data['student_iid']}',

                                            student_img='{$data['student_img']}',
                                            class_id='{$data['class_id']}'
                                            where student_id=".$id;

            // return $sql;
      return $this->exc($sql);
    }
    public function delInfo($id){
        $sql="delete from ".$this->_table." where student_id=".$id;
        // return $sql;
        return $this->exc($sql);
    }
    public function addInfo($data){
       $sql="insert into ".$this->_table."(student_id,student_name,student_sex,student_csrq,student_jg,student_year,student_iid,student_img,class_id) values ('{$data['student_id']}','{$data['student_name']}','{$data['student_sex']}','{$data['student_csrq']}','{$data['student_jg']}','{$data['student_year']}','{$data['student_iid']}','{$data['student_img']}','{$data['class_id']}')";
       return $this->exc($sql);
       // return $sql;
    }

    public function studentlist($page,$pagesize,$condition=""){
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

    public function student_count(){
        $sql = "select count(student_id) as num from ".$this->_table;
        // echo $sql;
        $result = $this->query($sql);

        return $result['num'];
    }//分页统计数据的个数

}
