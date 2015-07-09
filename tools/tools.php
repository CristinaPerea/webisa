<?php
    include_once("lectorCSV.php");

    $arrayHerramientas = loadDataFromCSV("tools/tools.csv");
    //print_r($arrayHerramientas);

    $tiposAñadidos = array();
    $urlLogoHerramienta;
    $tituloHerramienta;
    $enlaceHerramienta;
    $descripcionHerramienta;
    $elemento =  '<div class="container">';
    $contador = 0;
    $clasefondo = 'filapar';
    for($i=1; $i<sizeof($arrayHerramientas); $i++)
    {
        $tipo = $arrayHerramientas[$i][0];
        if(!in_array($tipo, $tiposAñadidos)){
            array_push($tiposAñadidos, $tipo);
            for($j=1; $j<sizeof($arrayHerramientas); $j++) {
                if($tipo == $arrayHerramientas[$j][0]) {
                    $urlLogoHerramienta = $arrayHerramientas[$j][1];
                    $tituloHerramienta = $arrayHerramientas[$j][2];
                    $enlaceHerramienta = $arrayHerramientas[$j][3];
                    $descripcionHerramienta = $arrayHerramientas[$j][4];
                    if($contador % 2 == 0)
                        $clasefondo = "filapar";
                    else
                        $clasefondo = "filaimpar";
                    $elemento .=  '<div id="cabecera'.$tituloHerramienta.'" class="cabecera-lista-herramientas '.$clasefondo.' row">';
                    $elemento .=    '<div class="col-md-2 col-sm-4 col-xs-4 logo-institucion-en-cabecera-lista-herramientas">';
                    $elemento .=        '<img class="clase-de-imagen-logo-grupo" src="tools/'.$urlLogoHerramienta.'"/>';
                    $elemento .=    '</div>';
                    $elemento .=    '<div class="col-md-3 col-sm-8 col-xs-8 nombre-institucion-en-cabecera-lista-herramientas">';
                    $elemento .=        '<h6 class="clase-enlace-herramienta"><a target="_blank" href="'.$enlaceHerramienta.'">'.$tituloHerramienta.'</a></h6>';
                    $elemento .=    '</div>';
                    $elemento .=    '<div class="col-md-offset-0 col-md-7 col-sm-offset-2 col-sm-9 col-xs-offset-2 col-xs-9 nombre-institucion-en-cabecera-lista-herramientas">';
                    $elemento .=        '<p class="clase-texto-descripcion">'.$descripcionHerramienta.'</p>';
                    $elemento .=    '</div>';
                    $elemento .=  '</div>'; 
                    $contador++;
                }
            }    
        }
    }
    $elemento .= '</div><br>';
    echo $elemento;
?>

