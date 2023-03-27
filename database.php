<?php
class database{
    private $host;
    private $bdusername;
    private $dbpassword;
    private $dbname;

    protected function connect() {
        $this->host='localhost';
        $this->dbusername='meraz';
        $this->dbpassword='meraz';
        $this->dbname='CRUD';

        $con = new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
        return $con; 
    }
}

class query extends database{
    public function getdata($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='desc',$limit='') {
        $sql="select $field from $table";
        if($condition_arr!='') {
            $sql.=' where ';
            $c=count($condition_arr);
            $i=1;
            foreach($condition_arr as $key=>$val) {
                if($i==$c) {
                    $sql.="$key='$val'";
                }else {
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
        }
        if($order_by_field!='') {
            $sql.=" order by $order_by_field $order_by_type ";
        }

        if($limit!=''){
            $sql.= " limit $limit ";
        }

        $result=$this->connect()->query($sql);
        if($result->num_rows >0) {
            $arr=array();
            while($row=$result->fetch_assoc()) {
                $arr[]=$row;
            }
            return $arr;
        }else{
            return 0;
        }
    }

    public function insertData($table,$condition_arr){
        if($condition_arr!='') {
            $c=count($condition_arr);
            $i=1;
            foreach($condition_arr as $key =>$val) {
                if($i==$c) {
                    $sql.="$key='$val'";
                }else{
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
        }
        $sql.= "insert into $table($field) $values($value) ";
        die($sql);
        $result = $this->connect()->query($sql);
    }

    public function deleteData($table,$condition_arr){
        if($condition_arr!='') {
            $c=count($condition_arr);
            $i=1;
            $sql= "delete from $table where";
            foreach($condition_arr as $key =>$val) {
                if($i==$c) {
                    $sql.="$key='$val'";
                }else{
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
        }
        // die($sql);
        $result = $this->connect()->query($sql);
    }

    public function updateData($table,$condition_arr,$where_field,$where_value){
        if($condition_arr!='') {
            $sql= "update $table set";
            $c=count($condition_arr);
            $i=1;
            foreach($condition_arr as $key =>$val) {
                if($i==$c) {
                    $sql.="$key='$val'";
                }else{
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
            $sql =" where $where_field='$where_value' ";
            $result=$this->connect()->query($sql);
        }
    }
}
?>