<?php
if(isset($_POST['search'])){
    $keywordnye = $_POST['user_inputnye'];
    $sql= $conn->prepare(" SELECT* FROM businessnye WHERE bus_name like '%".$keywordnye."%' 
     AND  bus_status = 'approved'
     OR bus_category like '%".$keywordnye."%' 
     AND  bus_status = 'approved'
     OR bus_name like '%".$keywordnye."%'
     AND  bus_status = 'approved'
     OR bus_category like '%".$keywordnye."%'
     AND  bus_status = 'approved'
     OR bus_name like '%".$keywordnye."%'
     AND  bus_status = 'approved'
     OR bus_location like '%".$keywordnye."%' AND  bus_status = 'approved' ");
    $sql->execute();
    $sql->store_result();
    // $alls = $result->fetch_array();
    $rows = $sql->num_rows;

    
    if($rows < 1){
        echo "not fetched";
    }else{
        echo "fetched"."<br>";
        echo $rows;
    }
}
?>