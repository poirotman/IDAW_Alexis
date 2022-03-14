<?php
if(!isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['pseudo'])){
    echo '<form id="login_form" action="inscription.php" method="POST">
        <table>
            <tr>
                <th>Login :</th>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <th>Mot de passe :</th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
            <tr>
                <th>pseudo :</th>
                <td><input type="pseudo" name="pseudo"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="S\'inscrire" /></td>
            </tr>
        </table>
    </form>';
} else{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname='identifiant';
    $conn = new mysqli($servername, $username, $password,$dbname);
    $res=$conn->query("SELECT login FROM personne WHERE login='".$_POST['login']."'");
    if($res->num_rows>0){
        echo "login déjà pris !";
        echo "<a href='inscription.php'> Retenter </a>";
        $conn->close();
    }
    else{
        $conn->query("INSERT INTO personne (login, password, pseudo)
            VALUES ('".$_POST['login']."', '".$_POST['password']."', '".$_POST['pseudo']."')");
        echo 'Création réussi';
        echo "identifiez-vous 
        <a href='login.php'> S'identifier </a>";
        $conn->close();
    }
}
?>