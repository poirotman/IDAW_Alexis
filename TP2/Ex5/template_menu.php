<?php
    function renderMenuToHTML($currentPageId) {
    // un tableau qui d\'efinit la structure du site
        $mymenu = array(
        // idPage titre
            'Accueil' => array( 'Accueil' ),
            'cv' => array( 'CV' ),
            'projets' => array('Projets')
        );
        echo "<div id=menu>";
        foreach($mymenu as $pageId => $pageParameters) {
            if($pageId==$currentPageId){
                echo "<div class=menu>
                        <a href= \"".$pageParameters[0].".php\" class=\"button\" id=\"currentpage\">".$pageParameters[0]."</a>
                    </div>";
            }
            else{
                echo "<div class=menu>
                        <a href= \"".$pageParameters[0].".php\" class=\"button\">".$pageParameters[0]."</a>
                    </div>";
            }
        };
        echo "</div>";
    }
?>


