<?php
    require_once("template_header.php");
    require_once("template_menu.php");
    $currentPageId = 'accueil';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    $currentLang='en';
    if(isset($_GET['lang'])) {
        $currentLang = $_GET['lang'];
    }


?>
<body>
    <?php
        renderMenuToHTML($currentPageId, $currentLang);
    ?>

<?php
    $pageToInclude = "./".$currentLang."/".$currentPageId . ".php";
        
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
?>

</body>

</html>