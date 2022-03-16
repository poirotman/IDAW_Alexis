<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname='identifiant';
    $conn = new mysqli($servername, $username, $password,$dbname);
    if(isset($_POST['nom'])){
        $res=[];
        $res['req']=true;
        $res['nom']=$_POST['nom'];
        echo json_encode( $res,0);
      }
?>