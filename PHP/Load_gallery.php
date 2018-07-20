<?php

$dir = "galeria";
$dirs = scandir($dir);

chdir($dir);

foreach($dirs as $gal){
    if ($gal != '.' && $gal != '..' && is_dir($gal)){
        $dr = opendir($gal);
        $pict = scandir($gal);
        echo '<div class="galeria-mod"><h2 class="galeria-title">';
        echo $gal ;
        echo '</h2>';
        echo '<div class="galeria-img">';


        foreach($pict as $p){
            if ($p != '.' && $p != '..'){
                echo "<a href=\"" . "./galeria/" . $gal . "/" . $p . "\" data-lightbox=\"" . $gal . "\"><img src=\"" . "./galeria/" . $gal . "/" . $p . "\"/></a>\n";
            }
        }
        echo "</div></div>";
        closedir($dr);
    }
}


?>