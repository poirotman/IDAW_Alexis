<?php
    function renderMenuToHTML($currentPageId) {
    // un tableau qui d\'efinit la structure du site
        $mymenu = array(
        // idPage titre
            'accueil' => array( 'Accueil' ),
            'CV' => array( 'CV' ),
            'Projets' => array('Projets'),
            'contact' => array('Contact')
        );
        foreach($mymenu as $pageId => $pageParameters){
            if($pageId==$currentPageId){
                echo "<h1>".$pageParameters[0]."</h1>";
            }
        };
        echo "<div id=menu>";
        foreach($mymenu as $pageId => $pageParameters) {
            if($pageId==$currentPageId){
                echo "<div class=menu>
                        <a href= \"http://tp2/TP2/Ex6/index.php?page=".$pageId."\" class=\"button\" id=\"currentpage\">".$pageParameters[0]."</a>
                    </div>";
                
            }
            else{
                echo "<div class=menu>
                        <a href= \"http://tp2/TP2/Ex6/index.php?page=".$pageId."\" class=\"button\">".$pageParameters[0]."</a>
                    </div>";
            }
        };
        echo "</div>";
    }
?>


