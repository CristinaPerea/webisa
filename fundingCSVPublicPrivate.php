<?php     
       include_once('lectorCSV.php');
       $arrayFunding = array();
       $arrayFunding = loadDataFromCSV("funding/FundingPublicPrivateCSV.csv");
       //print_r($arrayFunding);  

       $areaProyecto;
       $nombreProyecto;
       $descripcionProyecto;
       $fechaProyecto;
       $areaAñadida = array();                                 
       $elemento = "";
       $elemento = '<div class="col-xs-12 publicprivate">';
       $elemento .= '<div class="portfolio_single_content estilo-funding">';
       for ($i = 1; $i < sizeof($arrayFunding) ; $i++) {
            
            $areaProyecto = $arrayFunding[$i][0];

            if(!in_array($areaProyecto, $areaAñadida)){
                array_push($areaAñadida, $areaProyecto);

              
                 $elemento .= '  <h6>'.$areaProyecto.'</h6>';
                 $elemento .= '      <ul>';

                for($j = 1; $j < sizeof($arrayFunding); $j++){

                    if($areaProyecto == $arrayFunding[$j][0]){        
                        $nombreProyecto = $arrayFunding[$j][1];
                        $descripcionProyecto = $arrayFunding[$j][2];
                        $fechaProyecto = $arrayFunding[$j][3]; 
                        $elemento .= '<li><b>'.$nombreProyecto.'</b>. '.$descripcionProyecto.' '.$fechaProyecto.'.</li>';
                        //print_r($elemento);
                    }
                }
                $elemento .= '</ul>';
             
            }
            
        }
        $elemento .= '  </div>';
        $elemento .= '</div>';
        echo $elemento;
?>