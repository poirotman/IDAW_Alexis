<?php
session_start();
if(isset($_GET['disconnected'])){
    unset($_SESSION['login']);
    session_destroy();
    echo 'you are disconnected, please go back to the form';
}
else{
    // on simule une base de données
    $users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'maitrejedi',
    'admin' => 'rootAdmin');
    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $tryLogin;
        } else
            $errorText = "Erreur de login/password";
    } else
    $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
    echo $errorText;
    } else {
    $_SESSION['login']=$_POST['login'];
    echo "<h1>Bienvenu ".$login."</h1>";
    echo '<br></br><a href="connected.php?disconnected=true">disconnected</a>';
    }
}
?>
<br></br>
<a href="login.php">retour</a>
