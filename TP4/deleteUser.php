<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname='identifiant';
    $conn = new mysqli($servername, $username, $password,$dbname);

    if(isset($_POST['id'])){
        $res=[];
        $sql="DELETE FROM user WHERE user.ID=".$_POST['id'];
        $conn->query($sql);
        $res['sql']=$sql;
        echo json_encode($res, 0);
    }
?>