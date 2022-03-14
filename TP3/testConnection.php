<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname='identifiant';
    $conn = new mysqli($servername, $username, $password,$dbname);
    //On vérifie la connexion
    if($conn->connect_error){
        die('Erreur : ' .$conn->connect_error);
    }
    echo 'Connexion réussie <br></br>';
    $res = $conn->query('SELECT * FROM personne');
    if ($res->num_rows > 0) {
        // output data of each row
        echo '<table>';
            while($row = $res->fetch_assoc()){
                echo '<tr>
                            <td>'.$row['id'].'</td>
                            <td>' .$row['login'].'/'.$row['password'].'</td>
                            <td>' .$row['pseudo']. '</td>
                    <td>';  
            }
        echo'</table>';
        } else {
        echo "0 results";
      }

    $conn->close();
?>