<?php
    include('database.php');

    $obj = new query();
    $condition_arr = array('id'=>4,'name'=>'meraz','email'=>'saiful@gmail.com','mobile'=>'12345');
    // $result = $obj ->getdata('student_info','*','','id','asc',7);
    $results = $obj ->insertData('student_info',$condition_arr);
    // $deleteResult = $obj->deleteData('student_info',$condition_arr);
    // echo '<pre>';
    // print_r($result);
    // echo '<pre>';
    // print_r($results);
    // echo '<pre>';
    // print_r($deleteResult);
    // $condition_arr = array('name' =>'xyz');
    // $result = $obj->updateData('student_info',$condition_arr,'id',1);
?>