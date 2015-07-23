<?php     
       include_once('lectorCSV.php');
       $arrayResearch = array();
       $arrayResearch= loadDataFromCSV("https://docs.google.com/spreadsheets/d/171m6bh9V3-NfkqB3V49laxFHEYrwD28jZX36egZnTtM/pub?output=csv");
       //print_r($arrayResearch);  

       $title;
       $description;                              

       for ($i = 1; $i < sizeof($arrayResearch) ; $i++) {
            
            $title = $arrayResearch[$i][0];
            $description = $arrayResearch[$i][1];

            $elemento =   '<div class="col-md-3 col-sm-12 v-center">';
            $elemento .=    '<a class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0">';
            $elemento .=      '<span class="rotate-box-icon"><i class="fa fa-file-text-o"></i></span>';
            $elemento .=        '<div class="rotate-box-info">';
            $elemento .=          '<h4>'.$title.'</h4>';
            $elemento .=          ''.$description.'';
            $elemento .=        '</div>';
            $elemento .=    '</a>';
            $elemento .=  '</div>';
            
            echo $elemento;
      }
        
?>