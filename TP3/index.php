<?php
    session_start();
    $DEFAULT ='style1';
    if(isset($_GET['css'])){
        if(isset($_COOKIE['Style'])){
            unset($_COOKIE['Style']);
        }
        setcookie('Style', $_GET['css']);
    }
?>
<head>
    <meta charset="UTF-8">
<?php 
    if(isset($_GET['css'])){
        echo '<link rel="stylesheet" href="'.$_GET['css'].'.css">';
    }
    elseif(isset($_COOKIE['Style'])){
        echo '<link rel="stylesheet" href="'.$_COOKIE['Style'].'.css">';
    }
    else{
        echo '<link rel="stylesheet" href="'.$DEFAULT.'.css">';
    }
    echo $_SESSION['login'];
?>
</head>

<form id="style_form" action="index.php" method="GET">
    <select name="css">
        <option value="style1">style1</option>
        <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>
<button class='button'> Exemple du style </button> 
