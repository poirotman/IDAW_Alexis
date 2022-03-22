<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname='identifiant';
    $conn = new mysqli($servername, $username, $password,$dbname);
    $champs_sql=['ID', 'NOM', 'PRENOM', 'DATE', 'AIME_LE_COURS', 'REMARQUES'];
    switch($_POST['CRUD']){

      // ON AJOUTE QUELQU'UN
      case 'ADD':
        if(isset($_POST['nom'])){
            $res=[];
            $res['req']=true;
            $sql="INSERT INTO user VALUES( NULL";

            foreach($_POST as $key => $value){
              if($key != 'id' &&  $key !='CRUD'){
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
          break;

      // ON SUPPRIME QUELQU'UN
      case "DEL":
        if(isset($_POST['id'])){
          $res=[];
          $sql="DELETE FROM user WHERE user.ID=".$_POST['id'];
          $conn->query($sql);
          $res['sql']=$sql;
          echo json_encode($res, 0);
        }
        break;

      case 'READ':
        $sql="SELECT * FROM user";
        break;
      case 'EDIT':
        $res=[];
        $res['req']=true;
        $sql="UPDATE user SET ";
        $temp = 0;
        foreach($_POST as $key => $value){
          if($key != 'id' &&  $key !='CRUD'){
            $temp = $temp+1;
            if($key == 'date'){
              if($value == ''){
                $sql=$sql.$champs_sql[$temp]."= NULL ,";
              }
              else{
                $timestamp = strtotime($value); 
                $newDate = date("Y-m-d", $timestamp );
                $sql=$sql.$champs_sql[$temp]."='".$newDate."' ,";
              } 
            }
            else{
              $sql=$sql.$champs_sql[$temp]."='".$value."' ,";
            }
          }
        }
        $sql=rtrim($sql,',');
        $sql=$sql." WHERE user.ID = ".$_POST['id'];
        $res['sql']=$sql;
        $conn->query($sql);
        echo json_encode($res,0);
        break;
    }  
?>