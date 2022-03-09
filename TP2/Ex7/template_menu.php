<?php
    function renderMenuToHTML($currentPageId, $currentLang) {
    // un tableau qui d\'efinit la structure du site
            $mymenu = array(
            // idPage titre
                'accueil' => array( 'fr' =>'Accueil', 'en'=>'Home' ),
                'CV' => array( 'fr'=>'CV', 'en'=>'CV'),
                'Projets' => array('fr'=>'Projets','en'=>'Projects' ),
                'contact' => array('fr'=>'Contact', 'en'=>'Contact'),
            );
            $menuLangue = array('fr','en');
        echo "<h1>".$mymenu[$currentPageId][$currentLang]."</h1>";

        echo "<div id=menu>";
        foreach($mymenu as $pageId => $pageParameters) {
            if($pageId==$currentPageId){
                echo "<div class=menu>
                        <a href= \"http://tp2/TP2/Ex7/index.php?page=".$pageId."&lang=".$currentLang."\" class= \"button\" id= \"currentPage\">".$pageParameters[$currentLang]."<a/>
                    </div>";
                
            }
            else{
                echo "<div class=menu>
                        <a href= \"http://tp2/TP2/Ex7/index.php?page=".$pageId."&lang=".$currentLang."\" class=\"button\">".$pageParameters[$currentLang]."</a>
                    </div>";
            }
        };
        echo '<div class="container-menu-lang">
                <div class="item-container-lang">';
        foreach ($menuLangue as $key => $value) {
            echo '<a href="http://tp2/TP2/Ex7/index.php?page='.$currentPageId.'&lang='.$value.'"class="button-lang">'.$value.'</a>';
        }            
        echo '</div>
            </div>';
        echo "</div>";
    }
?>


