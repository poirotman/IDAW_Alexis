<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname='identifiant';
    $conn = new mysqli($servername, $username, $password,$dbname);
    if(isset($_POST['nom'])){
        print_r($_POST);
        
        // $conn->query("INSERT INTO user (NOM,PRENOM,DATE,AIME_LE_COURS,REMARQUES)
        //     VALUES ("$_POST()")
    } 
?>