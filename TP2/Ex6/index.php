<?php
 require_once("template_header.php");
 require_once("template_menu.php");
    $currentPageId = 'accueil';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }

?>
<body>
    <?php
        renderMenuToHTML($currentPageId);
    ?>

<?php
    $pageToInclude = $currentPageId . ".php";
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
?>

</body>

</html>