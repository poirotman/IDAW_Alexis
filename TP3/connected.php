<?php
session_start();
if(isset($_GET['disconnected'])){
    unset($_SESSION['login']);
    session_destroy();
    echo 'you are disconnected, please go back to the form';
}
else{
    // on se connecte à la base de donnée
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname='identifiant';
    $conn = new mysqli($servername, $username, $password,$dbname);

    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;

    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        $res = $conn->query("SELECT * FROM personne WHERE login='".$tryLogin."' AND password='".$tryPwd."'");
        if( $res->num_rows>0) {
            $row=$res->fetch_assoc();
            $successfullyLogged = true;
            echo "<h1>Bienvenu ".$row['pseudo']."</h1>";
            $login = $tryLogin;
            $password=$tryPwd;
        } else
            $errorText = "Erreur de login/password";
    } else
        $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
        echo $errorText;
    } else {
        $_SESSION['login']=$_POST['login'];
        echo '<br></br><a href="connected.php?disconnected=true">disconnected</a>';
    }
    $conn->close();
}
?>
<br></br>
<a href="login.php">retour</a>
