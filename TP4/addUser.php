<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname='identifiant';
    $conn = new mysqli($servername, $username, $password,$dbname);
    if(isset($_POST['nom'])){
        $res=[];
        $res['req']=true;
        $sql="INSERT INTO user VALUES( NULL";

        foreach($_POST as $key => $value){
          if($key != 'id'){
            if($key == 'date'){
              if($value == ''){
                $sql=$sql.", NULL";
              }
              else{
                $timestamp = strtotime($value); 
                $newDate = date("Y-m-d", $timestamp );
                $sql=$sql.",'".$newDate."'";
              } 
            }else{
              $sql=$sql.",'".$value."'";
            }
          }
        }
        $sql=$sql.")";
        
        $res['sql']=$sql;
        $conn -> query($sql); 
        $response = $conn->query("SELECT ID FROM user ORDER BY ID DESC LIMIT 1");
        if($response->num_rows>0){
          $response=$response->fetch_assoc();
        }
        $res['response']=$response['ID'];
        echo json_encode( $res,0);
        
    }  
?>