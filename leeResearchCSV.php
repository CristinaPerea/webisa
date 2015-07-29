<?php     
       include_once('lectorCSV.php');
       $arrayResearch = array();
       //$arrayResearch = loadDataFromCSV("https://docs.google.com/spreadsheets/d/171m6bh9V3-NfkqB3V49laxFHEYrwD28jZX36egZnTtM/pub?output=csv");
       $arrayResearch = loadDataFromCSV("researchLines/researchLines.csv");
       //print_r($arrayResearch);  

       $title;
       $description; 
       $icon; 
       $mainTitle = $arrayResearch[1][0];
       $subTitle = $arrayResearch[1][1]; 

       $elemento = '<h2>'.$mainTitle.'</h2>';
       $elemento .='<div class="devider"></div>';
       $elemento .= '<p class="subtitle">'.$subTitle.'</p>';
       $elemento .= '</div>';
       $elemento .= '</div>';
       $elemento .= '</div>';
       $elemento .= '<div class="rotate-box-1-wrapper">';
       $elemento .= '<div class="container">';
       $elemento .= '<div class="row">';

       echo $elemento;                          

       for ($i = 2; $i < sizeof($arrayResearch) ; $i++) {
            
            $title = $arrayResearch[$i][0];
            $description = $arrayResearch[$i][1];
            $icon = $arrayResearch[$i][2];

            $elemento2 =   '<div class="col-md-3 col-sm-12 v-center">';
            $elemento2 .=    '<a class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0">';
            $elemento2 .=      '<span class="rotate-box-icon"><i class="fa '.$icon.'"></i></span>';
            $elemento2 .=        '<div class="rotate-box-info">';
            $elemento2 .=          '<h4>'.$title.'</h4>';
            $elemento2 .=          ''.$description.'';
            $elemento2 .=        '</div>';
            $elemento2 .=    '</a>';
            $elemento2 .=  '</div>';
            
            echo $elemento2;
      }
        
?>